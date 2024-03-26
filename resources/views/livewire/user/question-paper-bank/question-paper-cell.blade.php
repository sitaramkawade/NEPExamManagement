<div>
  <div>
    @if ($is_bank)
      <div class="flex items-center mb-2 gap-x-5 ">
        <x-view-image-model-btn title="{{ $is_bank->file_name }}" i="1" src="{{ isset($is_bank->file_path) ? asset($is_bank->file_path) : asset('img/no-img.png') }}"> View </x-view-image-model-btn>
        @if (isset($is_bank->papersubmission->is_confirmed) && $is_bank->papersubmission->is_confirmed == 0)
          <x-table.delete wire:click='delete_question_paper_set_document({{ $is_bank->papersubmission_id }},{{ $is_bank->id }})'>Delete </x-table.delete>
        @endif
      </div>
    @else
      <form wire:submit='upload_question_paper_set_document()'>
        <div class="flex-col items-center mb-2">
          <span class="inline-flex">
            <x-input-file class="text-xs file:px-2 file:rounded-sm file:text-xs w-[75%] mr-2" name="questionbank.{{ $subject_id }}.{{ $set->id }}" id="questionbank.{{ $subject_id }}.{{ $set->id }}" wire:model="questionbank.{{ $subject_id }}.{{ $set->id }}" accept=".pdf" />
            @if (isset($questionbank[$subject_id]))
              <x-table.upload-btn i="0" wire:loading.remove wire:target="questionbank.{{ $subject_id }}.{{ $set->id }}" class="cursor-pointer px-5">Upload</x-table.upload-btn>
            @else
              <x-table.upload-btn type="button" i="0" wire:loading.remove wire:target="questionbank.{{ $subject_id }}.{{ $set->id }}" class=" cursor-not-allowed bg-red-400 px-5">No File</x-table.upload-btn>
              <x-table.upload-btn type="button" i="0" wire:loading wire:target="questionbank.{{ $subject_id }}.{{ $set->id }}" class="px-4 !bg-blue-400 cursor-not-allowed">Loading</x-table.upload-btn>
            @endif
          </span>
          @error("questionbank.{$subject_id}.{$set->id}")
            <div class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</div>
          @enderror
        </div>
      </form>
    @endif
  </div>
</div>
