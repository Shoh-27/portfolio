@extends('layouts.app')

@section('title', 'Home')
@section('description', 'Welcome to my portfolio. I am a Full-Stack Developer specializing in Laravel, Vue.js, and modern web technologies.')

@section('content')

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20 md:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in">
                    Hi, I'm <span class="text-yellow-300">Your Name</span>
                </h1>
                <p class="text-xl md:text-2xl mb-4 text-gray-100">
                    Full-Stack Developer & Software Engineer
                </p>
                <p class="text-lg md:text-xl mb-8 text-gray-200 max-w-2xl mx-auto">
                    I build modern, scalable web applications with clean code and beautiful interfaces.
                    Passionate about Laravel, Vue.js, and creating amazing user experiences.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('projects.index') }}"
                       class="bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition transform hover:scale-105 shadow-lg">
                        View My Projects
                    </a>
                    <a href="{{ route('about') }}"
                       class="glass-effect px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary transition transform hover:scale-105">
                        Learn More About Me
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    @if($featuredProjects->count() > 0)
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Featured Projects
                    </h2>
                    <p class="text-gray-600 text-lg">
                        Check out some of my recent work
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($featuredProjects as $project)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover-lift">
                            @if($project->cover_image_url)
                                <img src="{{ $project->cover_image_url }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                    <span class="text-white text-4xl font-bold">{{ substr($project->title, 0, 1) }}</span>
                                </div>
                            @endif

                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                    {{ $project->title }}
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    {{ $project->short_description }}
                                </p>

                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach(array_slice($project->tech_stack, 0, 3) as $tech)
                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm rounded-full">
                                    {{ $tech }}
                                </span>
                                    @endforeach
                                </div>

                                <a href="{{ route('projects.show', $project) }}"
                                   class="text-primary font-semibold hover:text-secondary transition">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('projects.index') }}"
                       class="inline-block bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-secondary transition">
                        View All Projects
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- Skills Section -->
    <section class="bg-gray-100 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Skills & Technologies
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                    $skills = [
                        ['name' => 'Laravel', 'icon' => '⚡'],
                        ['name' => 'Vue.js', 'icon' => '💚'],
                        ['name' => 'MySQL', 'icon' => '🗄️'],
                        ['name' => 'Tailwind CSS', 'icon' => '🎨'],
                        ['name' => 'PHP', 'icon' => '🐘'],
                        ['name' => 'JavaScript', 'icon' => '⚡'],
                        ['name' => 'Git', 'icon' => '📦'],
                        ['name' => 'Docker', 'icon' => '🐳'],
                    ];
                @endphp

                @foreach($skills as $skill)
                    <div class="bg-white p-6 rounded-xl shadow-md text-center hover-lift">
                        <div class="text-4xl mb-3">{{ $skill['icon'] }}</div>
                        <h3 class="font-semibold text-gray-900">{{ $skill['name'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Let's Work Together
            </h2>
            <p class="text-gray-600 text-lg mb-8">
                I'm always interested in hearing about new projects and opportunities.
            </p>
            <a href="mailto:your.email@example.com"
               class="inline-block bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-secondary transition transform hover:scale-105">
                Get In Touch
            </a>
        </div>
    </section>

@endsection
