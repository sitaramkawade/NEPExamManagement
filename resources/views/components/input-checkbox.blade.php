@props(['disabled' => false])

<input  type="checkbox"  {{ $disabled ? 'disabled' : '' }}  {!! $attributes->merge(['class' => 'my-1 h-10 w-10 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-primary focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm dark:border-primary-darker border']) !!}>
