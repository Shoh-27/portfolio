@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')

    <div class="min-h-screen bg-gray-100 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-6">
                <a href="{{ route('admin.projects.index') }}"
                   class="inline-flex items-center text-primary hover:text-secondary transition mb-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to Projects
                </a>
                <h1 class="text-3xl font-bold text-gray-900">Edit Project: {{ $project->title }}</h1>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.projects.update', $project) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="bg-white rounded-lg shadow-md p-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Project Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="title"
                           id="title"
                           value="{{ old('title', $project->title) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('title') border-red-500 @enderror"
                           required>
                    @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Description -->
                <div class="mb-6">
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                        Short Description <span class="text-red-500">*</span>
                    </label>
                    <textarea name="short_description"
                              id="short_description"
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('short_description') border-red-500 @enderror"
                              required>{{ old('short_description', $project->short_description) }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">Brief description for project card (max 500 characters)</p>
                    @error('short_description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Full Description -->
                <div class="mb-6">
                    <label for="full_description" class="block text-sm font-medium text-gray-700 mb-2">
                        Full Description <span class="text-red-500">*</span>
                    </label>
                    <textarea name="full_description"
                              id="full_description"
                              rows="8"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('full_description') border-red-500 @enderror"
                              required>{{ old('full_description', $project->full_description) }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">Detailed project description (min 50 characters)</p>
                    @error('full_description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tech Stack -->
                <div class="mb-6">
                    <label for="tech_stack" class="block text-sm font-medium text-gray-700 mb-2">
                        Tech Stack <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="tech_stack"
                           id="tech_stack"
                           value="{{ old('tech_stack', implode(', ', $project->tech_stack)) }}"
                           placeholder="Laravel, Vue.js, MySQL, Tailwind CSS"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('tech_stack') border-red-500 @enderror"
                           required>
                    <p class="mt-1 text-sm text-gray-500">Comma-separated list of technologies</p>
                    @error('tech_stack')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Links -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="github_link" class="block text-sm font-medium text-gray-700 mb-2">
                            GitHub Link
                        </label>
                        <input type="url"
                               name="github_link"
                               id="github_link"
                               value="{{ old('github_link', $project->github_link) }}"
                               placeholder="https://github.com/username/repo"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('github_link') border-red-500 @enderror">
                        @error('github_link')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="live_link" class="block text-sm font-medium text-gray-700 mb-2">
                            Live Demo Link
                        </label>
                        <input type="url"
                               name="live_link"
                               id="live_link"
                               value="{{ old('live_link', $project->live_link) }}"
                               placeholder="https://example.com"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('live_link') border-red-500 @enderror">
                        @error('live_link')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Current Files Display -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    @if($project->cover_image_url)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Cover Image</label>
                            <img src="{{ $project->cover_image_url }}"
                                 alt="{{ $project->title }}"
                                 class="w-full h-48 object-cover rounded-lg border border-gray-300">
                        </div>
                    @endif

                    @if($project->zip_file_path)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current ZIP File</label>
                            <div class="bg-gray-50 border border-gray-300 rounded-lg p-4">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-gray-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/>
                                        <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $project->zip_file_name }}</p>
                                        <a href="{{ route('projects.download', $project) }}"
                                           class="text-sm text-primary hover:text-secondary">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- File Uploads -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $project->cover_image_url ? 'Replace Cover Image' : 'Cover Image' }}
                        </label>
                        <input type="file"
                               name="cover_image"
                               id="cover_image"
                               accept="image/jpeg,image/png,image/jpg,image/webp"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('cover_image') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">JPEG, PNG, JPG, WEBP (max 2MB)</p>
                        @error('cover_image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="zip_file" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $project->zip_file_path ? 'Replace ZIP File' : 'Project ZIP File' }}
                        </label>
                        <input type="file"
                               name="zip_file"
                               id="zip_file"
                               accept=".zip"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('zip_file') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">ZIP archive (max 50MB)</p>
                        @error('zip_file')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Featured & Order -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox"
                                   name="is_featured"
                                   value="1"
                                   {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-primary focus:ring-primary">
                            <span class="ml-2 text-sm text-gray-700">Mark as Featured Project</span>
                        </label>
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                            Display Order
                        </label>
                        <input type="number"
                               name="order"
                               id="order"
                               value="{{ old('order', $project->order) }}"
                               min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('order') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                        @error('order')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-between pt-6 border-t border-gray-200">
                    <form action="{{ route('admin.projects.destroy', $project) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-6 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                            Delete Project
                        </button>
                    </form>

                    <div class="flex space-x-4">
                        <a href="{{ route('admin.projects.index') }}"
                           class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-6 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition">
                            Update Project
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
