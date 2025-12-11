<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display home page
     */
    public function index()
    {
        // Get featured projects for homepage
        $featuredProjects = Project::featured()
            ->ordered()
            ->take(6)
            ->get();

        return view('home', compact('featuredProjects'));
    }

    /**
     * Display about page
     */
    public function about()
    {
        return view('about');
    }
}
