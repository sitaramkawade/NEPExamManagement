<div x-data x-cloak  >
    <!-- Sidebar -->
    <aside x-data x-cloak class=" hidden md:flex  flex-col bg-white h-full dark:border-primary-darker dark:bg-darker transition-all duration-300 ease-in-out" :class="isSidebarExpanded ? 'w-64' : 'w-20'">
        <div class="flex  h-full flex-col dark:border-primary-darker">
            <a wire:navigate href="{{ url('/') }}" class="h-13 py-0.5  border-b border-r flex items-center  dark:border-primary-darker dark:bg-darker  ocus:outline-none focus:text-gray-100 focus:bg-opacity-50 overflow-hidden">
                {{-- <svg viewBox="0 0 20 20" fill="currentColor" class="h-11 w-11 flex-shrink-0">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                </svg> --}}
                {{-- <span class="ml-2 text-xl font-medium duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100   py-3.5' : 'opacity-0'">{{ env('APP_NAME') }}</span> --}}
                <img class="h-14 w-32 mx-auto flex-shrink-0" src="{{ asset('img/shikshan-logo.png') }}" alt="">
            </a>
            <!-- Sidebar links -->
            <nav x-cloak aria-label="Main" class="p-2 space-y-2 items-center flex-1 overflow-x-hidden border-r dark:border-primary-darker dark:bg-darker  overflow-y-hidden hover:overflow-y-auto">
                <a wire:navigate href="{{ route('user') }}" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('user') }}' }" class="flex items-center h-10 p-2 px-5  transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>   
                    </span>
                    <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">User Home</span>
                </a>
                @auth('user')
                    <a wire:navigate href="{{ route('user.dashboard') }}" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('user.dashboard') }}' }" class="h-10 flex items-center p-2 px-5  transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                        </span>
                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">User Dashboard</span>
                    </a>

                     <a wire:navigate href="{{ route('user.college') }}" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('user.college') }}' }" class="h-10 flex items-center p-2 px-5  transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                        <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>

                        </span>
                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Add College
                        </span>
                    </a>

                      <a wire:navigate href="{{ route('user.view_college') }}" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('user.view_college') }}' }" class="h-10 flex items-center p-2 px-5  transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                        <span aria-hidden="true">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </span>
                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">View College
                        </span>
                    </a>

                    <form  method="POST" action="{{ route('user.logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('user.logout')"  onclick="event.preventDefault(); this.closest('form').submit();" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('user.logout') }}' }" class="h-10 flex items-center  p-2 px-5  transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg> 
                            </span>
                            <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">User Logout</span>
                        </x-dropdown-link>
                    </form>
                @else
                    <a wire:navigate href="{{ route('user.login') }}" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('user.login') }}' }" class="h-10 flex items-center p-2 px-5  transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                        </span>
                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">User Login</span>
                    </a>
                @endauth
            </nav>
            {{-- <!-- Sidebar footer -->
            <div class="flex-shrink-0 px-2 py-4 space-y-2  border-r dark:border-primary-darker dark:bg-darker">
                <a wire:navigate href="" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->is('') }}' }" class="h-10 flex items-center p-2 px-5  transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                    <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                    </span>
                    <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Profile</span>
                </a>
            </div> --}}
    </aside>
</div>




