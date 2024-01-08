<div>
  <div class="p-5 md:w-1/3">
    <div x-data="{ isOpen: false }">
      <div class="relative rounded-md">
        <div @click="isOpen = !isOpen" class="cursor-pointer rounded-md border border-gray-300 py-2 text-center shadow-sm dark:border-gray-700 dark:border-primary-darker dark:bg-gray-900 dark:text-gray-300">
          <span x-text="selectedOption"></span>
          <span class="" :class="{ 'hidden': selectedOption }">-- Select --</span>
        </div>
        <div  id="dropdown-menu" x-cloak x-show.transition.opacity="isOpen" @click.away="isOpen = false" class="mt-1">
          <input  id="search-input"  wire:model.live.debounce.1s="filter" type="text" placeholder="Search" class="m-0 block h-10 w-full rounded-t-md border-x border-b-0 border-t border-gray-200 px-3 text-sm shadow-sm disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:border-primary-darker dark:bg-slate-900 dark:text-gray-400" />
          <select wire:model.live="district_id" size="5" @change="selectedOption = $event.target.selectedOptions[0].innerHTML ,isOpen = false" class="min-h-10 custom-scrollbar block w-full rounded-b-md border-x border-b border-gray-200 px-0 text-sm shadow-sm disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:border-primary-darker dark:bg-slate-900 dark:text-gray-400">
            @foreach ($options as $op)
              <option class="px-1" value="{{ $op->{$key} }}">{{ $op->{$value} }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    {{ $district_id }}
    
  </div>
  <div x-data="data()">
    <input type="hidden" :value="selected.value">
    <input type="text" x-model="search" placeholder="Click to search..." @click="optionsVisible = !optionsVisible">
    <div x-show="optionsVisible">
        <template x-for="option in filteredOptions()">
            <a @click.prevent="selected = option; optionsVisible = false" x-text="option.label" style="display: block;"></a>
        </template>
    </div>
    <p>Current search: <span x-text="search"></span></p>
    <p>Selected option: <span x-text="selected.label"></span></p>
</div>



</div>
