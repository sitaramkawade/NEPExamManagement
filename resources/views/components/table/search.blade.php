<div class="inline-flex items-center w-[10%] mx-auto">

  <label for="simple-search" class="sr-only">Search</label>
  <div class="relative w-full">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
      <svg class="h-5 w-5 text-primary" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8" />
        <path d="m21 21-4.3-4.3" />
      </svg>
    </div>
    <input type="search" wire:model.live.debounce.2000ms="search" id="simple-search" {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 dark:placeholder:text-white placeholder:text-gray-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-slate-900 dark:border-primary-darker dark:text-white dark:focus:ring-primary dark:focus:border-parimary']) !!} placeholder="Search" required />
  </div>
</div>
