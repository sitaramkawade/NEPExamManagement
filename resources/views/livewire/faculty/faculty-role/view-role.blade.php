<div>
    <x-card heading="All Roles">
        <x-slot name="button">
            <x-add-btn href="{{ route('faculty.add-role.faculty') }}"/>
        </x-slot>
        <x-slot name="content">
            @livewire('faculty.faculty-role.role-data-table')
        </x-slot>
    </x-card>
</div>
