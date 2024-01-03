<div>
    {{-- <x-breadnav aria-label="Breadcrumb">
        <x-breadol>
            <x-breadli>
                <x-breadanchor href="/" text="Home">
                    <x-breadsvg>
                        <x-breadsvgpath />
                    </x-breadsvg>
                </x-breadanchor>
            </x-breadli>
        </x-breadol>
    </x-breadnav> --}}
    <x-card-header href="{{ route('faculty.register.faculty') }}">
        All Faculties
        <x-slot name="svg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>
        </x-slot>
        <x-slot name="btntext">Add</x-slot>
    </x-card-header>
    @livewire('faculty.faculty-data-table')
</div>
