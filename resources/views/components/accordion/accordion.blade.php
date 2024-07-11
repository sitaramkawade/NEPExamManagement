@props(['slot'=>false ,'tab'=>false])
<div x-data="{ openTab:{{ $tab }} }" id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
   {{ $slot }}
</div>
  