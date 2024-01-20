<div>
    <x-card-header heading="Update Profile">
    </x-card-header>
    <x-form wire:submit="updateProfile({{ $faculty_id }})">
        @include('livewire.faculty.update-profile.profile-form')
    </x-form>
</div>
