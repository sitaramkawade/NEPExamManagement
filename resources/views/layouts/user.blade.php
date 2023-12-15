@extends("layouts.app")
@section("main")
  <div class="flex h-screen bg-gray-100 text-gray-900 antialiased dark:bg-dark dark:text-light">

    {{-- User Sidebar --}}
    @include("layouts.user.sidebar")

    <div class="h-full flex-1 overflow-y-auto overflow-x-hidden">

      {{-- User Navbar --}}
      @include("layouts.user.navbar")

      {{-- Uesr Main content  --}}
      <main class="z-10">
        @yield("user")
      </main>
    </div>

    {{-- Setting Panels  --}}
    <div x-cloak>
      @include("layouts.setting-panel")
    </div>
  </div>
@endsection
