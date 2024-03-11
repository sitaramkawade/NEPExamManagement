 <div>
    
  <x-select2.select style="width:100%;" id="subject_id" name="subject_id" wire:model='subject_id' > 
    @foreach ($subjects as $subjcetid => $subjectname)
      <x-select2.option value="{{ $subjcetid }}">{{  $subjectname }}</x-select2.option>
    @endforeach
  </x-select2.select>
  <x-select2.select multiple="multiple" style="width:100%;" id="subject_id2" name="subject_id2" wire:model='subject_id2' > 
    @foreach ($subjects as $subjcetid2 => $subjectname2)
      <x-select2.option value="{{ $subjcetid2 }}">{{  $subjectname2 }}</x-select2.option>
    @endforeach
  </x-select2.select>

  You have selected: <strong>{{ $subject_id }}</strong>
  You have selected: <strong>{{ print_r($subject_id2 )}}</strong>
  <br>
  Note :  name and id require , where wire:model is only for default value ,if multiple add attibute multiple
  <br> style is pending
</div>
