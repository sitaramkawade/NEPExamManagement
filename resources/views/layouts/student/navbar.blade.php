<div>
    <!-- Navbar -->
    <header class="relative bg-white dark:bg-darker">
        <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
            <!-- Mobile menu button -->
            <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen" class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
                <span class="sr-only">Open main manu</span>
                <span aria-hidden="true">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </span>
            </button>

            <!-- Sidebar button -->
            <button x-cloak @click="isSidebarExpanded = !isSidebarExpanded" class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark  focus:outline-none focus:ring hidden md:block">
                <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 transform" :class="isSidebarExpanded ? 'rotate-180' : 'rotate-0'">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="4" y1="6" x2="14" y2="6" />
                    <line x1="4" y1="18" x2="14" y2="18" />
                    <path d="M4 12h17l-3 -3m0 6l3 -3" />
                </svg>
            </button>

            <!-- Brand -->
            <a href="{{ url('/') }}" class="  md:hidden text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
                {{ env('APP_NAME') }}
            </a>


            <!-- Mobile sub menu button -->
            <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen" class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
                <span class="sr-only">Open sub manu</span>
                <span aria-hidden="true">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </span>
            </button>

            <!-- Desktop Right buttons -->
            <nav aria-label="Secondary" class=" z-50 hidden space-x-2 md:flex md:items-center">
                <!-- Desktop Toggle dark theme button -->
                <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                    <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter">
                    </div>
                    <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm" :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }">
                        <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                </button>


                <!-- Desktop Settings button -->
                <button x-cloak @click="openSettingsPanel" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                    <span class="sr-only">Open settings panel</span>
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>

                <!--Desktop User avatar button -->
                <div x-cloak class="relative" x-data="{ open: false }">
                    <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'" class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                        <span class="sr-only">User menu</span>
                        <img class="w-9 h-9 rounded-full" src="{{ asset('img/no-img.png') }}" alt="User" />
                    </button>

                    <!-- Desktop User dropdown menu -->
                    <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out" x-transition:enter-start="translate-y-1/2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-all transform ease-in" @keydown.escape="open = false" class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none" tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
                        <a wire:navigate href="{{ route('student') }}" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                            Student Home
                         </a>
                        @auth('student')
                            {{-- <p class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">{{ auth()->guard('student')->user()->student_name }}</p>
                            <hr> --}}
                            <a wire:navigate href="{{ route('student.dashboard') }}" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                               Student Dashboard
                            </a>

                            <form method="POST" action="{{ route('student.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('student.logout')"  onclick="event.preventDefault(); this.closest('form').submit();" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                    Student Logout
                                </x-dropdown-link>
                            </form>
                        @else
                            <a wire:navigate href="{{ route('student.login') }}" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                               Student Login
                            </a>
                            <a wire:navigate href="{{ route('student.register') }}" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                               Student Register
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>

            <!-- Mobile sub menu -->
            <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-full opacity-0" x-show="isMobileSubMenuOpen" @click.away="isMobileSubMenuOpen = false" class=" z-50 absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden" aria-label="Secondary">
                <div class="space-x-2">
                    <!-- Mobile Toggle dark theme button -->
                    <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                        <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter">
                        </div>
                        <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm" :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }">
                            <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        </div>
                    </button>

                    <!-- Mobile Settings button -->
                    <button x-cloak @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                        <span class="sr-only">Open settings panel</span>
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile User avatar button -->
                <div x-cloak class="relative ml-auto" x-data="{ open: false }">
                    <button @click="open = !open" type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'" class="block mx-auto transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                        <span class="sr-only">User menu</span>
                        <img class=" items-center w-9 h-9 rounded-full" src="{{ asset('img/no-img.png') }}" alt="User" />
                    </button>

                    <!-- Mobile User dropdown menu -->
                    <div  x-show="open" x-transition:enter="transition-all transform ease-out" x-transition:enter-start="translate-y-1/2 opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition-all transform ease-in" x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false" role="menu" aria-orientation="vertical" aria-label="User menu">
                        <a wire:navigate href="{{ route('student') }}" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                            Student Home
                        </a>
                        @auth('student')
                            {{-- <p class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">{{ auth()->guard('student')->user()->student_name }}</p>
                            <hr> --}}
                            <a wire:navigate href="{{ route('student.dashboard') }}" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                              Student  Dashboard
                            </a>

                            <form method="POST" action="{{ route('student.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('student.logout')"  onclick="event.preventDefault(); this.closest('form').submit();" role="menuitem" class="block px-4 py-2 text-sm text-start text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                    <span class="ml-2 duration-300 ease-in-out">Student Logout</span>
                                </x-dropdown-link>
                            </form>
                        @else
                            <a wire:navigate href="{{ route('student.login') }}" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                <span class="ml-2 duration-300 ease-in-out">Student Login</span>
                            </a>
                            <a wire:navigate href="{{ route('student.register') }}" role="menuitem" class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                <span class="ml-2 duration-300 ease-in-out">Student Register</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
        <!-- Mobile Sidebar -->
        <div class="border-b md:hidden dark:border-primary-darker" x-show="isMobileMainMenuOpen" @click.away="isMobileMainMenuOpen = false">
            <nav aria-label="Main" class="px-2 py-4 space-y-2">
                <a wire:navigate href="{{ route('student') }}" :class="{ 'bg-primary-100 dark:bg-primary': '{{ request()->routeis('student') }}' }" class="flex items-center p-2 px-5 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                    <span aria-hidden="true">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>   
                        </span>
                    </span>
                    <span class="ml-2 duration-300 ease-in-out">Student Home</span>
                </a>
                @auth('student')
                    <a wire:navigate href="{{ route('student.dashboard') }}" :class="{ 'bg-primary-100 dark:bg-primary': '{{ request()->routeis('student.dashboard') }}' }" class="flex items-center p-2 px-5 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                        </span>
                        <span class="ml-2 duration-300 ease-in-out">Student Dashboard</span>
                    </a>
                    <form  method="POST" action="{{ route('student.logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('student.logout')"  onclick="event.preventDefault(); this.closest('form').submit();" :class="{ 'bg-primary-100 dark:bg-primary': '{{ request()->routeis('student.logout') }}' }" class="flex items-center  p-2 px-5 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg> 
                            </span>
                            <span class="ml-2 duration-300 ease-in-out">Student Logout</span>
                        </x-dropdown-link>
                    </form>
                @else
                    <a wire:navigate href="{{ route('student.login') }}" :class="{ 'bg-primary-100 dark:bg-primary': '{{ request()->routeis('student.login') }}' }" class="flex items-center p-2 px-5 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                        </span>
                        <span class="ml-2 duration-300 ease-in-out">Student Login</span>
                    </a>
                    <a wire:navigate href="{{ route('student.register') }}" :class="{ 'bg-primary-100 dark:bg-primary': '{{ request()->routeis('student.register') }}' }" class="flex items-center p-2 px-5 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <span class="ml-2 duration-300 ease-in-out">Student Register</span>
                    </a>
                @endauth
            </nav>
        </div>
    </header>
</div>
