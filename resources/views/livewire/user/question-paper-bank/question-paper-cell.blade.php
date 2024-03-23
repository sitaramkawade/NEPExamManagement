<div>
    @php
        $pap = App\Models\Papersubmission::where('subject_id',$subject_id)->where('exam_id',$exam_id)->first();
        $is_bank = $pap->questionbanks()->where('set_id',$set->id)->first();
     @endphp
     @if (!$is_bank)

     <form wire:submit='upload_document()'>
         <div class="flex items-center mb-2">
           <x-input-file class="text-xs file:px-2 file:rounded-sm file:text-xs w-[75%] mr-2" name="questionbank.{{ $set->id }}" id="questionbank.{{ $set->id }}" wire:model="questionbank.{{ $set->id }}" accept=".pdf" />
           <x-table.upload-btn i="0" >Upload</x-table.upload-btn>
         </div>
       </form>
         
     @endif

</div>
