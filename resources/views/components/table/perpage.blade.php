@props(["disabled" => false])

<x-input-select class="py-2" wire:loading.attr="disabled" wire:model.live="perPage">
  <x-select-option value="10">10</x-select-option>
  <x-select-option value="25">25</x-select-option>
  <x-select-option value="50">50</x-select-option>
  <x-select-option value="75">75</x-select-option>
  <x-select-option value="100">100</x-select-option>
  <x-select-option value="250">250</x-select-option>
  <x-select-option value="500">500</x-select-option>
</x-input-select>
