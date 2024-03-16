<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="data:image/x-icon;base64,{{ base64_encode(file_get_contents(public_path('favicon.ico'))) }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="{{ asset('assets/select-to/select2.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/jquery/jquery.min.js') }}" ></script>
    <script src="{{ asset('assets/alpinejs/ui.min.js') }}" defer></script>
    <script src="{{ asset('assets/sweetalert/sweetalert.js') }}" defer></script>
    <script src="{{ asset('assets/select-to/select2.min.js') }}" defer></script>
    <script src="{{ asset('assets/chart/Chart.bundle.min.js') }}" ></script>
    @livewireStyles()
    
    @yield('styles')
  </head>

  <body class="font-sans antialiased" x-data="setup()" x-init="$refs.loading.classList.add('hidden');setColors(color);" :class="{ 'dark': isDark }">

    <main>
      @yield('main')
    </main>

    @livewireScripts()

    <x-view-image-model />
    
    <script>
      var setup = () => {
        const getTheme = () => {
          if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
          }

          return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
          window.localStorage.setItem('dark', value)
        }

        const getColor = () => {
          if (window.localStorage.getItem('color')) {
            return window.localStorage.getItem('color')
          }
          return 'teal'
        }

        const setColors = (color) => {
          const root = document.documentElement
          root.style.setProperty('--color-primary', `var(--color-${color})`)
          root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
          root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
          root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
          root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
          root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
          root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
          this.selectedColor = color
          window.localStorage.setItem('color', color)
        }

        return {
          // loading: true,
          isDark: getTheme(),
          toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
          },
          setLightTheme() {
            this.isDark = false
            setTheme(this.isDark)
          },
          setDarkTheme() {
            this.isDark = true
            setTheme(this.isDark)
          },
          color: getColor(),
          selectedColor: 'teal',
          setColors,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isNotificationsPanelOpen: false,
          openNotificationsPanel() {
            this.isNotificationsPanelOpen = true
            this.$nextTick(() => {
              this.$refs.notificationsPanel.focus()
            })
          },
          isSettingsPanelOpen: false,
          openSettingsPanel() {
            this.isSettingsPanelOpen = true
            this.$nextTick(() => {
              this.$refs.settingsPanel.focus()
            })
          },
          isMobileSubMenuOpen: false,
          openMobileSubMenu() {
            this.isMobileSubMenuOpen = true
            this.$nextTick(() => {
              this.$refs.mobileSubMenu.focus()
            })
          },
          isMobileMainMenuOpen: false,
          openMobileMainMenu() {
            this.isMobileMainMenuOpen = true
            this.$nextTick(() => {
              this.$refs.mobileMainMenu.focus()
            })
          },

          isSidebarExpanded: true,
          openMobileMainMenu() {
            this.isSidebarExpanded = true
            this.$nextTick(() => {
              this.$refs.sidebarExpanded.focus()
            })
          },
        }
      }
    </script>

    <script>
      document.addEventListener('livewire:init', () => {
        // Toster Config
        var Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          showCloseButton: true,
          timer: 2000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });

        //  Notification Fire
        window.addEventListener('alert', ({
          detail: {
            type,
            message
          }
        }) => {
          Toast.fire({
            icon: type,
            title: message
          });
        });


        // Delete Fire
        window.addEventListener('delete-confirmation', event => {
          Swal.fire({
            title: 'Are You Sure?',
            text: "You Won't Be Able To Revert This!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#198754',
            confirmButtonText: 'Yes, Delete It !'
          }).then((result) => {
            if (result.isConfirmed) {
              Livewire.dispatch('delete-confirmed')
            }
          });
        });

        @if (session('alert'))
          const toastEvent = @json(session('alert'));
          Toast.fire({
            icon: toastEvent.type,
            title: toastEvent.message
          });
          @php session()->forget('alert') @endphp
        @endif

      })
    </script>
    @yield('scripts')
    @stack('scripts')
  </body>

</html>
