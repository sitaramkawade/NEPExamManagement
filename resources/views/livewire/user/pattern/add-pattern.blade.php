<div>
    <div class="mx-auto max-w-7xl sm:px-6 lg:p-2">
        <section>
            <form wire:submit="addPattern">
                <div class="m-2 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
                    
                     <x-card-header href="{{ route('user.viewPattern') }}">
                        Add Pattern
                        <x-slot name="svg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-1 mt-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                            </svg>
                        </x-slot>
                        <x-slot name="btntext">Back</x-slot>
                    </x-card-header>
                    
                   

                    <div>
                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="pattern_name" :value="__('Pattern Name')" />
                            <x-required />
                            <x-text-input id="pattern_name" type="text" wire:model="pattern_name" name="pattern_name" class="w-full mt-1" :value="old('pattern_name',$pattern_name)" required autofocus autocomplete="pattern_name" />
                            <x-input-error :messages="$errors->get('pattern_name')" class="mt-2" />
                        </div>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2">

                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="pattern_startyear" :value="__('Pattern Start Year')" />
                            <x-required />
                            <x-text-input id="pattern_startyear" type="text" wire:model="pattern_startyear" name="pattern_startyear" class="w-full mt-1" :value="old('pattern_startyear',$pattern_startyear)" required autofocus autocomplete="pattern_startyear" />
                            <x-input-error :messages="$errors->get('pattern_startyear')" class="mt-2" />
                        </div>
                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="pattern_valid" :value="__('Pattern Valid ')" />
                            <x-required />
                            <x-text-input id="pattern_valid" type="text" wire:model="pattern_valid" name="pattern_valid" class="w-full mt-1" :value="old('pattern_valid',$pattern_valid)" required autofocus autocomplete="pattern_valid" />
                            <x-input-error :messages="$errors->get('pattern_valid')" class="mt-2" />
                        </div>

                    </div>

                        <div class="grid grid-cols-1 md:grid-cols-2">
                           
                                <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                                <x-input-label for="college_id" :value="__('Colleges')" />
                                <x-required />
                                <x-input-select id="college_id" wire:model="college_id" name="college_id" class="text-center w-full mt-1" :value="old('college_id',$college_id)" required autofocus autocomplete="college_id">
                                    <x-select-option class="text-start" hidden> -- Select College -- </x-select-option>
                                    @foreach ($colleges as $c_id)
                                    <x-select-option wire:key="{{ $c_id->id }}" value="{{ $c_id->id }}" class="text-start">{{$c_id->college_name }}</x-select-option>
                                    @endforeach
                                </x-input-select>
                                <x-input-error :messages="$errors->get('college_id')" class="mt-2" />
                            </div>

                             <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                                <x-input-label for="status" :value="__('Status')" />
                                <x-required />
                                <x-input-select id="status" wire:model="status" name="status" class="text-center  w-full mt-1" :value="old('status',$status)" required autocomplete="status">
                                    <x-select-option class="text-start" hidden> -- Select -- </x-select-option>
                                    <x-select-option class="text-start" value="0">Inactive</x-select-option>
                                    <x-select-option class="text-start" value="1">Active</x-select-option>
                                </x-input-select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                        </div>

              



                    <div class="h-20 p-2">
                        @if ($current_step===$steps)
                        <button type="submit" wire:target="college_logo_path" wire:loading.attr="disable" class=" float-right  text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-darker font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary dark:hover:bg-primary-dark dark:focus:ring-primary-darker">
                            <span class="mx-2"> Add</span>
                        </button>
                        @endif
                    </div>
            </form>
    </div>
</div>
</div>
