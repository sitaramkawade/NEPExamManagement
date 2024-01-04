@extends("layouts.app")
@section("main")
  <div class="flex h-screen bg-gray-100 text-gray-900 antialiased dark:bg-dark dark:text-light">
    
    <!-- Loading screen -->
    <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker">
      Loading.....
    </div>
        
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
