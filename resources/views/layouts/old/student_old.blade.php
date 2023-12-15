<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="font-sans antialiased">
    {{-- Navbar --}}
    <div class="  h-14 mb-5">
        @include('layouts.studentnavigation')
      </div>
    {{-- Sidebar --}}
    <div class=" flex " x-data="{ open: true }">
        <div :class="open ? 'w-72' : 'w-24'"
            class=" duration-300    h-screen  bg-purple-950 text-white relative 
            ">
            <button @click="open = !open"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" :class="open ? ' ' : 'rotate-180'"
                    class="w-7 h-7  font-thin  bg-gray-100 stroke-purple-700   absolute cursor-pointer -right-3 top-8 border-2  border-purple-950   rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />

                </svg></button>

                <ul class="  m-auto" 
                x-data="{ colors: ['Red Menu', 'Orange Menu', 'Yellow','Text'] }">
                @foreach(["one"=>"Home","two"=>"Add Data","three"=>"Delete Data"] as $data)
                   
                    
                          <li class=" text-gray-300   flex    items-center
                           gap-x-2 cursor-pointer p-2 hover:bg-purple-600 rounded-md 
                          "  >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             class="w-7 h-7 mx-5 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                              </svg>
                              
                           <span  :class="open ? ' ' : 'hidden'"
                            class=" origin-left duration-200  shrink-0 "  >{{$data}}</span>
                          
                        </li>
                      
                     @endforeach
                    
                </ul>
                 
                <ul class="  m-auto" 
                x-data="{ colors: ['Red Menu', 'Orange Menu', 'Yellow','Text'] }">
                @foreach(["one"=>"Home","two"=>"Add Data","three"=>"Delete Data"] as $data)
                   
                    
                          <li class=" text-gray-300   flex    items-center
                           gap-x-2 cursor-pointer p-2 hover:bg-purple-600 rounded-md 
                          "  >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             class="w-7 h-7 mx-5 shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                              </svg>
                              
                           <span  :class="open ? ' ' : 'hidden'"
                            class=" origin-left duration-200  shrink-0 "  >{{$data}}</span>
                          
                        </li>
                      
                     @endforeach
                    
                </ul>
                <div class="max-w-lg mx-auto" x-data="{ open: false }">
    
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" @click="open = !open">Dropdown button 
                        <svg :class="open ? ' ' : 'rotate-180'" class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                
                    <!-- Dropdown menu -->
                    <div :class="open ? '' : 'hidden'" class=" bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                        <div class="px-4 py-3">
                        <span class="block text-sm">Bonnie Green</span>
                        <span class="block text-sm font-medium text-gray-900 truncate">name@flowbite.com</span>
                        </div>
                        <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Earnings</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                        </li>
                        </ul>
                    </div>
                
                    <p class="mt-5">This dropdown element is part of a larger, open-source library of Tailwind CSS components. Learn more by going to the official <a class="text-blue-600 hover:underline" href="https://flowbite.com/docs/getting-started/introduction/" target="_blank">Flowbite Documentation</a>.</p>
                </div>
                
                <div class="max-w-lg mx-auto" x-data="{ open: false }">
    
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" @click="open = !open">Dropdown button 
                        <svg :class="open ? ' ' : 'rotate-180'" class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                
                    <!-- Dropdown menu -->
                    <div :class="open ? '' : 'hidden'" class=" bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                        <div class="px-4 py-3">
                        <span class="block text-sm">Bonnie Green</span>
                        <span class="block text-sm font-medium text-gray-900 truncate">name@flowbite.com</span>
                        </div>
                        <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Earnings</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                        </li>
                        </ul>
                    </div>
                
                    <p class="mt-5">This dropdown element is part of a larger, open-source library of Tailwind CSS components. Learn more by going to the official <a class="text-blue-600 hover:underline" href="https://flowbite.com/docs/getting-started/introduction/" target="_blank">Flowbite Documentation</a>.</p>
                </div>
        </div>
        
        <!-- component -->
<!-- This is an example component -->

 
        <div class=" p-7 text-2xl font-semibold flex-1 bg-gray-100">
            <h1>Home Page</h1>
        </div>

    </div>
    {{-- footer --}}
   
    @livewireScripts
</body>

</html>
