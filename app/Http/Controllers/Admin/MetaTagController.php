<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MetaTag;

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
}
