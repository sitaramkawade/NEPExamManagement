 <div>
    
  <x-select2.select style="width:100%;" id="subject_id" name="subject_id" wire:model='subject_id' > 
    @foreach ($subjects as $subjcetid => $subjectname)
      <x-select2.option value="{{ $subjcetid }}">{{  $subjectname }}</x-select2.option>
    @endforeach
  </x-select2.select>

  You have selected: <strong>{{ $subject_id }}</strong>
  <br>
  Note :  name and id require , where wire:model is only for default value ,if multiple add attibute multiple
  <br> style is pending
</div>
