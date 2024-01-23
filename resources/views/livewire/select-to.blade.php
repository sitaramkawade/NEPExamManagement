<div>
  @php
   $districts  = App\Models\District::get()->pluck('district_name', 'id');
  @endphp



<input type="text">
<form wire:submit.prevent='save()' action="">

  @csrf
  <input type="text">
  <x-select-to.try    name="district_id" wire:model="district_id" :options="$districts"/>

  <input type="submit" value="ggd">
</form>


{{ $district_id }}

</div>