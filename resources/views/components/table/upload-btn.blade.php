@props(['disabled' => false, 'slot' => false, 'i' => true])

<button type="submit" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'inline-flex text-white  cursor-pointer mt-1']) !!}>
    <span class="inline-flex items-center justify-center rounded-md bg-green-700 p-1.5 shadow-lg">
        @if ($i)
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-1 h-5 w-5 dark:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m6.75 12-3-3m0 0-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>
        @endif
        {{ $slot }}
    </span>
</button>
{{-- <button type="button" wire:click.prevent="saveattachment({{ $facultyinternaldocument->id }})" class="inline-block px-6 pt-2.5 pb-2 bg-blue-600 text-white font-medium text-xs leading-normal uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex align-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 mr-3">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
    </svg>
    Upload
</button>
<input type="file" accept="image/png, image/jpg, image/jpeg,.pdf" id="docattachment.{{ $facultyinternaldocument->id }}" wire:model="docattachment.{{ $facultyinternaldocument->id }}">
<div class=" text-red-600" wire:loading wire:target="docattachment.{{ $facultyinternaldocument->id }}">Uploading please Wait...</div> --}}
