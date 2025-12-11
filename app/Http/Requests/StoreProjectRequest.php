<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:projects,title'],
            'short_description' => ['required', 'string', 'max:500'],
            'full_description' => ['required', 'string', 'min:50'],
            'tech_stack' => ['required', 'string'], // Will be converted to array
            'github_link' => ['nullable', 'url', 'max:255'],
            'live_link' => ['nullable', 'url', 'max:255'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'], // 2MB max
            'zip_file' => ['nullable', 'file', 'mimes:zip', 'max:51200'], // 50MB max
            'is_featured' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Project title is required.',
            'title.unique' => 'A project with this title already exists.',
            'short_description.required' => 'Short description is required.',
            'short_description.max' => 'Short description cannot exceed 500 characters.',
            'full_description.required' => 'Full description is required.',
            'full_description.min' => 'Full description must be at least 50 characters.',
            'tech_stack.required' => 'Tech stack is required.',
            'github_link.url' => 'GitHub link must be a valid URL.',
            'live_link.url' => 'Live link must be a valid URL.',
            'cover_image.image' => 'Cover image must be an image file.',
            'cover_image.mimes' => 'Cover image must be: jpeg, png, jpg, or webp.',
            'cover_image.max' => 'Cover image cannot exceed 2MB.',
            'zip_file.mimes' => 'File must be a ZIP archive.',
            'zip_file.max' => 'ZIP file cannot exceed 50MB.',
        ];
    }

    /**
     * Prepare data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Convert tech_stack string to array if needed
        if ($this->has('tech_stack') && is_string($this->tech_stack)) {
            $this->merge([
                'tech_stack' => array_map('trim', explode(',', $this->tech_stack)),
            ]);
        }

        // Set default values
        $this->merge([
            'is_featured' => $this->boolean('is_featured'),
            'order' => $this->input('order', 0),
        ]);
    }
}
