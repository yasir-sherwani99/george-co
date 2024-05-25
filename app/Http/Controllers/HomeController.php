<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        // get all services
        $services = Service::active()->get();

        $pagePath = 'home';
        view()->share('pagePath', $pagePath);

        return view('guest.index', compact('services'));
    }   
}
