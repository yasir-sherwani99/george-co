<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

use Image;
use App\Models\Slider;

use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $sliders = Slider::all();

        $data['title'] = "Sliders List";
        $data['section'] = "Sliders";
        $data['page'] = "List";

        view()->share('breadcrumbs', $data);

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        
        $data['title'] = "Create Slider";
        $data['section'] = "Sliders";
        $data['page'] = "Create";

        view()->share('breadcrumbs', $data);

        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request)
    {
        $isActive = $request->active == 'on' ? 1 : 0;

        $slider = new Slider;

        $slider->heading = $request->heading;
        $slider->sub_heading = $request->sub_heading;
        $slider->is_active = $isActive;

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            // image extension
            $extension = $image->getClientOriginalExtension();
            // destination path
            $destinationPath = public_path('images/upload/sliders');
            // create image new name        
            $imageName = 'slider_' . time() . '.' . $extension;
            // create image instanc and save
            $imageFile = Image::make($image->getRealPath());
            $imageFile->save($destinationPath . '/' . $imageName);
            // get image url
            $imageUrl = 'images/upload/sliders/' . $imageName;

            $slider->image = $imageUrl;
        }

        $slider->save();

        return redirect()->route('sliders.index')
                         ->with('success', 'New slider created successfully');
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

        $data['title'] = "Edit Slider";
        $data['section'] = "Sliders";
        $data['page'] = "Edit";

        view()->share('breadcrumbs', $data);

        $slider = Slider::find($id);
    	if(!isset($slider) || empty($slider)) {
    		abort(404);
    	}

        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id)
    {
      //  dd($request->all());
        $slider = Slider::find($id);
    	if(!isset($slider) || empty($slider)) {
    		abort(404);
    	}

        $isActive = $request->active == 'on' ? 1 : 0;

        $slider->heading = $request->heading;
        $slider->sub_heading = $request->sub_heading;

        if($request->hasFile('photo')) {
            $image = $request->file('photo');
            if($image instanceof UploadedFile) {
                // delete existing images
                if(isset($slider->image)) {
                    if (File::exists(public_path($slider->image))) {
                        // delete image from storage
                        File::delete($slider->image);               
                    } 
                } 
            
                // image extension
                $extension = $image->getClientOriginalExtension();
                // destination path
                $destinationPath = public_path('images/upload/sliders');
                // create image new name        
                $imageName = 'slider_' . time() . '.' . $extension;
                // create image instanc and save
                $imageFile = Image::make($image->getRealPath());
                $imageFile->save($destinationPath . '/' . $imageName);
                // get image url
                $imageUrl = 'images/upload/sliders/' . $imageName;

                $slider->image = $imageUrl;
            }
        }

        $slider->is_active = $isActive;
        $slider->save();

        return redirect()->route('sliders.index')
                         ->with('success', 'A slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        if(!isset($slider) || empty($slider)) {
    		abort(404);
    	}

        // delete image from folder if exists
        if(isset($slider->image)) {
            if (File::exists(public_path($slider->image))) {
                // delete image from storage
                File::delete($slider->image);
            }
        }

        $slider->delete();               

        return redirect()->route('sliders.index')
                         ->with('success', 'Slider deleted successfully');
    }
}
