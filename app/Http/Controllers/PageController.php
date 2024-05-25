<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Category;
use App\Models\Project;

class PageController extends Controller
{
    public function aboutIndex()
    {
        $pagePath = 'about';
        view()->share('pagePath', $pagePath);

        return view('guest.about');
    }

    public function projectsIndex()
    {
        // get all categories
        $categories = Category::active()->get();
        // get all projects
        $projects = Project::active()->get();
    
        $pagePath = 'projects';
        view()->share('pagePath', $pagePath);

        return view('guest.projects', compact('categories', 'projects'));
    }

    public function servicesIndex()
    {
        // get all services
        $services = Service::active()->get();

        $pagePath = 'services';
        view()->share('pagePath', $pagePath);

        return view('guest.services', compact('services'));
    }

    public function contactIndex()
    {
        $pagePath = 'contact';
        view()->share('pagePath', $pagePath);

        return view('guest.contact');
    }
}
