@props(['name' => false, 'svg' => false ,'slot'=>false])
<div x-data="{ isActive: false, open: false }">
  <a @click="$event.preventDefault(); open = !open" :aria-expanded="(open || isActive) ? 'true' : 'false'" role="button" aria-haspopup="true" :class="{ 'bg-primary text-white dark:bg-primary': isActive || open, 'pl-5 pr-2 rounded-md': isSidebarExpanded, 'mx-3 px-auto rounded-full ': !isSidebarExpanded }" class="flex h-9 py-2 text-white  hover:bg-primary hover:text-white dark:text-light dark:hover:bg-primary">
    <span aria-hidden="true" :class="{ 'mx-auto': !isSidebarExpanded }" class="h-5 w-5">
      <svg class="h-5 w-5 font-bold" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        {{ $svg }}
      </svg>
    </span>
    <span :class="{ 'hidden': !isSidebarExpanded }" class="ml-2 text-sm">{{ $name }}</span>
    <span :class="{ 'hidden': !isSidebarExpanded }" class="ml-auto" aria-hidden="true">
      <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </span>
  </a>
  <div role="menu" x-show="open" class="mt-2 space-y-2" aria-label="{{ $name }}">
    {{ $slot }}
  </div>
</div>
