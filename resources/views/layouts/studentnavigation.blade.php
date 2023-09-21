<nav class="flex  justify-between bg-gray-700 p-1    rounded shadow border border-b-2 ">
    <div class="flex items-center  text-white mr-6">
        <button @click="open = !open" class="hidden md:block m-2 hover:bg-gray-500 px-2  rounded-sm ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
            </svg>

        </button>

        <svg class=" py-1 h-8 w-8 mr-1 " width="54" height="54" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>

        <span class="font-semibold text-xl tracking-tight text-gray-200">STUDENT</span>

    </div>
    <div class=" sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-gray-400 bg-gray-700 dark:bg-gray-800 hover:text-gray-300 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div>{{Auth::user()->student_name }}</div>

                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('student.profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('student.logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('student.logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
    {{-- <div class=" flex space-x-3 text-black font-semibold mr-5 ">
        <div>
            <a class=" rounded bg-yellow-400 hover:bg-yellow-300 opacity-80 py-1 px-2 block  hover:text-white"
                href="{{ route('student.login') }}"> Login</a>

        </div>
        <div>
            <a class="rounded bg-yellow-400 hover:bg-yellow-300 py-1 px-2 block hover:text-white  "
                href="{{ route('student.register') }}"> Register</a>
        </div>



    </div> --}}





</nav>

 