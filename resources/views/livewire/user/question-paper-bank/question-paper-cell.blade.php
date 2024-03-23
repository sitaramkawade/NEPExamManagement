<div>
  @if ($is_bank)
  <form wire:submit='upload_document()'>
    <div class="flex items-center mb-2 gap-2">
      <x-view-image-model-btn title="{{ $is_bank->file_name }}" i="1" src="{{ isset($is_bank->file_path) ? asset($is_bank->file_path) : asset('img/no-img.png') }}" />
      @if (isset($is_bank->papersubmission->is_confirmed) && $is_bank->papersubmission->is_confirmed==0)
          <x-table.delete wire:click='delete_question_paper_set_document({{ $is_bank->papersubmission_id }},{{ $is_bank->id }})'/>
      @endif
    </div>
  </form>
  @else
  <form wire:submit='upload_question_paper_set_document()'>
    <div class="flex items-center mb-2">
      <x-input-file class="text-xs file:px-2 file:rounded-sm file:text-xs w-[75%] mr-2" name="questionbank.{{ $subject_id }}.{{ $set->id }}" id="questionbank.{{ $subject_id }}.{{ $set->id }}" wire:model="questionbank.{{ $subject_id }}.{{ $set->id }}" accept=".pdf" />
      @error('questionbank.{$subject_id}.{$set->id}')
      <div class="text-sm text-red-600 dark:text-red-400 space-y-1">{{ $message }}</div>
      @enderror
        <x-table.upload-btn i="0">Upload</x-table.upload-btn>
    </div>
  </form>
  @endif
</div>