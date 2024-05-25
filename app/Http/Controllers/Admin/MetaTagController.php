<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MetaTag;
use App\Http\Requests\MetaTagUpdateRequest;

class MetaTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $metatags = MetaTag::all();

        $data['title'] = "Meta Tag List";
        $data['section'] = "Meta Tags";
        $data['page'] = "List";

        view()->share('breadcrumbs', $data);

        return view('admin.metatags.index', compact('metatags'));
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];

        $data['title'] = "Edit Meta Tag";
        $data['section'] = "Meta Tags";
        $data['page'] = "Edit";

        view()->share('breadcrumbs', $data);

        $metatag = MetaTag::find($id);
    	if(!isset($metatag) || empty($metatag)) {
    		abort(404);
    	}

        return view('admin.metatags.edit', compact('metatag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MetaTagUpdateRequest $request, string $id)
    {
        $metatag = MetaTag::find($id);
    	if(!isset($metatag) || empty($metatag)) {
    		abort(404);
    	}

        $metatag->title = $request->title;
        $metatag->description = $request->description;
        $metatag->keywords = $request->keywords;

        $metatag->save();
        
        return redirect()->route('metatags.index')
                         ->with('success', 'Meta Tag updated successfully');
    }
}
