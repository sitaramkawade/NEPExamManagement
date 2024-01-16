@extends('layouts.app')
@section('main')
  <div class="flex h-screen bg-gray-100 text-gray-900 antialiased dark:bg-dark dark:text-light">

    <!-- Loading screen -->
    <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
      Loading.....
    </div>

    <div class="h-full flex-1 overflow-y-auto overflow-x-hidden">
      {{-- Guest Main content  --}}
      <main class="z-10 min-h-screen">
        @yield('guest')
      </main>
    </div>

    {{--  Theam Toggle Buttons  --}}
    @include('layouts.dark-mode-toggle')

    {{-- Setting Panels  --}}

    @include('layouts.setting-panel')
  </div>
@endsection
