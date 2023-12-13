<div>

    <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto p-4">
            <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Faculty Registration</h1>
                <p class="text-gray-600 dark:text-gray-300 mb-6">Fill all the required details</p>
                <form wire:submit="add()">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="text" wire:model="faculty_name" placeholder="Faculty Name" class="border p-2 rounded w-full" />
                        <x-text-input input type="email" wire:model="email" placeholder="Email Address" class="border p-2 rounded w-full" />
                        <x-text-input input type="text" wire:model="mobile_no" placeholder="Mobile Number" class="border p-2 rounded w-full" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="date" wire:model="date_of_birth" class="border p-2 rounded w-full" />

                        <x-input-select wire:model.live="gender" class="border p-2 rounded w-full">
                            <x-select-option hidden>Select Gender</x-select-option>
                            @foreach ($genders as $g)
                                <option value={{ $g->id }}>{{ $g->gender }}</option>
                            @endforeach
                        </x-input-select>

                        <x-input-select wire:model="category" class="border p-2 rounded w-full">
                            <x-select-option hidden>Select Category</x-select-option>
                            @foreach ($categories as $c)
                                <option wire:key='{{ $c->id }}' value={{ $c->id }}>
                                    {{ $c->caste_category }}</option>
                            @endforeach
                        </x-input-select>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="text" wire:model="pan" placeholder="PAN Number" class="border p-2 rounded w-full" />
                        <x-text-input type="file" wire:model="profile_photo_path" class="border p-2 rounded w-full" />
                        <x-text-input type="text" wire:model="unipune_id" placeholder="Unipune ID" class="border p-2 rounded w-full" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="text" wire:model="qualification" placeholder="Qualification" class="border p-2 rounded w-full" />
                        <x-input-select wire:model.change="role_id" class="border p-2 rounded w-full">
                            @foreach ($roles as $r)
                                <x-select-option hidden>Select Role</x-select-option>
                                <option wire:key='{{ $r->id }}' value={{ $r->id }}>{{ $r->roletype_name }}
                                </option>
                            @endforeach
                        </x-input-select>
                        <x-input-select wire:model.change="department_id" class="border p-2 rounded w-full">
                            <x-select-option hidden>Select Department</x-select-option>
                            @foreach ($departments as $dept)
                                <option wire:key='{{ $dept->id }}' value={{ $dept->id }}>
                                    {{ $dept->departmenttype }}</option>
                            @endforeach
                        </x-input-select>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4">
                        <x-input-select wire:model.change="college_id" class="border p-2 rounded w-full">
                            <x-select-option hidden>Select College</x-select-option>
                            @foreach ($colleges as $clg)
                                <option wire:key='{{ $clg->id }}' value={{ $clg->id }}>
                                    {{ $clg->college_name }}</option>
                            @endforeach
                        </x-input-select>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="text" wire:model="active" placeholder="Status" class="border p-2 rounded w-full" />
                        <x-text-input type="text" wire:model="faculty_verified" placeholder="Faculty Verified" class="border p-2 rounded w-full" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <textarea type="text" wire:model="current_address" placeholder="current address" class="border p-2 rounded w-full"></textarea>
                        <textarea type="text" wire:model="permanant_address" placeholder="permanant address" class="border p-2 rounded w-full"></textarea>
                    </div>
                    <x-primary-button type="submit" id="theme-toggle" class="px-4 py-2 rounded text-white">
                        Submit
                    </x-primary-button>
                </form>
            </div>
        </div>

    </div>


</div>
