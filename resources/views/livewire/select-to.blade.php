
<div>
    <select wire:model="selectedOption" class="form-control">
        <option value="">Select an option</option>
        @foreach($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>

    <div wire:loading>
        Loading...
    </div>

    @if(count($options) > 0)
        <div>
            <h5>Filtered Options</h5>
            <ul>
                @foreach($options as $option)
                    <li>{{ $option->name }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('optionsFiltered', function () {
                // Additional logic after options are filtered
            });
        });
    </script>
</div>
