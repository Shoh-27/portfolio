<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'full_description',
        'tech_stack',
        'github_link',
        'live_link',
        'zip_file_path',
        'cover_image_path',
        'is_featured',
        'order',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Boot method - Auto generate slug from title
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title') && empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        // Delete files when project is deleted
        static::deleting(function ($project) {
            if ($project->cover_image_path) {
                Storage::disk('public')->delete($project->cover_image_path);
            }
            if ($project->zip_file_path) {
                Storage::disk('public')->delete($project->zip_file_path);
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get cover image URL
     */
    public function getCoverImageUrlAttribute(): ?string
    {
        return $this->cover_image_path
            ? Storage::disk('public')->url($this->cover_image_path)
            : null;
    }

    /**
     * Get ZIP file URL
     */
    public function getZipFileUrlAttribute(): ?string
    {
        return $this->zip_file_path
            ? Storage::disk('public')->url($this->zip_file_path)
            : null;
    }

    /**
     * Get ZIP file name
     */
    public function getZipFileNameAttribute(): ?string
    {
        return $this->zip_file_path
            ? basename($this->zip_file_path)
            : null;
    }

    /**
     * Check if project has downloadable file
     */
    public function hasDownload(): bool
    {
        return !empty($this->zip_file_path) || !empty($this->github_link);
    }

    /**
     * Scope for featured projects
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for ordered projects
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }
}
