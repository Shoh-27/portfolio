<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of projects in admin
     */
    public function index()
    {
        $projects = Project::orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project in storage
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $data['cover_image_path'] = $this->uploadImage($request->file('cover_image'));
        }

        // Handle ZIP file upload
        if ($request->hasFile('zip_file')) {
            $data['zip_file_path'] = $this->uploadZip($request->file('zip_file'));
        }

        // Generate slug
        $data['slug'] = Str::slug($data['title']);

        // Create project
        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }


}
