<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home', ['locale' => app()->getLocale()])" :active="request()->routeIs('home')">
                        {{ __('nav.home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about', ['locale' => app()->getLocale()])" :active="request()->routeIs('about')">
                        {{ __('nav.about') }}
                    </x-nav-link>
                    <x-nav-link :href="route('services', ['locale' => app()->getLocale()])" :active="request()->routeIs('services')">
                        {{ __('nav.services') }}
                    </x-nav-link>
                    <x-nav-link :href="route('team', ['locale' => app()->getLocale()])" :active="request()->routeIs('team')">
                        {{ __('nav.team') }}
                    </x-nav-link>
                    <x-nav-link :href="route('articles', ['locale' => app()->getLocale()])" :active="request()->routeIs('articles')">
                        {{ __('nav.articles') }}
                    </x-nav-link>

                    <div class="hidden sm:flex sm:items-center sm:ms-10">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ __('nav.misc') }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('business-intelligence', ['locale' => app()->getLocale()])">
                                    {{ __('nav.bi') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('service-estimation-time', ['locale' => app()->getLocale()])">
                                    {{ __('nav.set') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="flex items-center space-x-2 font-semibold mr-4">
                    <a href="{{ route(Route::currentRouteName(), ['locale' => 'en'] + request()->route()->parameters()) }}" class="{{ app()->getLocale() == 'en' ? 'text-accent' : 'text-gray-500 hover:text-accent' }} transition-colors">EN</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route(Route::currentRouteName(), ['locale' => 'id'] + request()->route()->parameters()) }}" class="{{ app()->getLocale() == 'id' ? 'text-accent' : 'text-gray-500 hover:text-accent' }} transition-colors">ID</a>
                </div>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                             <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')"> {{ __('nav.dashboard') }} </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')"> {{ __('nav.profile') }} </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('nav.log_out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">{{ __('nav.log_in') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ms-4 text-sm font-semibold text-gray-600 hover:text-gray-900">{{ __('nav.register') }}</a>
                    @endif
                @endguest
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                 <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home', ['locale' => app()->getLocale()])" :active="request()->routeIs('home')"> {{ __('nav.home') }} </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about', ['locale' => app()->getLocale()])" :active="request()->routeIs('about')"> {{ __('nav.about') }} </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('services', ['locale' => app()->getLocale()])" :active="request()->routeIs('services')"> {{ __('nav.services') }} </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('team', ['locale' => app()->getLocale()])" :active="request()->routeIs('team')"> {{ __('nav.team') }} </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('articles', ['locale' => app()->getLocale()])" :active="request()->routeIs('articles')"> {{ __('nav.articles') }} </x-responsive-nav-link>
            
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ __('nav.misc') }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('business-intelligence', ['locale' => app()->getLocale()])">
                        {{ __('nav.bi') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('service-estimation-time', ['locale' => app()->getLocale()])">
                        {{ __('nav.set') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')"> {{ __('nav.dashboard') }} </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.edit')"> {{ __('nav.profile') }} </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('nav.log_out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('login')"> {{ __('nav.log_in') }} </x-responsive-nav-link>
                    @if (Route::has('register'))
                         <x-responsive-nav-link :href="route('register')"> {{ __('nav.register') }} </x-responsive-nav-link>
                    @endif
                </div>
            @endguest
        </div>
    </div>
</nav>