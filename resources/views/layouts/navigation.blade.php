<nav x-data="{ open: false }" class="bg-[#181818] border-b-4 border-red-600">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo and Dashboard -->
            <div class="flex items-center space-x-6">
                <!-- اسم الموقع -->
                <a href="{{ route('dashboard') }}" class="text-red-600 text-2xl font-bold">
                    My Movie
                </a>

                <!-- Dashboard Link -->
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class="text-white text-xl font-bold hover:text-red-600">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <div class="flex items-center space-x-8">
                    <!-- User Name with Profile Link -->
                    <a href="{{ route('profile.show', Auth::user()->id) }}"
                        class="text-white text-xl font-bold hover:text-red-600">
                        {{ Auth::user()->username ?? Auth::user()->name }}
                    </a>

                    <!-- Blog Link -->
                    <a href="{{ route('blog.index') }}" class="text-white text-xl font-bold hover:text-red-600">
                        Blog
                    </a>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-white text-xl font-bold hover:text-red-600 focus:outline-none">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
                @else
                <div class="flex space-x-6">
                    <!-- Blog Link -->
                    <a href="{{ route('blog.index') }}"
                        class="text-sm text-white text-xl font-bold hover:text-red-600 underline">Blog</a>
                    <!-- Login Link -->
                    <a href="{{ route('login') }}"
                        class="text-sm text-white text-xl font-bold hover:text-red-600 underline">Login</a>
                    <!-- Register Link -->
                    <a href="{{ route('register') }}"
                        class="text-sm text-white text-xl font-bold hover:text-red-600 underline">Register</a>
                </div>
                @endauth
            </div>

            <!-- Hamburger Menu for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-red-600 hover:bg-gray-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>