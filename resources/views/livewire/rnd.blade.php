 <div class="p-5">
    <div>
      <x-select2.select style="width:100%;" id="subject_id" name="subject_id" wire:model='subject_id'  > 
        @foreach ($subjects as $subjcetid => $subjectname)
          <x-select2.option value="{{ $subjcetid }}">{{  $subjectname }}</x-select2.option>
        @endforeach
      </x-select2.select>

    </div>

    <br><br>
    <x-input-select class="w-full"></x-input-select>
    <br><br><br>
  <x-select2.select multiple="multiple" style="width:100%;" id="subject_id2" name="subject_id2" wire:model='subject_id2' > 
    @foreach ($subjects as $subjcetid2 => $subjectname2)
      <x-select2.option value="{{ $subjcetid2 }}">{{  $subjectname2 }}</x-select2.option>
    @endforeach
  </x-select2.select>



</div>
