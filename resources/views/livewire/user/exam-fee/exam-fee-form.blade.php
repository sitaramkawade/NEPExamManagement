<div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
  <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
    Exam Fee
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2">
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="fee_type" :value="__('Fee Type')" />
      <x-text-input id="fee_type" type="text" wire:model="fee_type" placeholder="{{ __('Enter Fee Type') }}" name="fee_type" class="w-full mt-1" :value="old('fee_type', $fee_type)" autocomplete="fee_type" />
      <x-input-error :messages="$errors->get('fee_type')" class="mt-1" />
    </div>
    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
      <x-input-label for="active_status" :value="__('Status')" /> <br>
      <x-input-checkbox id="active_status"  wire:model="active_status"  name="active_status" :value="old('active_status',$active_status)" />
      <x-input-label for="active_status" class="inline mb-1 mx-2" :value="__('Make In Active')" />
      <x-input-error :messages="$errors->get('active_status')" class="mt-2" />
    </div>
  </div>
  <x-form-btn wire:loading.attr="disabled">Submit</x-form-btn>
</div>
