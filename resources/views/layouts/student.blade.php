@extends('layouts.app')
@section('main')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.student-navigation')
        <main>
        @yield('student')
        </main>
    </div>
@endsection