<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $categories = Category::all();

        $data['title'] = "Create List";
        $data['section'] = "Categories";
        $data['page'] = "List";

        view()->share('breadcrumbs', $data);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];

        $data['title'] = "Create Category";
        $data['section'] = "Categories";
        $data['page'] = "Create";

        view()->share('breadcrumbs', $data);

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $isActive = $request->active == 'on' ? 1 : 0;

        $category = new Category;

        $category->name = $request->category_name;
        $category->slug = $request->category_name;
        $category->is_active = $isActive;

        $category->save();

        return redirect()->route('categories.index')
                         ->with('success', 'New category created successfully');
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

        $data['title'] = "Edit Category";
        $data['section'] = "Categories";
        $data['page'] = "Edit";

        view()->share('breadcrumbs', $data);

        $category = Category::find($id);
    	if(!isset($category) || empty($category)) {
    		abort(404);
    	}

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryStoreRequest $request, string $id)
    {
        $category = Category::find($id);
    	if(!isset($category) || empty($category)) {
    		abort(404);
    	}

        $isActive = $request->active == 'on' ? 1 : 0;

        $category->name = $request->category_name;
        $category->is_active = $isActive;

        $category->save();

        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
