<!-- <div>
  <form wire:submit="add()">
 <input  wire:model="college_name" type="text" placeholder="Name"><br> -->

 <!-- <input  wire:model="college_email" type="email" placeholder="Email"><br>
 <textarea wire:model="college_address" cols="30" rows="5" placeholder="address"></textarea>
 <input  wire:model="college_contact_no" type="number" placeholder="contact"><br>
 <input  wire:model="college_website_url" type="text" placeholder="website url"><br>
 <input  wire:model="college_logo_path" type="file" placeholder="logo"><br>
 <input  wire:model="sanstha_id"type="number" placeholder="sansthan ID"><br>
 <input  wire:model="university_id" type="number" placeholder="university_ID"><br>
 <input wire:model="status" type="checkbox"> <label for="status">status</label><br>
 <button wire:model value="submit">Add</button>
</form>
</div> -->


<div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto p-4">
            <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">College Registration</h1>
                <p class="text-gray-600 dark:text-gray-300 mb-6">Fill all the required details</p>
                <form wire:submit="add()">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <x-text-input type="text" wire:model="college_name" placeholder="College Name" class="border p-2 rounded w-full" />
                    <x-text-input input type="email" wire:model="college_email" placeholder="Email Address" class="border p-2 rounded w-full" />
                    <x-text-input input type="text" wire:model="college_contact_no" placeholder="Mobile Number" class="border p-2 rounded w-full" />
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <textarea type="text" wire:model="college_address" placeholder="college address" class="border p-2 rounded w-full"></textarea>
                        
                    </div>
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                  <x-text-input type="url" wire:model="college_website_url" placeholder="College website url" class="border p-2 rounded w-full" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <x-text-input type="file" wire:model="college_logo_path" class="border p-2 rounded w-full" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <x-text-input input type="text" wire:model="sanstha_id" placeholder="Sanstha ID" class="border p-2 rounded w-full" />
                <x-text-input input type="text" wire:model="university_id" placeholder="University ID" class="border p-2 rounded w-full" />
                </div>
               
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <x-text-input type="text" wire:model="status" placeholder="Status" class="border p-2 rounded w-full" />
                       
                    </div>
                <x-primary-button type="submit" id="theme-toggle" class="px-4 py-2 rounded text-white">
                        Add
                    </x-primary-button>
            </form>
            </div>
          </div>
        </div>

