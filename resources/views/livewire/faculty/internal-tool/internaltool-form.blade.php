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
            <x-input-select id="course_type" wire:model.live="course_type" name="course_type" class="text-center w-full mt-1" :value="old('course_type', $course_type)" required autocomplete="course_type">
                <x-select-option class="text-start" hidden> -- Select Course -- </x-select-option>
                @forelse ($course_types as $coursetypeid => $coursetypename)
                    <x-select-option wire:key="{{ $coursetypeid }}" value="{{ $coursetypename }}" class="text-start"> {{ $coursetypename }} </x-select-option>
                @empty
                    <x-select-option class="text-start">Course Types Not Found</x-select-option>
                @endforelse
            </x-input-select>
            <x-input-error :messages="$errors->get('course_type')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="document_count" :value="__('Required Document')" />
            <x-text-input id="document_count" type="number" wire:model.live="document_count" name="document_count" placeholder="Required Document" class=" @error('document_count') is-invalid @enderror w-full mt-1" :value="old('document_count', $document_count)" required autofocus autocomplete="document_count" />
            <x-input-error :messages="$errors->get('document_count')" class="mt-2" />
        </div>
    </div>
    @if ($document_inputs)
        @foreach ($document_inputs as $index => $input)
            <div class="grid grid-cols-1 md:grid-cols-4">
                <div class="px-5 col-span-2 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label :value="__('Document Name')" />
                    <x-text-input id="document_{{ $index }}" type="text" wire:model="internaldoc_name.{{ $index }}" name="document.{{ $index }}" placeholder="Document Name" class="@error('document_inputs.' . $index) is-invalid @enderror w-full mt-1" value="" required autofocus autocomplete="document_count" />
                    @error("internaldoc_name.$index")
                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="px-5 col-span-2 mt-7 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-checkbox id="is_multiple.{{ $index }}" wire:model="is_multiple.{{ $index }}" name="is_multiple.{{ $index }}" :value="old('is_multiple.{{ $index }}')" />
                    <x-input-label for="is_multiple.{{ $index }}" class="inline mb-1 mx-2" :value="__('Is Multiple')" />
                    @error("is_multiple.$index")
                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endforeach
    @endif
    <x-form-btn>Submit</x-form-btn>
</div>
