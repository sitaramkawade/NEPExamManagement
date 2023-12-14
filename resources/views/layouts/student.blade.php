@extends("layouts.app")
@section("main")
  <div class="flex h-screen bg-gray-100 text-gray-900 antialiased dark:bg-dark dark:text-light">
    {{-- Student Sidebar --}}
    @include("layouts.student.sidebar")
    <div class="h-full flex-1 overflow-y-auto overflow-x-hidden">
      {{-- Student Navbar --}}
      @include("layouts.student.navbar")
      {{-- Student Main --}}
      <main class="z-10">
        @yield("student")
      </main>
    </div>
    {{-- Setting Panels  --}}
    <div x-cloak>
      @include("layouts.setting-panel")
    </div>
  </div>
@endsection
