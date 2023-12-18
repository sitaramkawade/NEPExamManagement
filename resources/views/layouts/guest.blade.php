@extends("layouts.app")
@section("main")
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <main>
      @yield("guest")
      @include('layouts.dark-mode-toggle')
    </main>
    {{-- Setting Panels  --}}
    <div x-cloak>
      @include("layouts.setting-panel")
    </div>
  </div>
@endsection
