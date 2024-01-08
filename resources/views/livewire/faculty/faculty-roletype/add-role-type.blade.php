<div>
    <x-card-header href="{{ route('faculty.view-roletype.faculty') }}">
        Add Role Type
        <x-slot name="svg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-1 mt-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
        </x-slot>
        <x-slot name="btntext">Back</x-slot>
    </x-card-header>

    <form wire:submit="add()" method="post" action="" id="myForm">
        
    </form>
</div>
