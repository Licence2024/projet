<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <img src="{{ asset('./logo.png') }}" class="block h-12 w-auto fill-current text-gray-600" alt="logo west cole">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Commandes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                        {{ __('Nos produits') }}
                    </x-nav-link>
                    @auth
                        @if (Auth::user()->admin == 1)
                            <x-nav-link :href="route('products.admin')" :active="request()->routeIs('products.admin')">
                                {{ __('Administrer les produits') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <navbar-cart></navbar-cart>
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                    {{ __('Se connecter') }}
                                </x-nav-link>
                                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                    {{ __('Créer un compte') }}
                                </x-nav-link>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <navbar-cart></navbar-cart>
                <div
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <div class="mx-2 font-medium text-lg text-indigo-700">{{ Auth::user()?->name }}</div>
                                    <hr>
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @endauth
                            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Commandes') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                                {{ __('Nos Produits') }}
                            </x-responsive-nav-link>
                            @auth
                                @if (Auth::user()->admin == 1)
                                    <x-responsive-nav-link :href="route('products.admin')" :active="request()->routeIs('products.admin')">
                                        {{ __('Administrer') }}
                                    </x-responsive-nav-link>
                                @endif
                            @else
                                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                    {{ __('Se connecter') }}
                                </x-responsive-nav-link>
                                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                    {{ __('Créer un compte') }}
                                </x-responsive-nav-link>
                            @endauth
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </div>

</nav>
