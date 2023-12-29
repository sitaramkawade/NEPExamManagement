@extends("layouts.app")
@section("main")
  <div class="flex h-screen bg-gray-100 text-gray-900 antialiased dark:bg-dark dark:text-light">

    {{-- Faculty Sidebar --}}

    @include("layouts.faculty.sidebar")

    <div class="h-full flex-1 overflow-y-auto overflow-x-hidden">

      {{-- Faculty Navbar --}}

      @include("layouts.faculty.navbar")

      {{-- Faculty Main --}}

      <main class="z-10 min-h-screen">
        @yield("faculty")
      </main>

     {{-- Footer --}}

     @include("layouts.footer")

    </div>

    {{-- Faculty Notification Panels  --}}

    @include("layouts.faculty.notification-panel")

    {{-- Setting Panels  --}}

    @include("layouts.setting-panel")

  </div>
@endsection
