<div>
    <div class="mx-auto max-w-7xl sm:px-6 lg:p-2">
        <section>
            <form wire:submit="add">
                <div class="m-2 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
                    <div class="px-2 py-2 font-semibold text-white dark:text-light bg-primary">
                        College Information
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="college_name" :value="__('College Name')" />
                            <x-text-input id="college_name" type="text" wire:model="college_name" name="college_name" class="w-full mt-1" :value="old('college_name',$college_name)" required autofocus autocomplete="college_name" />
                            <x-input-error :messages="$errors->get('college_name')" class="mt-2" />
                        </div>

                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="college_email" :value="__('College email')" />
                            <x-text-input id="college_email" type="email" wire:model="college_email" name="college_email" class="w-full mt-1" :value="old('college_email',$college_email)" required autofocus autocomplete="college_email" />
                            <x-input-error :messages="$errors->get('college_email')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2">

                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="college_contact_no" :value="__('college Contact No')" />
                            <x-text-input id="college_contact_no" type="text" wire:model="college_contact_no" name="college_contact_no" class="w-full mt-1" :value="old('college_contact_no',$college_contact_no)" required autofocus autocomplete="college_contact_no" />
                            <x-input-error :messages="$errors->get('college_contact_no')" class="mt-2" />
                        </div>


                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="college_address" :value="__('College Address')" />
                            <x-text-input id="college_address" type="text" wire:model="college_address" name="college_address" class="w-full mt-1" :value="old('college_address',$college_address)" required autofocus autocomplete="college_address" />
                            <x-input-error :messages="$errors->get('college_address')" class="mt-2" />
                        </div>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div>
                            {{-- Sanstha --}}

                            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                                <x-input-label for="sanstha_id" :value="__('Sanstha')" />
                                <x-input-select id="sanstha_id" wire:model="sanstha_id" name="sanstha_id" class="text-center w-full mt-1" :value="old('sanstha_id',$sanstha_id)" required autofocus autocomplete="sanstha_id">
                                    <x-select-option class="text-start" hidden> -- Select Sanstha -- </x-select-option>
                                    @foreach ($sansthas as $s_id)
                                    <x-select-option wire:key="{{ $s_id->id }}" value="{{ $s_id->id }}" class="text-start">{{$s_id->sanstha_name }}</x-select-option>
                                    @endforeach
                                </x-input-select>
                                <x-input-error :messages="$errors->get('sanstha_id')" class="mt-2" />
                            </div>

                            {{-- university --}}
                            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                                <x-input-label for="university_id" :value="__('University')" />
                                <x-input-select id="university_id" wire:model="university_id" name="university_id" class="text-center w-full mt-1" :value="old('university_id',$university_id)" required autofocus autocomplete="university_id">
                                    <x-select-option class="text-start" hidden> -- Select University -- </x-select-option>
                                    @foreach ($universities as $u_id)
                                    <x-select-option wire:key="{{ $u_id->id }}" value="{{ $u_id->id }}" class="text-start">{{$u_id->university_name }}</x-select-option>
                                    @endforeach
                                </x-input-select>
                                <x-input-error :messages="$errors->get('university_id')" class="mt-2" />
                            </div>

                            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                                <x-input-label for="college_website_url" :value="__('College Website URL ')" />
                                <x-text-input id="college_website_url" type="url" wire:model="college_website_url" name="college_website_url" class="w-full mt-1" :value="old('college_website_url',$college_website_url)" required autofocus autocomplete="college_website_url" />
                                <x-input-error :messages="$errors->get('college_website_url')" class="mt-2" />
                            </div>

                            {{-- status --}}
                            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                                <x-input-label for="status" :value="__('status')" />
                                <x-text-input id="status" type="text" wire:model="status" name="status" class="w-full mt-1" :value="old('status',$status)" required autofocus autocomplete="status" />
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>

                        {{-- upload logo --}}
                        <section>

                            <div class="m-5  bg-red-500 col-span-1 rounded-md bg-white dark:bg-darker dark:border-primary-darker border">
                                <div class="flex items-center justify-between border-b p-4 dark:border-primary">
                                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Upload College Logo</h4>
                                </div>
                                <div class="relative h-auto p-4">
                                    <div class=" text-sm text-gray-600 dark:text-gray-400 ">
                                        <div class="flex flex-col items-center mx-auto space-x-6  ">
                                            <div class="shrink-0 p-2">
                                                @if ($college_logo_path)
                                                <img style="width: 135px; height: 150px;" class="object-center object-fill bg-red-500 " src="{{ isset($college_logo_path)?$college_logo_path->temporaryUrl():asset('img/no-img.png'); }}" alt="Current profile photo" />
                                                @else
                                                <img style="width: 135px; height: 150px;" class="object-center object-fill " src="{{ isset($college_logo_path_old)?asset($college_logo_path_old):asset('img/no-img.png'); }}" alt="Current profile photo" />
                                                @endif
                                            </div>
                                            <label class="block p-2">
                                                <span class="sr-only">Choose profile photo</span>
                                                <x-text-input id="college_logo_path" wire:model="college_logo_path" name="college_logo_path" accept="image/png, image/jpeg , image/jpg" :value="old('college_logo_path',$college_logo_path)" autofocus autocomplete="college_logo_path" type="file" class="block w-full text-sm dark:text-slate-500 text-black file:mr-4 file:py-2 file:px-4  border file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-darker" />
                                                <x-input-error :messages="$errors->get('college_logo_path')" class="mt-2" />
                                            </label>
                                            <x-input-label class="py-2" for="college_logo_path" :value="__('Hint : 250KB , png , jpeg , jpg')" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </section>
                    </div>

                    <div class="h-20 p-2">
                        @if ($current_step===$steps)
                        <button type="submit" class=" float-right  text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-darker font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary dark:hover:bg-primary-dark dark:focus:ring-primary-darker">
                            <span class="mx-2"> Add</span>
                        </button>
                        @endif
                    </div>
            </form>
    </div>
</div>
</div>
