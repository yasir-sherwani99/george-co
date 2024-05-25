<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $data = [];

        $data['title'] = "Dashboard";
        $data['section'] = null;
        $data['page'] = "Dashboard";

        view()->share('breadcrumbs', $data);

        return view('admin.dashboard.index');
    }
}
