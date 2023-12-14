@extends("layouts.app")
@section("main")
  <div class="flex h-screen bg-gray-100 text-gray-900 antialiased dark:bg-dark dark:text-light">
    {{-- Faculty Sidebar --}}
    @include("layouts.faculty.sidebar")
    <div class="h-full flex-1 overflow-y-auto overflow-x-hidden">
      {{-- Faculty Navbar --}}
      @include("layouts.faculty.navbar")
      {{-- Faculty Main --}}
      <main class="z-10">
        @yield("faculty")
      </main>
    </div>
    {{-- Setting Panels  --}}
    <div x-cloak>
      @include("layouts.setting-panel")
    </div>
  </div>
@endsection
