<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config("app.name", "Laravel") }}</title>

    <!-- Scripts -->
    @vite(["resources/css/app.css", "resources/js/app.js"])
    @livewireStyles()
    <style>
      ::-webkit-scrollbar 
      {
        width: 2px !important;
      }

      ::-moz-scrollbar {
        width: 8px !important;
      }

      * {
        scrollbar-width: thin !important;
      }

      ::-webkit-scrollbar-thumb {
        background-color:var(--color-primary) !important;
        border-radius: 8px;
      }

      ::-webkit-scrollbar-track {
        background-color: transparent; 
      }

      #nprogress .bar 
      {
        background: var(--color-primary) !important;
        height: 5px !important;
      }

      #nprogress .peg {
        box-shadow: 0 0 10px var(--color-primary), 0 0 5px var(--color-primary);
      }

      #nprogress .spinner-icon {
        border-top-color: var(--color-primary) !important;
        border-left-color: var(--color-primary) !important;
        display: none;
      }
    </style>
  </head>

  <body class="font-sans antialiased" x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark }">

      <main>
        @yield("main")
      </main>

    @livewireScripts()
    <x-view-image-model/>
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
          return 'gray'
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
          selectedColor: 'gray',
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
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert/sweetalert.js') }}"></script>
    <script>

        document.addEventListener('livewire:init', () => {
            // Toster Config
            var Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 3000,
                timerProgressBar:true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            
         //  Notification Fire
        window.addEventListener('alert', ({ detail: { type, message } }) => {
            Toast.fire({
                icon: type,
                title: message
            });
        });
    
         
            // Delete Fire
            window.addEventListener('delete-confirmation',event=>{
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

            @if(session('alert'))
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
  </body>

</html>
