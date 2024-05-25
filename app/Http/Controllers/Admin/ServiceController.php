<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Service;
use App\Models\ServiceImage;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;

use Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $services = Service::all();

        $data['title'] = "Services List";
        $data['section'] = "Services";
        $data['page'] = "List";

        view()->share('breadcrumbs', $data);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        
        $data['title'] = "Create Service";
        $data['section'] = "Services";
        $data['page'] = "Create";

        view()->share('breadcrumbs', $data);

        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceStoreRequest $request)
    {
        $isActive = $request->active == 'on' ? 1 : 0;

        $service = new Service;

        $service->title = $request->title;
        $service->description = $request->description;
        $service->is_active = $isActive;

        $service->save();
        // get last inserted id
        $serviceId = $service->id;

        if(count($request->images) > 0) {
            foreach($request->images as $key => $image) {
                $num = $key + 1;
                // image extension
                $extension = $image->getClientOriginalExtension();
                // destination path
                $destinationPath = public_path('images/upload/services');
                // create image new name        
                $imageName = 'services_' . time() . '_' . $num . '.' . $extension;
                // create image instanc and save
                $imageFile = Image::make($image->getRealPath());
                $imageFile->save($destinationPath . '/' . $imageName);
                // get image url
                $imageUrl = 'images/upload/services/' . $imageName;

                $serviceImage = new ServiceImage;

                $serviceImage->service_id = $serviceId;
                $serviceImage->name = $imageName;
                $serviceImage->src = $imageUrl;
                $serviceImage->width = 0;
                $serviceImage->height = 0;
                $serviceImage->size = 0;
                $serviceImage->type = "image/{$extension}";

                $serviceImage->save();
            }
        }

        return redirect()->route('services.index')
                         ->with('success', 'New service created successfully');
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
        $serviceImagesArr = [];

        $data['title'] = "Edit Service";
        $data['section'] = "Services";
        $data['page'] = "Edit";

        view()->share('breadcrumbs', $data);

        $service = Service::find($id);
    	if(!isset($service) || empty($service)) {
    		abort(404);
    	}

        if(count($service->images) > 0) {
            foreach($service->images as $image) {
                $serviceImagesArr[] = [
                    'id' => $image->id,
                    'src' => config('app.url') . '/' . $image->src
                ];
            }
        }

        // services images
        $serviceImages = json_encode($serviceImagesArr);

        return view('admin.services.edit', compact('service', 'serviceImages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceUpdateRequest $request, string $id)
    {
        $service = Service::find($id);
    	if(!isset($service) || empty($service)) {
    		abort(404);
    	}

        $isActive = $request->active == 'on' ? 1 : 0;

        $service->title = $request->title;
        $service->description = $request->description;
        $service->is_active = $isActive;

        $service->save();
        
        // delete existing images
        if(isset($request->preloaded)) {
            $deletedImages = ServiceImage::whereNotIn('id', $request->preloaded)->get();
            if(!isset($deletedImages) || empty($deletedImages)) {
                abort(404);
            }

            if(count($deletedImages) > 0) {
                foreach($deletedImages as $img) {
                    $image = ServiceImage::find($img->id);
                    if (File::exists(public_path($image->src))) {
                        // delete image from storage
                        File::delete($image->src);
                        // delete image from db
                        $image->delete();               
                    } 
                }
            }
        } else {
            $deletedImages = ServiceImage::where('service_id', $service->id)->get();
            if(!isset($deletedImages) || empty($deletedImages)) {
                abort(404);
            }

            if(count($deletedImages) > 0) {
                foreach($deletedImages as $img) {
                    $image = ServiceImage::find($img->id);
                    if (File::exists(public_path($image->src))) {
                        // delete image from storage
                        File::delete($image->src);
                        // delete image from db
                        $image->delete();               
                    } 
                }
            }
        }

        // upload new images
        if(isset($request->images) && count($request->images) > 0) {
            foreach($request->images as $key => $image) {
                $num = $key + 1;
                // image extension
                $extension = $image->getClientOriginalExtension();
                // destination path
                $destinationPath = public_path('images/upload/services');
                // create image new name        
                $imageName = 'services_' . time() . '_' . $num . '.' . $extension;
                // create image instanc and save
                $imageFile = Image::make($image->getRealPath());
                $imageFile->save($destinationPath . '/' . $imageName);
                // get image url
                $imageUrl = 'images/upload/services/' . $imageName;

                $serviceImage = new ServiceImage;

                $serviceImage->service_id = $service->id;
                $serviceImage->name = $imageName;
                $serviceImage->src = $imageUrl;
                $serviceImage->width = 0;
                $serviceImage->height = 0;
                $serviceImage->size = 0;
                $serviceImage->type = "image/{$extension}";

                $serviceImage->save();
            }
        }

        return redirect()->route('services.index')
                         ->with('success', 'A Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        if(!isset($service) || empty($service)) {
            abort(404);
        }

        $images = ServiceImage::where('service_id', $id)->get();
        if(isset($images) && count($images) > 0) {
            foreach($images as $img) {
                $image = ServiceImage::find($img->id);
                if (File::exists(public_path($image->src))) {
                    // delete image from storage
                    File::delete($image->src);
                    // delete image from db
                    $image->delete();               
                } 
            }
        }

        $service->delete();

        return redirect()->route('services.index')
                         ->with('success', 'A Service deleted successfully');
    }
}
