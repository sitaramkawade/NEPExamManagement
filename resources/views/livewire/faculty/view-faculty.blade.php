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

    <x-card heading="All Faculties">
        <x-slot name="button">
            <x-add-btn href="{{ route('faculty.register.faculty') }}"/>
        </x-slot>
        <x-slot name="content">
            @livewire('faculty.faculty-data-table')
        </x-slot>
    </x-card>
</div>
