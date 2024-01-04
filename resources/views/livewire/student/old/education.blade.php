        <div> 
           <div class=" flex-none md:flex  space-x-6   py-4">
                <div class="  flex-1 space-y-6">
                    <div class="max-w-2xl mx-auto">
                        <label for="educationalcourse_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                            Course </label>
                            
                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="educationalcourse_id" id="educationalcourse_id" required>
                            <option value="">{{ 'Please Select Course' }}</option>

                            @if ($eduactionalcourses)
                                @foreach ($eduactionalcourses as $eduactionalcourse)
                                    <option value="{{ $eduactionalcourse->id }}" >
                                        {{ $eduactionalcourse->course_name }}
                                        {{ $eduactionalcourse->programme->programme_name ?? '' }}
                                    </option>
                                @endforeach
                            @endif

                        </select>

                    </div>
                </div>
                
                <div class="flex-1   space-y-6">
                    <div class="max-w-2xl mx-auto">
                        <label for="boarduniversity_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                            Previous Board/University Name </label>
                        <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
                            name="boarduniversity_id" id="boarduniversity_id" required>
                            <option value="">{{ 'Please Select Board  ' }}</option>

                            @if ($boards)
                                @foreach ($boards as $board)
                                    <option value="{{ $board->id }}" >
                                        {{ $board->boarduniversity_name }}
                                    </option>
                                @endforeach
                            @endif

                        </select>

                    </div>
               </div>

                <div class="flex-1  space-y-6">
                    <div class="flex-1   space-y-6">
                        <div>
                            <x-input-label for="passing_year" :value="__('Month & Year of Passing')" />
                            <x-text-input id="passing_year" required type="month" class="mt-2 block w-full"
                            name="passing_year"   autocomplete="passing_year"    />
                            
                            <x-input-error :messages="$errors->get('passing_year')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

         
            <div class=" flex-none  space-x-6 md:flex   py-4">
                <div class="flex-1  space-y-6">
                    <div class="flex-1   space-y-6">
                         
                                <x-input-label for="seat_number" :value="__('Seat No')" />
                                <x-text-input id="seat_number" required type="text" class="mt-2 block w-full"
                                name="seat_number"  autocomplete="seat_number"  />
                                <x-input-error :messages="$errors->get('seat_number')" class="mt-2" />
                             
                        </div>                    
                </div>
                <div class="flex-1   space-y-6">
                    <div class="flex-1   space-y-6">
                        
                                <x-input-label for="cgpa" :value="__('CGPA')" />
                                <x-text-input id="cgpa" required type="text" class="mt-2 block w-full"
                                name="cgpa"  autocomplete="cgpa" />
                                <x-input-error :messages="$errors->get('cgpa')" class="mt-2" />
                              
                    </div>

                </div>

                <div class="flex-1   space-y-6">
                    <div class="flex-1   space-y-6">
                        
                                <x-input-label for="grade" :value="__('GRADE')" />
                                <x-text-input id="grade" required type="text" class="mt-2 block w-full"
                                name="grade"    autocomplete="grade" />
                                <x-input-error :messages="$errors->get('grade')" class="mt-2" />
                            
                    </div>
                </div>
            </div>

            <div class=" flex-none  space-x-6 md:flex   py-4">
                <div class="flex-1   space-y-6">
                    <div class="flex-1   space-y-6">
                        
                                <x-input-label for="obtained_marks" :value="__('Obtained Marks')" />
                                <x-text-input id="obtained_marks" required type="text" class="mt-2 block w-full"
                                wire:model.blur="obtained_marks"
                                name="obtained_marks" autocomplete="obtained_marks" />
                                <x-input-error :messages="$errors->get('obtained_marks')" class="mt-2" />
                              
                    </div>

                </div>

                <div class="flex-1   space-y-6">
                    <div class="flex-1   space-y-6">
                        
                                <x-input-label for="total_marks" :value="__('Total Marks')" />
                                <x-text-input id="total_marks" required type="text" class="mt-2 block w-full"
                                wire:model.blur="total_marks"
                                name="total_marks"  autocomplete="total_marks" />
                                <x-input-error :messages="$errors->get('total_marks')" class="mt-2" />
                            
                    </div>
                </div>

                <div class="flex-1   space-y-6">
                    <div class="flex-1   space-y-6">
                        
                                <x-input-label for="percentage" :value="__('Percentage')" />
                                <x-text-input id="percentage" required type="text" class="mt-2 block w-full"
                                name="percentage"  readonly autocomplete="percentage" value={{$percentage}}  />
                                <x-input-error :messages="$errors->get('percentage')" class="mt-2" />
                            
                    </div>
                </div>
            </div>



        </div>
