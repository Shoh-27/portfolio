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

    /**
     * Show the form for editing the specified project
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Delete old image
            if ($project->cover_image_path) {
                Storage::disk('public')->delete($project->cover_image_path);
            }
            $data['cover_image_path'] = $this->uploadImage($request->file('cover_image'));
        }

        // Handle ZIP file upload
        if ($request->hasFile('zip_file')) {
            // Delete old ZIP
            if ($project->zip_file_path) {
                Storage::disk('public')->delete($project->zip_file_path);
            }
            $data['zip_file_path'] = $this->uploadZip($request->file('zip_file'));
        }

        // Update slug if title changed
        if ($request->has('title') && $request->title !== $project->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Update project
        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified project from storage
     */
    public function destroy(Project $project)
    {
        // Files will be deleted automatically via model event
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }

    /**
     * Upload image file
     */
    private function uploadImage($file): string
    {
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('projects/images', $filename, 'public');

        return $path;
    }

    /**
     * Upload ZIP file
     */
    private function uploadZip($file): string
    {
        $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.zip';
        $path = $file->storeAs('projects/zips', $filename, 'public');

        return $path;
    }
}
