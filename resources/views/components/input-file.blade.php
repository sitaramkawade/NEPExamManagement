@props(['disabled' => false])

<input  {{ $disabled ? 'disabled' : '' }}  type="file" {!! $attributes->merge(['class' => 'block  text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold dark:file:bg-primary-darker file:text-white dark:hover:file:bg-primary  hover:file:bg-primary-darker file:bg-primary mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm dark:border-primary-darker border']) !!} />

