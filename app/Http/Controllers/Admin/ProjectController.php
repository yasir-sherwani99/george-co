<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectImage;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;

use Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $projects = Project::all();

        $data['title'] = "Project List";
        $data['section'] = "Projects";
        $data['page'] = "List";

        view()->share('breadcrumbs', $data);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $categories = Category::active()->get();
        
        $data['title'] = "Create Project";
        $data['section'] = "Projects";
        $data['page'] = "Create";

        view()->share('breadcrumbs', $data);

        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $isActive = $request->active == 'on' ? 1 : 0;

        $project = new Project;

        $project->name = $request->name;
        $project->category_id = $request->category_id;
        $project->unit = $request->unit;
        $project->town = $request->town;
        $project->city = $request->city;
        $project->is_active = $isActive;

        $project->save();
        // get last inserted id
        $projectId = $project->id;

        if(count($request->images) > 0) {
            foreach($request->images as $key => $image) {
                $num = $key + 1;
                // image extension
                $extension = $image->getClientOriginalExtension();
                // destination path
                $destinationPath = public_path('images/upload/projects');
                // create image new name        
                $imageName = 'projects_' . time() . '_' . $num . '.' . $extension;
                // create image instanc and save
                $imageFile = Image::make($image->getRealPath());
                $imageFile->save($destinationPath . '/' . $imageName);
                // get image url
                $imageUrl = 'images/upload/projects/' . $imageName;

                $projImage = new ProjectImage;

                $projImage->project_id = $projectId;
                $projImage->name = $imageName;
                $projImage->src = $imageUrl;
                $projImage->width = 0;
                $projImage->height = 0;
                $projImage->size = 0;
                $projImage->type = "image/{$extension}";

                $projImage->save();
            }
        }

        return redirect()->route('projects.index')
                         ->with('success', 'New project created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];
        $projImagesArr = [];

        $data['title'] = "Edit Project";
        $data['section'] = "Projects";
        $data['page'] = "Edit";

        view()->share('breadcrumbs', $data);

        $project = Project::find($id);
    	if(!isset($project) || empty($project)) {
    		abort(404);
    	}

        if(count($project->images) > 0) {
            foreach($project->images as $image) {
                $projImagesArr[] = [
                    'id' => $image->id,
                    'src' => config('app.url') . '/' . $image->src
                ];
            }
        }

        // project images
        $projImages = json_encode($projImagesArr);
        // all categories
        $categories = Category::active()->get();

        return view('admin.projects.edit', compact('project', 'projImages', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, string $id)
    {
        $project = Project::find($id);
    	if(!isset($project) || empty($project)) {
    		abort(404);
    	}

        $isActive = $request->active == 'on' ? 1 : 0;

        $project->name = $request->name;
        $project->category_id = $request->category_id;
        $project->unit = $request->unit;
        $project->town = $request->town;
        $project->city = $request->city;
        $project->is_active = $isActive;

        $project->save();
        
        // delete existing images
        if(isset($request->preloaded)) {
            $deletedImages = ProjectImage::whereNotIn('id', $request->preloaded)->get();
            if(!isset($deletedImages) || empty($deletedImages)) {
                abort(404);
            }

            if(count($deletedImages) > 0) {
                foreach($deletedImages as $img) {
                    $image = ProjectImage::find($img->id);
                    if (File::exists(public_path($image->src))) {
                        // delete image from storage
                        File::delete($image->src);
                        // delete image from db
                        $image->delete();               
                    } 
                }
            }
        } else {
            $deletedImages = ProjectImage::where('project_id', $project->id)->get();
            if(!isset($deletedImages) || empty($deletedImages)) {
                abort(404);
            }

            if(count($deletedImages) > 0) {
                foreach($deletedImages as $img) {
                    $image = ProjectImage::find($img->id);
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
                $destinationPath = public_path('images/upload/projects');
                // create image new name        
                $imageName = 'projects_' . time() . '_' . $num . '.' . $extension;
                // create image instanc and save
                $imageFile = Image::make($image->getRealPath());
                $imageFile->save($destinationPath . '/' . $imageName);
                // get image url
                $imageUrl = 'images/upload/projects/' . $imageName;

                $projImage = new ProjectImage;

                $projImage->project_id = $project->id;
                $projImage->name = $imageName;
                $projImage->src = $imageUrl;
                $projImage->width = 0;
                $projImage->height = 0;
                $projImage->size = 0;
                $projImage->type = "image/{$extension}";

                $projImage->save();
            }
        }

        return redirect()->route('projects.index')
                         ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        if(!isset($project) || empty($project)) {
            abort(404);
        }

        $images = ProjectImage::where('project_id', $id)->get();
        if(isset($images) && count($images) > 0) {
            foreach($images as $img) {
                $image = ProjectImage::find($img->id);
                if (File::exists(public_path($image->src))) {
                    // delete image from storage
                    File::delete($image->src);
                    // delete image from db
                    $image->delete();               
                } 
            }
        }

        $project->delete();

        return redirect()->route('projects.index')
                         ->with('success', 'Project deleted successfully');
    }
}
