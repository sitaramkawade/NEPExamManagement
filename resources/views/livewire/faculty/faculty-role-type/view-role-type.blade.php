<div>
    <x-card heading="All Role Types">
        <x-slot name="button">
            <x-add-btn href="{{ route('faculty.add-roletype.faculty') }}"/>
        </x-slot>
        <x-slot name="content">
            @livewire('faculty.faculty-role-type.role-type-data-table')
        </x-slot>
    </x-card>
</div>
