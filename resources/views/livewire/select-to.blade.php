<div>
    {{-- <select type="text">
        @foreach ($Options as $op)
            <option value="{{ $op->{$key} }}">{{ $op->{$value} }}</option>
        @endforeach
    </select> --}}

    {{-- <div style="position: relative; display: inline-block;">
        <select wire:model="selectedOption">
            <input type="text" wire:model="search" placeholder="Search..."  style="position: absolute; top: 0;left: 0;width: 100%; height:40px;  border: none;outline: none;">
            <option value="">Select an option</option>
            @foreach ($Options as $op)
            <option value="{{ $op->{$key} }}">{{ $op->{$value} }}</option>
        @endforeach
        </select>
    </div> --}}
    {{-- <div style="position: relative; display: inline-block;">
        <input type="text" wire:model="search" placeholder="Search..." style="width: 100%; height: 40px; border: none; outline: none;">
        <select wire:model="selectedOption" style="width: 100%; height: 40px; border: none; outline: none;">
            <option value="">Select an option</option>
            @foreach ($Options as $op)
                <option value="{{ $op->{$key} }}">{{ $op->{$value} }}</option>
            @endforeach
        </select>
    </div> --}}
    {{-- <div style="position: relative; display: inline-block;">
        <div style="position: absolute; top: 0; left: 0; width: 100%;">
            <input
                type="text"
                wire:model="search"
                placeholder="Search..."
                style="width: 100%; height: 40px; border: none; outline: none; display: none;"
                id="searchInput"
            >
        </div>
        <select
            wire:model="selectedOption"
            style="width: 100%; height: 40px; border: none; outline: none;"
            onclick="showSearchInput()"
            onblur="hideSearchInput()"
        >
            <option value="">Select an option</option>
            @foreach ($Options as $op)
                <option value="{{ $op->{$key} }}">{{ $op->{$value} }}</option>
            @endforeach
        </select>
    
        <script>
            function showSearchInput() {
                document.getElementById('searchInput').style.display = 'block';
            }
    
            function hideSearchInput() {
                document.getElementById('searchInput').style.display = 'none';
            }
        </script>
    </div> --}}
    {{-- <div style="position: relative; display: inline-block;">
        <div style="position: absolute; top: 0; left: 0; width: 100%;">
            <input
                type="text"
                wire:model="search"
                placeholder="Search..."
                style="width: 100%; height: 40px; border: none; outline: none; display: none;"
                id="searchInput"
            >
        </div>
        <select
            wire:model="selectedOption"
            style="width: 100%; height: 40px; border: none; outline: none;"
            onfocus="showSearchInput()"
            onblur="hideSearchInput()"
        >
            <option value="">Select an option</option>
            @foreach ($Options as $op)
                <option value="{{ $op->{$key} }}">{{ $op->{$value} }}</option>
            @endforeach
        </select>
    
        <script>
            function showSearchInput() {
                document.getElementById('searchInput').style.display = 'block';
            }
    
            function hideSearchInput() {
                // Add a slight delay before hiding to allow clicking the input
                setTimeout(function() {
                    document.getElementById('searchInput').style.display = 'none';
                }, 200);
            }
        </script>
    </div> --}}
    
  
    {{-- <div style="position: relative; display: inline-block;">
        <select
            wire:model="selectedOption"
            style="width: 100%; height: 40px; border: none; outline: none;"
            onclick="showSearchInput()"

            >
            <div style="position: absolute; top: 0; left: 0; width: 100%;">
                <input
                    type="text"
                    wire:model="search"
                    placeholder="Search..."
                    style="width: 100%; height: 40px; border: none; outline: none; display: none;"
                    id="searchInput"
                >
            </div>
            <option value="" disabled>Select an option</option>
            @foreach ($Options as $op)
                <option value="{{ $op->{$key} }}">
                    <span style="display: none;">{{ $op->{$value} }}</span>
                </option>
            @endforeach
        </select>
    
    
        <script>
            function showSearchInput() {
                document.getElementById('searchInput').style.display = 'block';
            }
    
            function hideSearchInput() {
                setTimeout(function() {
                    document.getElementById('searchInput').style.display = 'none';
                }, 200);
            }
        </script>


    </div> --}}

    <div x-data="{ isOpen: false }" class="relative inline-block">
        <select
            x-model="selectedOption"
            @click="isOpen = !isOpen"
            class="w-full h-12 border border-gray-300 rounded focus:outline-none px-4"
        >
        <option class="absolute mt-1 w-full">
            
        </option>
           
                <input  x-show.transition="isOpen" @click.away="isOpen = false" class="absolute mt-1 w-full"
                    x-model="search"
                    type="text"
                    placeholder="Search..."
                    class="w-full h-10 px-4 border border-gray-300 rounded-t focus:outline-none"
                >
         
       
            <option value="" disabled>Select an option</option>
            @foreach ($Options as $op)
                <option value="{{ $op->{$key} }}">{{ $op->{$value} }}</option>
            @endforeach
        </select>
    
        {{-- <div x-show.transition="isOpen" @click.away="isOpen = false" class="absolute mt-1 w-full">
            <input
                x-model="search"
                type="text"
                placeholder="Search..."
                class="w-full h-10 px-4 border border-gray-300 rounded-t focus:outline-none"
            >
        </div> --}}
    
        <script>
            function containsIgnoreCase(str, search) {
                return str.toLowerCase().includes(search.toLowerCase());
            }
        </script>
    </div>
    
    
</div>