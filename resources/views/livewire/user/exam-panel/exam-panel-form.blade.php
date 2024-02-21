<div>
  <div class="m-2 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Exam Panel
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="faculty_id" :value="__('Faculty')" />
            <x-required />
            <x-input-select id="faculty_id" wire:model="faculty_id" name="faculty_id" class="text-center w-full mt-1" :value="old('faculty_id',$faculty_id)" required autofocus autocomplete="faculty_id">
                <x-select-option class="text-start" hidden> -- Select Faculty -- </x-select-option>
                @foreach ($faculties as $f_id=>$fname)
                <x-select-option wire:key="{{ $f_id }}" value="{{ $f_id }}" class="text-start">{{$fname }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('faculty_id')" class="mt-2" />
        </div>

        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="examorderpost_id" :value="__('Exam Order Post')" />
            <x-required />
            <x-input-select id="examorderpost_id" wire:model="examorderpost_id" name="examorderpost_id" class="text-center w-full mt-1" :value="old('examorderpost_id',$examorderpost_id)" required autofocus autocomplete="examorderpost_id">
                <x-select-option class="text-start" hidden> -- Select Exam Order Post -- </x-select-option>
                @foreach ($examorderposts as $p_id=>$pname)
                <x-select-option wire:key="{{ $p_id }}" value="{{ $p_id }}" class="text-start">{{$pname }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('examorderpost_id')" class="mt-2" />
        </div>

        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="subject_id" :value="__('Subject Name')" />
            <x-required />
            <x-input-select id="subject_id" wire:model="subject_id" name="subject_id" class="text-center w-full mt-1" :value="old('subject_id',$subject_id)" required autofocus autocomplete="subject_id">
                <x-select-option class="text-start" hidden> -- Select Subject -- </x-select-option>subject_id
                @foreach ($subjects as $s_id=>$sname)
                <x-select-option wire:key="{{ $s_id }}" value="{{ $s_id }}" class="text-start">{{$sname }}</x-select-option>
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('subject_id')" class="mt-2" />
        </div>

        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="description" :value="__('Description')" />
            <x-required />
            <x-text-input id="description" type="text" wire:model="description" name="description" class="w-full mt-1" :value="old('description',$description)" required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="active_status" :value="__('Status')" />
            <x-required />
            <x-input-select id="active_status" wire:model="active_status" name="active_status" class="text-center  w-full mt-1" :value="old('active_status',$active_status)" required autocomplete="active_status">
                <x-select-option class="text-start" hidden> -- Select -- </x-select-option>
                <x-select-option class="text-start" value="0">Inactive</x-select-option>
                <x-select-option class="text-start" value="1">Active</x-select-option>
            </x-input-select>
            <x-input-error :messages="$errors->get('active_status')" class="mt-2" />
        </div>
    </div>
    <div class="h-20 p-2">
        <x-form-btn>
            Submit
        </x-form-btn>
    </div>
</div>
</div>
