<div>
    <div class=" flex-col space-y-4 bg-white m-2 py-2 px-3 rounded-sm shadow-lg">
        <x-text-input placeholder="Search Text" wire:model.live="search"></x-text-input>
     </div>
   <div class=" flex-col space-y-4 bg-white m-2 py-2 px-3 rounded-sm shadow-lg">
   <div>
    <button x-on:click="$wire.sortBy('state_code')" >Click Me!!!</button>
   </div>
        
    <x-table >
        <x-slot name="head" >
            <x-tables.row  > 
                <x-tables.heading class="   cursor-pointer " sortable   wire:click.live="sortBy('state_code')"  direction='asc'   > state_code
              </x-tables.heading>
            <x-tables.heading  sortable wire:click.live="sortBy('state_name')" direction='asc'> state_name
            </x-tables.heading>
            <x-tables.heading  sortable wire:click.live="sortBy('country_id')"  direction='asc'> Country
            </x-tables.heading>
            <x-tables.heading  sortable wire:click.live="sortBy('state_or_UT')"  direction='asc'> Code
            </x-tables.heading>
            <x-tables.heading  sortable wire:click.live="sortBy('created_at')"  direction='asc'> Date  
            </x-tables.heading>
            </x-tables.row>
        </x-slot>
        <x-slot name="body" >
        
            @forelse($allstates as $state)
         
            <x-tables.row   wire:loading.class="opacity-50" wire:key="{{$state->id}}">
                <x-tables.cell > {{$state->state_code}}   </x-tables.cell>  
                <x-tables.cell> {{$state->state_name}}   </x-tables.cell> 
                <x-tables.cell> {{$state->country->country_name}}   </x-tables.cell>
                <x-tables.cell > <span class=" bg-{{$state->StateColor}}-500 text-white h-6 w-6 px-2 py-2 rounded-full">{{$state->state_or_UT}} </span>   </x-tables.cell> 
                <x-tables.cell> {{$state->CreatedDateFormat}}   </x-tables.cell>
            </x-tables.row>
          @empty
          <x-tables.row    >
            <x-tables.cell colspan="5"> 
                <div class=" flex justify-center bg-slate-100 py-6 font-semibold rounded-sm shadow-sm items-center text-xl  ">No Data Found .....</div>
            </x-tables.cell>
          </x-tables.row>
          @endforelse
        </x-slot>
    </x-table>

<div>
    {{$allstates->links()}}
</div>

   </div>

</div>
