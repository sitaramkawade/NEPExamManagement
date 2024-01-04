<x-student-layout>

   
    <x-slot name="sidebar">
        <nav class="  pt-4 mx-1 ">    
 
             
            <div class="  ">  
                @if(Auth::user()->studentaddress->count()!==2)
                <x-sidebar-nav-link   :href="route('student.AddressDetails.create')" :active="request()->routeIs('student.AddressDetails.create')">
                    {{ __('Add Address') }} 
                </x-sidebar-nav-link> 
                @endif
            </div>
            
            <div class="  ">  
                @if(Auth::user()->studentaddress->count()!==0)
                <x-sidebar-nav-link  :href="route('student.AddressDetails.index')" :active="request()->routeIs('student.AddressDetails.index')">
                    {{ __('Show Address') }}
                    
                </x-sidebar-nav-link> 
                @endif
            </div>
         
           

        </nav>
      
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Address') }}
        </h2>
    </x-slot>

    <div class="py-3 ">
      
                @livewire('student.address')
           
               
       
    
    </div>
</x-student-layout>
