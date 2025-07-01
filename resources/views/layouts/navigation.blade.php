<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed top-0 w-full z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/logo1.jpeg') }}" alt="logo" style="width:150px;height:50px;">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('Tentang Kami') }}
                    </x-nav-link>
                    <x-nav-link :href="route('courses')" :active="request()->routeIs('coures')">
                        {{ __('Paket Kursus') }}
                    </x-nav-link>
                    <x-nav-link :href="route('instructor')" :active="request()->routeIs('instructor')">
                        {{ __('Instruktur') }}
                    </x-nav-link>
                     <x-nav-link :href="route('fasilitas')" :active="request()->routeIs('fasilitas')">
                        {{ __('Fasilitas') }}
                    </x-nav-link>
                    <x-nav-link :href="route('activity')" :active="request()->routeIs('activity')">
                        {{ __('Kegiatan') }}
                    </x-nav-link>
                   
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ __('Contact Us') }}
                    </x-nav-link>

                    <x-nav-link :href="route('courses')" :active="request()->routeIs('courses')">
                        <div class="text-center mb-2">
                            <span class="btn btn-primary btn-lg rounded-pill" style="font-size: 0.9rem;">Daftar Sekarang</span>
                        </div>
                    </x-nav-link>

                    @auth

                    @if (Auth::user()->role === 'admin')
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.*')">
                        {{ __('Admin Panel') }}
                    </x-nav-link>
                    @elseif (Auth::user()->role === 'leader')
                    <x-nav-link :href="route('leader.dashboard')" :active="request()->routeIs('leader.*')">
                        {{ __('Leader Panel') }}
                    </x-nav-link>
                    @elseif (Auth::user()->role === 'user')
                    <x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.*')">
                        <div class="text-center mb-2">
                            <span class="btn btn-danger btn-lg rounded-pill" style="font-size: 0.9rem;">Lanjutkan Pendaftaran</span>
                        </div>
                    </x-nav-link>
                    @endif
                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
</nav>

<div class="h-16"></div>