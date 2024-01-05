
<div>
    <x-card-header>
        Update Profile
    </x-card-header>
    <x-form wire:submit="updateProfile({{ $faculty_id }})">
        @include('livewire.faculty.update-profile.profile-form')
    </x-form>
</div>
