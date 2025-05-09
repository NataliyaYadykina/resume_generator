<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <!-- Primary Navigation Menu -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="d-flex">
                <!-- Logo -->
                <div class="shrink-0 d-flex align-items-center">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="70" height="70">
                            <circle cx="50" cy="50" r="45" fill="#f4a261" />
                            <path d="M30,40 L40,40 C50,40 50,50 40,50 L30,50 Z" fill="#fff" />
                            <path d="M40,40 L40,60 L70,60 C80,60 80,50 70,50 L40,50 Z" fill="#fff" />
                            <circle cx="50" cy="50" r="10" fill="#e76f51" />
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="d-none d-lg-flex ms-4">
                    <x-nav-link :href="route('resumes.index')" :active="request()->routeIs('resumes.index')" class="nav-link" style="display: inline-flex">
                        Личный кабинет
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="d-none d-sm-flex align-items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="btn btn-link dropdown-toggle text-gray-500" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"
                            style="display:flex;align-items:center;gap:5px;text-decoration: none;">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                            Профиль
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('resumes.index')" class="dropdown-item">
                            Мои резюме
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('templates.index')" class="dropdown-item">
                            Шаблоны
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                class="dropdown-item">
                                Выход
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile view) -->
            <div class="d-flex d-lg-none">
                <button @click="open = ! open" class="btn btn-link text-gray-400 p-2" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile view) -->
    <div :class="{ 'block': open, 'collapse': !open }" id="navbarNav">
        <div class="pt-2 pb-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-top">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3">
                <x-responsive-nav-link :href="route('profile.edit')" class="nav-link">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();"
                        class="nav-link">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
