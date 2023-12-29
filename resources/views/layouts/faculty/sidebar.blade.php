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
                <a wire:navigate href="{{ route('faculty') }}" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('faculty') }}' }" class="flex items-center h-10 p-2 px-5 transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </span>
                    <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Faculty Home</span>
                </a>
                @auth('faculty')
                    <a wire:navigate href="{{ route('faculty.dashboard') }}" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('faculty.dashboard') }}' }" class="h-10 flex items-center p-2 px-5 transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                        </span>
                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Faculty Dashboard</span>
                    </a>
                    <form  method="POST" action="{{ route('faculty.logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('faculty.logout')"  onclick="event.preventDefault(); this.closest('form').submit();" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('faculty.logout') }}' }" class="h-10 flex items-center  p-2 px-5 transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                            <span aria-hidden="true">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                            </span>
                            <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Faculty Logout</span>
                        </x-dropdown-link>
                    </form>
                @else
                    <a wire:navigate href="{{ route('faculty.login') }}" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->routeis('faculty.login') }}' }" class="h-10 flex items-center p-2 px-5 transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                        </span>
                        <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Faculty Login</span>
                    </a>
                @endauth
                <a wire:navigate href="{{ route('faculty.view.faculty') }}" :class="{ 'bg-primary-100 dark:bg-primary': '{{ request()->routeis('faculty.view.faculty') }}' }" class="h-10 flex items-center p-2 px-5 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </span>
                    <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Faculties</span>
                </a>
                <a wire:navigate href="{{ route('faculty.update-profile.faculty') }}" :class="{ 'bg-primary-100 dark:bg-primary': '{{ request()->routeis('faculty.update-profile.faculty') }}' }" class="h-10 flex items-center p-2 px-5 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                        </svg>
                    </span>
                    <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Profile</span>
                </a>
                <a wire:navigate href="{{ route('faculty.view-role.faculty') }}" :class="{ 'bg-primary-100 dark:bg-primary': '{{ request()->routeis('faculty.view-role.faculty') }}' }" class="h-10 flex items-center p-2 px-5 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </span>
                    <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Roles</span>
                </a>
                <a wire:navigate href="{{ route('faculty.view-roletype.faculty') }}" :class="{ 'bg-primary-100 dark:bg-primary': '{{ request()->routeis('faculty.view-roletype.faculty') }}' }" class="h-10 flex items-center p-2 px-5 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </span>
                    <span class="ml-2 duration-300 ease-in-out" :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Role Types</span>
                </a>
            </nav>
            {{-- <!-- Sidebar footer -->
            <div class="flex-shrink-0 px-2 py-4 space-y-2  border-r dark:border-primary-darker dark:bg-darker">
                <a wire:navigate href="" :class="{ 'bg-primary-lighter text-white dark:bg-primary': '{{ request()->is('') }}' }" class="h-10 flex items-center p-2 px-5 transition-colors rounded-md dark:text-light hover:bg-primary-lighter text-white dark:hover:bg-primary">
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
<x-sidebar.sidebar>
    <x-sidebar.sidebar-link route="faculty" name="Faculty Home">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
    </x-sidebar.sidebar-link>
    @auth('faculty')
        <x-sidebar.sidebar-link route="faculty.dashboard" name="Faculty Dashboard">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
        </x-sidebar.sidebar-link>
        <x-sidebar.logout-link route="faculty.logout" name="Faculty Logout">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </x-sidebar.logout-link>
    @else
        <x-sidebar.sidebar-link route="faculty.login" name="Faculty Login">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
        </x-sidebar.sidebar-link>
    @endauth
</x-sidebar.sidebar>
