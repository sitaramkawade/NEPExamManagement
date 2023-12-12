@extends('layouts.app')
@section('main')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.user-navigation')
    <main>
       @yield('user')
    </main>
</div>
@endsection
