<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'projectsCount' => PortfolioProject::count(),
            'servicesCount' => Service::count(),
        ]);
    }
}
