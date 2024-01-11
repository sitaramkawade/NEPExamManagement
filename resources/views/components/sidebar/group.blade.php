@props(['slot'=>false])
<span :class="{ 'hidden': !isSidebarExpanded }" class="px-5 min-w-full flex text-xs">{{ $slot }}</span>