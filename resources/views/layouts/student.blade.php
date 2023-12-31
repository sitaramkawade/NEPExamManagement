@extends('layouts.app')
@section('main')

<div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
    <!-- Loading screen -->
    <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
        Loading.....
    </div>

    {{-- @include('layouts.student.sidebar') --}}
    @include('layouts.student.sidebar')

    <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
        {{-- @include('layouts.student.student-navigation') --}}
        @include('layouts.student.navbar')

        <!-- Main content -->
        <main class="z-10">
            @yield('student')
        </main>
    </div>

    <!-- Panels -->
    <div x-cloak>
        @include('layouts.setting-panel')
    </div>
</div>
@endsection