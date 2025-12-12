{{--
    Navbar Component
    Location: resources/views/components/navbar.blade.php

    Bu component barcha sahifalarda ko'rinadi va quyidagilarni o'z ichiga oladi:
    - Logo va branding
    - Desktop navigation
    - Mobile hamburger menu
    - Auth links (Login/Logout)
    - Admin panel link (faqat adminlar uchun)
    - Active page highlighting
--}}

<nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- Logo / Brand Name --}}
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center group">
                    <div class="text-2xl font-bold">
                        <span class="text-gray-900 group-hover:text-primary transition-colors duration-300">
                            Your
                        </span>
                        <span class="text-primary group-hover:text-secondary transition-colors duration-300">
                            Portfolio
                        </span>
                    </div>
                </a>
            </div>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex space-x-1">
                {{-- Home Link --}}
                <a href="{{ route('home') }}"
                   class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 hover:text-primary transition-all duration-200 font-medium
                          {{ request()->routeIs('home') ? 'bg-primary text-white hover:bg-secondary hover:text-white' : '' }}">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Home
                    </span>
                </a>

                {{-- About Link --}}
                <a href="{{ route('about') }}"
                   class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 hover:text-primary transition-all duration-200 font-medium
                          {{ request()->routeIs('about') ? 'bg-primary text-white hover:bg-secondary hover:text-white' : '' }}">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        About
                    </span>
                </a>

                {{-- Projects Link --}}
                <a href="{{ route('projects.index') }}"
                   class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 hover:text-primary transition-all duration-200 font-medium
                          {{ request()->routeIs('projects.*') && !request()->routeIs('admin.*') ? 'bg-primary text-white hover:bg-secondary hover:text-white' : '' }}">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        Projects
                    </span>
                </a>

                {{-- Admin Link (faqat adminlar uchun) --}}
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.projects.index') }}"
                           class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 hover:text-primary transition-all duration-200 font-medium
                                  {{ request()->routeIs('admin.*') ? 'bg-primary text-white hover:bg-secondary hover:text-white' : '' }}">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Admin
                            </span>
                        </a>
                    @endif
                @endauth
            </div>

            {{-- Auth Buttons (Desktop) --}}
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    {{-- User Profile Dropdown --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                                class="flex items-center space-x-2 px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                            <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="font-medium">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div x-show="open"
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50 border border-gray-200"
                             style="display: none;">

                            <div class="px-4 py-2 border-b border-gray-200">
                                <p class="text-sm text-gray-500">Signed in as</p>
                                <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->email }}</p>
                            </div>

                            @if(auth()->user()->is_admin)
                                <a href="{{ route('admin.projects.index') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Admin Dashboard
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="px-6 py-2 text-gray-700 hover:text-primary font-medium transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-6 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-secondary transition transform hover:scale-105">
                        Get Started
                    </a>
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <div class="md:hidden">
                <button id="mobile-menu-button"
                        class="p-2 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"
                        aria-label="Toggle mobile menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 shadow-lg">
        <div class="px-4 pt-2 pb-4 space-y-1">
            {{-- Home --}}
            <a href="{{ route('home') }}"
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 font-medium transition
                      {{ request()->routeIs('home') ? 'bg-primary text-white' : '' }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Home
                </span>
            </a>

            {{-- About --}}
            <a href="{{ route('about') }}"
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 font-medium transition
                      {{ request()->routeIs('about') ? 'bg-primary text-white' : '' }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    About
                </span>
            </a>

            {{-- Projects --}}
            <a href="{{ route('projects.index') }}"
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 font-medium transition
                      {{ request()->routeIs('projects.*') && !request()->routeIs('admin.*') ? 'bg-primary text-white' : '' }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Projects
                </span>
            </a>

            {{-- Admin (faqat adminlar uchun) --}}
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.projects.index') }}"
                       class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 font-medium transition
                              {{ request()->routeIs('admin.*') ? 'bg-primary text-white' : '' }}">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Admin Panel
                        </span>
                    </a>
                @endif
            @endauth

            {{-- Divider --}}
            <div class="border-t border-gray-200 my-2"></div>

            {{-- Auth Links (Mobile) --}}
            @auth
                <div class="px-4 py-2 bg-gray-50 rounded-lg mb-2">
                    <p class="text-xs text-gray-500">Signed in as</p>
                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 font-medium transition flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Sign Out
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-100 font-medium transition text-center">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="block px-4 py-3 rounded-lg bg-primary text-white hover:bg-secondary font-medium transition text-center">
                    Get Started
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- Alpine.js CDN (dropdown uchun kerak) --}}
@once
    @push('scripts')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush
@endonce

{{-- Mobile Menu Toggle Script --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');

                    // Animate icon
                    const icon = this.querySelector('svg');
                    if (mobileMenu.classList.contains('hidden')) {
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>';
                    } else {
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
                    }
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                        const icon = mobileMenuButton.querySelector('svg');
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>';
                    }
                });
            }
        });
    </script>
@endpush
