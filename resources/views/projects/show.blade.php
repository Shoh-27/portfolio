@extends('layouts.app')

@section('title', $project->title)
@section('description', $project->short_description)
@section('og_image', $project->cover_image_url ?? asset('images/default-og.jpg'))

@section('content')

    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex text-gray-600 text-sm">
                <a href="{{ route('home') }}" class="hover:text-primary">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('projects.index') }}" class="hover:text-primary">Projects</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900">{{ $project->title }}</span>
            </nav>
        </div>
    </div>

    <!-- Project Header -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900">
                    {{ $project->title }}
                </h1>

                @if($project->is_featured)
                    <span class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-full font-semibold">
                    ⭐ Featured
                </span>
                @endif
            </div>

            <p class="text-xl text-gray-600 mb-6">
                {{ $project->short_description }}
            </p>

            <!-- Tech Stack -->
            <div class="flex flex-wrap gap-3 mb-8">
                @foreach($project->tech_stack as $tech)
                    <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-medium">
                    {{ $tech }}
                </span>
                @endforeach
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-4">
                @if($project->github_link)
                    <a href="{{ $project->github_link }}"
                       target="_blank"
                       class="inline-flex items-center px-6 py-3 bg-gray-900 text-white rounded-lg font-semibold hover:bg-gray-800 transition">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        View on GitHub
                    </a>
                @endif

                @if($project->live_link)
                    <a href="{{ $project->live_link }}"
                       target="_blank"
                       class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Live Demo
                    </a>
                @endif

                @if($project->zip_file_path)
                    <a href="{{ route('projects.download', $project) }}"
                       class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download ZIP
                    </a>
                @endif
            </div>
        </div>
    </section>

    <!-- Project Image -->
    @if($project->cover_image_url)
        <section class="py-8 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <img src="{{ $project->cover_image_url }}"
                     alt="{{ $project->title }}"
                     class="w-full rounded-xl shadow-2xl">
            </div>
        </section>
    @endif

    <!-- Project Description -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">About This Project</h2>
                <div class="prose prose-lg max-w-none text-gray-700">
                    {!! nl2br(e($project->full_description)) !!}
                </div>
            </div>
        </div>
    </section>

    <!-- Project Features/Technologies -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Technologies Used</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($project->tech_stack as $tech)
                        <div class="flex items-center p-4 bg-blue-50 rounded-lg">
                            <span class="text-blue-600 text-xl mr-3">✓</span>
                            <span class="text-gray-900 font-medium">{{ $tech }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Back Button -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <a href="{{ route('projects.index') }}"
               class="inline-flex items-center text-primary font-semibold hover:text-secondary transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to All Projects
            </a>
        </div>
    </section>

@endsection
