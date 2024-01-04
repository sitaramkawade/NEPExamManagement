<x-navbar.navbar>

  <x-slot name="AUTH">
    @auth("faculty")
      <img class="inline-flex h-9 w-9 rounded-full" src="{{ isset(auth()->guard("faculty")->user()->profile_photo_path)? asset(auth()->guard("faculty")->user()->profile_photo_path): asset("img/no-img.png"); }}" alt="Faculty" />
      <span class="text-bold mx-2 inline-flex py-2">{{ auth()->guard("faculty")->user()->faculty_name }}</span>
    @else
      <img class="inline-flex h-9 w-9 rounded-full" src="{{ asset("img/no-img.png") }}" alt="Faculty" />
    @endauth
  </x-slot>

  <x-slot name="DROPDOWN">
    <x-navbar.mobile-dropdown-link route="faculty" name="Faculty Home" />
    @auth("faculty")
      <x-navbar.mobile-dropdown-link route="faculty.dashboard" name="Faculty Dashboard" />
      <x-navbar.mobile-dropdown-link route="faculty.update-profile.faculty" name="Faculty Profile" />
      <x-navbar.mobile-dropdown-logout-link route="faculty.logout" name="Faculty Logout" />
    @else
      <x-navbar.mobile-dropdown-link route="faculty.login" name="Faculty Login" />
    @endauth
  </x-slot>

  <x-slot name="NAVBAR">
    <x-navbar.mobile-link route="faculty" name="Faculty Home">
      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
    </x-navbar.mobile-link>
    @auth("faculty")
      <x-navbar.mobile-link route="faculty.dashboard" name="Faculty Dashboard">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
      </x-navbar.mobile-link>
      <x-navbar.mobile-logout-link route="faculty.logout" name="Faculty Logout">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
      </x-navbar.mobile-logout-link>
    @else
      <x-navbar.mobile-link route="faculty.login" name="Faculty Login">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
      </x-navbar.mobile-link>
    @endauth
  </x-slot>

</x-navbar.navbar>
