<div>
    @if ($btn_add)
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Added Successfully!</strong>
        <span class="block sm:inline">Your form has been successfully submitted.</span>
    </div>
    @endif
    <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300 ">
        <div class="container mx-auto p-4 w-full ">
            <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">College Registration</h1>
                <p class="text-gray-600 dark:text-gray-300 mb-6">Fill all the required details</p>
                <form wire:submit="add">
                    <x-input-label class="form-label">College Name:</x-input-label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="text" id="college_name" wire:model="college_name" placeholder="Enter College Name"
                            class="border p-2 rounded w-full" />
                        @error('college_name') <span class="text-red-500">* required</span> @enderror
                    </div>
                    <x-input-label class="form-label">Email Address:</x-input-label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input input type="email" id="college_email" wire:model="college_email"
                            placeholder="Enter Email Address" class="border p-2 rounded w-full" />
                        @error('college_email') <span class="text-red-500">* required</span> @enderror
                    </div>
                    <x-input-label class="form-label">Mobile Number:</x-input-label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input input type="text" id="college_contact_no" wire:model="college_contact_no"
                            placeholder="Enter Mobile Number" class="border p-2 rounded w-full" />
                        @error('college_contact_no') <span class="text-red-500">* required</span> @enderror
                    </div>
                    <x-input-label class="form-label">College Address:</x-input-label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                        <textarea type="text" id="college_address" wire:model="college_address"
                            placeholder="Enter college address" class="border p-2 rounded w-full"></textarea>
                        @error('college_address') <span class="text-red-500">* required</span> @enderror
                    </div>
                    <x-input-label class="form-label">Website URL:</x-input-label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="url" id="college_website_url" wire:model="college_website_url"
                            placeholder="Enter College website url" class="border p-2 rounded w-full" />
                        @error('college_website_url') <span class="text-red-500">* required</span> @enderror
                    </div>
                    <x-input-label class="form-label">college logo:</x-input-label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="file" id="college_logo_path" wire:model="college_logo_path"
                            class="border p-2 rounded w-full" />
                        @error('college_logo_path') <span class="text-red-500">* required JPG or PNG</span> @enderror
                    </div>
                    <x-input-label class="form-label">Sanstha Id:</x-input-label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input input type="text" id="sanstha_id" wire:model="sanstha_id" placeholder="Enter Sanstha ID"
                            class="border p-2 rounded w-full" />
                        @error('sanstha_id') <span class="text-red-500">* required</span> @enderror
                    </div>
                    <x-input-label class="form-label">University Id:</x-input-label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input input type="text" id="university_id" wire:model="university_id"
                            placeholder="Enter University ID" class="border p-2 rounded w-full" />
                        @error('university_id') <span class="text-red-500">* required</span> @enderror
                    </div>
                    <x-input-label class="form-label">Status:</x-input-label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="text" id="status" wire:model="status" placeholder="Enter Status"
                            class="border p-2 rounded w-full" />
                        @error('status') <span class="text-red-500">* required</span> @enderror
                    </div>
                    <x-primary-button type="submit" id="btn_add" wire:click="btn_add"
                        class="px-4 py-2 rounded text-white">
                        Add
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>

</div>