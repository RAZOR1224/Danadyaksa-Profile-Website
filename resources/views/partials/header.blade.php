{{-- /resources/views/partials/header.blade.php --}}

<header 
    x-data="{ open: false, scrolled: false }"
    x-init="scrolled = window.scrollY > 50"
    @scroll.window="scrolled = window.scrollY > 50"
    :class="{ 'bg-white shadow-md': scrolled, 'bg-transparent text-white': !scrolled }"
    class="transition-colors duration-300"
    id="page-header"
>
    <nav class="container mx-auto flex justify-between items-center px-4 h-20">
        
        {{-- Brand/Logo Section --}}
        <a href="{{ route('home', app()->getLocale()) }}" class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Danadyaksa 08 Law Firm Logo" class="h-10 mr-3">
            <span class="text-2xl font-bold" :class="{ 'text-gray-900': scrolled, 'text-white': !scrolled }">
                DANADYAKSA <span class="text-accent">08</span>
            </span>
        </a>

        {{-- Right side of Navbar --}}
        <div class="hidden md:flex items-center space-x-6">
            <ul class="flex items-center space-x-8">
                <li><a href="{{ route('home', app()->getLocale()) }}" :class="{ 'text-gray-700 hover:text-primary': scrolled, 'hover:text-gray-300': !scrolled }" class="font-medium transition-colors">{{ __('nav.home') }}</a></li>
                <li><a href="{{ route('about', app()->getLocale()) }}" :class="{ 'text-gray-700 hover:text-primary': scrolled, 'hover:text-gray-300': !scrolled }" class="font-medium transition-colors">{{ __('nav.about') }}</a></li>
                <li><a href="{{ route('services', app()->getLocale()) }}" :class="{ 'text-gray-700 hover:text-primary': scrolled, 'hover:text-gray-300': !scrolled }" class="font-medium transition-colors">{{ __('nav.services') }}</a></li>
                <li><a href="{{ route('team', app()->getLocale()) }}" :class="{ 'text-gray-700 hover:text-primary': scrolled, 'hover:text-gray-300': !scrolled }" class="font-medium transition-colors">{{ __('nav.team') }}</a></li>
                <li><a href="{{ route('articles', app()->getLocale()) }}" :class="{ 'text-gray-700 hover:text-primary': scrolled, 'hover:text-gray-300': !scrolled }" class="font-medium transition-colors">{{ __('nav.articles') }}</a></li>
                
                <li class="relative" x-data="{ miscOpen: false }">
                    <button @click="miscOpen = !miscOpen" class="flex items-center font-medium transition-colors" :class="{ 'text-gray-700 hover:text-primary': scrolled, 'hover:text-gray-300': !scrolled }">
                        <span>{{ __('nav.misc') }}</span>
                        <i class="fas fa-chevron-down ml-2 text-xs transition-transform" :class="{ 'rotate-180': miscOpen }"></i>
                    </button>
                    <div x-show="miscOpen" @click.away="miscOpen = false" class="absolute top-full left-0 mt-2 bg-white rounded-md shadow-lg py-1 z-10 w-56" style="display: none;">
                        <a href="{{ route('business-intelligence', app()->getLocale()) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('nav.bi') }}</a>
                        <a href="{{ route('service-estimation-time', app()->getLocale()) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('nav.set') }}</a>
                    </div>
                </li>

                <li><a href="{{ route('contact', app()->getLocale()) }}" :class="{ 'text-gray-700 hover:text-primary': scrolled, 'hover:text-gray-300': !scrolled }" class="font-medium transition-colors">{{ __('nav.contact') }}</a></li>
            </ul>

            {{-- Language Switcher Dropdown --}}
            <div class="relative" x-data="{ langOpen: false }">
                <button @click="langOpen = !langOpen" class="flex items-center font-medium transition-colors p-2 rounded-md" :class="{ 'text-gray-700 hover:bg-gray-100': scrolled, 'hover:bg-white/10': !scrolled }">
                    <span>{{ strtoupper(app()->getLocale()) }}</span>
                    <i class="fas fa-chevron-down ml-2 text-xs transition-transform" :class="{ 'rotate-180': langOpen }"></i>
                </button>
                <div x-show="langOpen" @click.away="langOpen = false" class="absolute top-full right-0 mt-2 bg-white rounded-md shadow-lg py-1 z-10 w-32" style="display: none;">
                    <a href="{{ route(request()->route()->getName() ?: 'home', 'en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">English (EN)</a>
                    <a href="{{ route(request()->route()->getName() ?: 'home', 'id') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Indonesia (ID)</a>
                </div>
            </div>

            <div class="border-l h-6" :class="{'border-gray-300': scrolled, 'border-white/20': !scrolled}"></div>

            {{-- === BAGIAN YANG DIPERBARUI === --}}
            @auth
                {{-- Dropdown untuk User yang Sudah Login --}}
                <div class="relative" x-data="{ userMenuOpen: false }">
                    <button @click="userMenuOpen = !userMenuOpen" class="flex items-center font-medium transition-colors" :class="{ 'text-gray-700 hover:text-primary': scrolled, 'hover:text-gray-300': !scrolled }">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down ml-2 text-xs transition-transform" :class="{ 'rotate-180': userMenuOpen }"></i>
                    </button>
                    <div x-show="userMenuOpen" @click.away="userMenuOpen = false" class="absolute top-full right-0 mt-2 bg-white rounded-md shadow-lg py-1 z-10 w-48" style="display: none;">
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <hr class="border-gray-200">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                {{-- Link untuk Tamu (Guest) --}}
                <a href="{{ route('login') }}" class="font-medium" :class="{ 'text-gray-700 hover:text-primary': scrolled, 'hover:text-gray-300': !scrolled }">Login</a>
            @endguest
            {{-- === AKHIR BAGIAN YANG DIPERBARUI === --}}
        </div>

        {{-- Mobile Menu Button --}}
        <button @click="open = !open" class="md:hidden focus:outline-none" :class="{ 'text-gray-900': scrolled, 'text-white': !scrolled }">
            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </nav>

    {{-- Mobile Dropdown Menu --}}
    <div x-show="open" @click.away="open = false" class="md:hidden bg-white shadow-lg">
        <ul class="py-2 text-gray-700">
            {{-- ... link-link publik Anda ... --}}

            {{-- === BAGIAN YANG DIPERBARUI UNTUK MOBILE === --}}
            <hr class="my-2">
            @auth
                <li class="px-4 pt-2 pb-1">
                    <div class="font-bold text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </li>
                <li><a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-4 py-2 hover:bg-gray-100">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-100">Login</a></li>
                <li><a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-gray-100">Register</a></li>
            @endauth
        </ul>
    </div>
</header>