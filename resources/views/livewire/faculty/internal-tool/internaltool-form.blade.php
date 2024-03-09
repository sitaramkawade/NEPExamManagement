<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Internal Tool Detail's
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="toolname" :value="__('Tool Name')" />
            <x-text-input id="toolname" type="text" wire:model="toolname" name="toolname" placeholder="Tool Name" class=" @error('toolname') is-invalid @enderror w-full mt-1" :value="old('toolname', $toolname)" required autofocus autocomplete="toolname" />
            <x-input-error :messages="$errors->get('toolname')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="course_type" :value="__('Course Type')" />
            <x-input-select id="course_type" wire:model="course_type" name="course_type" class="text-center w-full mt-1" :value="old('course_type', $course_type)" required autocomplete="course_type">
                <x-select-option class="text-start" hidden> -- Select Course -- </x-select-option>
                @forelse ($course_types as $coursetypeid => $coursetypename)
                    <x-select-option wire:key="{{ $coursetypeid }}" value="{{ $coursetypename }}" class="text-start"> {{ $coursetypename }} </x-select-option>
                @empty
                    <x-select-option class="text-start">Course Types Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('course_type')" class="mt-2" />
        </div>
    </div>
    @if ($internaltool_documents)
        {{-- <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="grid grid-cols-1 md:grid-cols-4">
                <div class="px-5 col-span-2 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="doc_name" :value="__('Document Name')" />
                </div>
                <div class="px-5 col-span-2 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="doc_name" :value="__('Required')" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4">
                <div class="px-5 col-span-2 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="doc_name" :value="__('Document Name')" />
                </div>
                <div class="px-5 col-span-2 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="doc_name" :value="__('Required')" />
                </div>
            </div>
        </div> --}}
        <div class="grid grid-cols-12 md:grid-cols-2">
            @foreach ($internaltool_documents as $index => $inttooldocname)
                <div class="grid grid-cols-12 md:grid-cols-12">
                    <div class="px-5 col-span-10 py-2 text-sm text-gray-600 dark:text-gray-400">
                        <x-input-show id="doc_name" :value="$inttooldocname" />
                    </div>
                    <div class="px-5 col-span-2 py-2 text-sm text-gray-600 dark:text-gray-400">
                        <x-input-checkbox id="is_checked.{{ $index }}" wire:model="is_checked.{{ $index }}" name="is_checked.{{ $index }}" />
                        @error("is_checked.{$index}")
                            <div class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <x-form-btn>Submit</x-form-btn>
</div>
