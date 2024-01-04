<div>
    <div class="mx-auto max-w-7xl sm:px-6 lg:p-2">
        <section>
            <form wire:submit="addExam">
                <div class="m-2 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
                    
                     <x-card-header href="{{ route('user.viewExam') }}">
                        Add Exam
                        <x-slot name="svg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-1 mt-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                            </svg>
                        </x-slot>
                        <x-slot name="btntext">Back</x-slot>
                    </x-card-header>
                                 
                    <div>
                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-input-label for="exam_name" :value="__('Exam Name')" />
                            <x-required />
                            <x-text-input id="exam_name" type="text" wire:model="exam_name" name="exam_name" class="w-full mt-1" :value="old('exam_name',$exam_name)" required autofocus autocomplete="exam_name" />
                            <x-input-error :messages="$errors->get('exam_name')" class="mt-2" />
                        </div>

                    </div>
                 <div class="grid grid-cols-1 md:grid-cols-2">
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

                             <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                                <x-input-label for="exam_sessions" :value="__('Session')" />
                                <x-required />
                                <x-input-select id="exam_sessions" wire:model="exam_sessions" name="exam_sessions" class="text-center  w-full mt-1" :value="old('exam_sessions',$exam_sessions)" required autocomplete="exam_sessions">
                                    <x-select-option class="text-start" hidden> -- Select -- </x-select-option>
                                    <x-select-option class="text-start" value="1">Session 1</x-select-option>
                                    <x-select-option class="text-start" value="0">Session 2</x-select-option>
                                </x-input-select>
                                <x-input-error :messages="$errors->get('exam_sessions')" class="mt-2" />
                            </div>

                        </div>

                    <div class="h-20 p-2">
                        @if ($current_step===$steps)
                        <button type="submit"  class=" float-right  text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-darker font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary dark:hover:bg-primary-dark dark:focus:ring-primary-darker">
                            <span class="mx-2"> Add</span>
                        </button>
                        @endif
                    </div>
            </form>
    </div>
</div>
</div>
