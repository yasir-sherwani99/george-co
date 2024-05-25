<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use Image;

use App\Models\Admin;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];

        $data['title'] = "Admin List";
        $data['section'] = "Admins";
        $data['page'] = "List";

        view()->share('breadcrumbs', $data);

        $admins = Admin::all();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];

        $data['title'] = "Admin Create";
        $data['section'] = "Admins";
        $data['page'] = "Create";

        view()->share('breadcrumbs', $data);

        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminStoreRequest $request)
    {
        $status = $request->active == 'on' ? 'active' : 'blocked';

        $admin = new Admin;

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->phone = $request->phone;
        $admin->address = $request->address;

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            if($image instanceof UploadedFile) {
                // image extension
                $extension = $image->getClientOriginalExtension();
                // destination path
                $destinationPath = public_path('images/upload/avatars');
                // create image new name        
                $imageName = 'avatar_' . time() . '.' . $extension;
                // create image instanc and save
                $imageFile = Image::make($image->getRealPath());
                $imageFile->save($destinationPath . '/' . $imageName);
                // get image url
                $imageUrl = 'images/upload/avatars/' . $imageName;

                $admin->photo = $imageUrl;
            } 
        }

        $admin->status = $status;
        $admin->save();

        return redirect()->route('admins.index')
                         ->with('success', 'New Admin created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];

        $data['title'] = "Profile";
        $data['section'] = "Admins";
        $data['page'] = "Edit";

        view()->share('breadcrumbs', $data);

        $admin = Admin::find($id);
    	if(!isset($admin) || empty($admin)) {
    		abort(404);
    	}

        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, string $id)
    {
        $admin = Admin::find($id);
    	if(!isset($admin) || empty($admin)) {
    		abort(404);
    	}

        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->address = $request->address;

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            if($image instanceof UploadedFile) {
                // delete previous image from folder
                if (File::exists(public_path($admin->photo))) {
                    // delete image from storage
                    File::delete($admin->photo);
                }

                // image extension
                $extension = $image->getClientOriginalExtension();
                // destination path
                $destinationPath = public_path('images/upload/avatars');
                // create image new name        
                $imageName = 'avatar_' . time() . '.' . $extension;
                // create image instanc and save
                $imageFile = Image::make($image->getRealPath());
                $imageFile->save($destinationPath . '/' . $imageName);
                // get image url
                $imageUrl = 'images/upload/avatars/' . $imageName;

                $admin->photo = $imageUrl;
            } 
        }

        $admin->save();

        return redirect()->route('admins.edit', $admin->id)
                         ->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::find($id);
        if(!isset($admin) || empty($admin)) {
    		abort(404);
    	}

        $admin->delete();               

        return redirect()->route('admins.index')
                         ->with('success', 'Admin deleted successfully');
    }
}
