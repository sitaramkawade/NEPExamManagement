<x-faculty-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Faculty in Department!!!') }}



        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                        <div class="py-2   align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="m-10 shadow-md rounded-lg px-3 py-4 overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="block mb-8">
                                <a href="{{ route('admin.head.showfaculty') }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Back </a>
                            </div>
                                <form method="POST" action="{{ route('admin.head.store') }}">
                                    @csrf
                                    <div class="flex  bg-white">
                           <div class="w-1/2 border-r-2 border-gray-250">
                           <div class="p-2">
                           <div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
            <x-input-label for="name" :value="__('*** Personal Details ***')" />
            </div></div></div>

                                <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div></div>
        </div>
                        
                                     <!-- Email Address -->
                                     <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div></div>
        </div>
        <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="mobile" value="{{ __('Mobile Number') }}" />
                                        <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required autofocus autocomplete="mobile" />
                                        <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                                        </div></div>
        </div>
                                    <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="college" value="{{ __('College') }}" />
                                        <select id="college"  class="block mt-1 w-full rounded" name="college">
                                        <option disabled selected >
                                                {{"Select College"}}
                                            </option>

                                            @foreach ($college as $item)
                                            <option value={{$item->id}}  >
                                                {{ Str::upper( $item->college_name)}}
                                            </option>
                                            @endforeach
                                           
                                         
                            
                                        </select>   
                                        <x-input-error :messages="$errors->get('college')" class="mt-2" />
                                        </div></div>
        </div>
                        
                                      <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="dept" value="{{ __('Department') }}" />
                                        <select id="dept"  class="block mt-1 w-full rounded" name="dept">
                                        <option disabled selected >
                                                {{"Select Department"}}
                                            </option>

                                            @foreach ($dept as $item)
                                            <option value={{$item->id}}  >
                                                {{ Str::upper( $item->dept_name)}}
                                            </option>
                                            @endforeach
                                           
                                         
                            
                                        </select>   
                                        <x-input-error :messages="$errors->get('dept')" class="mt-2" />
                                        </div></div>
        </div>
                                   
                                      <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="roles" value="{{ __('Role') }}" />
                                        <select id="role"  class="block mt-1 w-full rounded" name="role">
                                            <option disabled selected>
                                                {{"Select Role"}}
                                            </option>

                                            @foreach ($role as $item)
                                            <option value={{$item->id}}  >
                                                {{ Str::upper( $item->role_name)}}
                                            </option>
                                            @endforeach
                                           
                                         
                            
                                        </select>    
                                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                        </div></div>
        </div>
                                      <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="unipune_id" value="{{ __('Unipune ID') }}" />
                                        <x-text-input id="unipune_id" class="block mt-1 w-full" type="text" name="unipune_id" :value="old('unipune_id')" required autofocus autocomplete="unipune_id" />
                                        <x-input-error :messages="$errors->get('unipune_id')" class="mt-2" />
                                        </div></div>
        </div>
        <div class="p-2">

<div class="ml-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="qualification" value="{{ __('Qualification') }}" />
                                        <x-text-input id="qualification" class="block mt-1 w-full" type="text" name="qualification" :value="old('qualification')" required autofocus autocomplete="qualification" />
                                        <x-input-error :messages="$errors->get('qualification')" class="mt-2" />
                                        </div></div>
        </div>
        </div>
<div class="w-1/2">
<div class="p-2">
                           <div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
            <x-input-label for="name" :value="__('*** Bank Details ***')" />
            </div></div></div>
                                   
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
      
                                        <x-input-label for="account_no" value="{{ __('Account No') }}" />
                                        <x-text-input id="account_no" class="block mt-1 w-full" type="text" name="account_no" :value="old('account_no')" required autofocus autocomplete="account_no" />
                                        <x-input-error :messages="$errors->get('account_no')" class="mt-2" />
                                        </div></div></div>
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="bank_address" value="{{ __('Bank Address') }}" />
                                        <x-text-input id="bank_address" class="block mt-1 w-full" type="text" name="bank_address" :value="old('bank_address')" required autofocus autocomplete="bank_address" />
                                        <x-input-error :messages="$errors->get('bank_address')" class="mt-2" />
                                        </div></div></div>
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="bank_name" value="{{ __('Bank Name') }}" />
                                        <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name')" required autofocus autocomplete="bank_name" />
                                        <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                                        </div></div></div>
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="branch_name" value="{{ __('Branch Name') }}" />
                                        <x-text-input id="branch_name" class="block mt-1 w-full" type="text" name="branch_name" :value="old('branch_name')" required autofocus autocomplete="branch_name" />
                                        <x-input-error :messages="$errors->get('branch_name')" class="mt-2" />
                                        </div></div></div>
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="branch_code" value="{{ __('Branch Code') }}" />
                                        <x-text-input id="branch_code" class="block mt-1 w-full" type="text" name="branch_code" :value="old('branch_code')" required autofocus autocomplete="branch_code" />
                                        <x-input-error :messages="$errors->get('branch_code')" class="mt-2" />
                                        </div></div></div>

                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
         <x-input-label for="account_type" value="{{ __('Account Type') }}" />
                                        <select id="account_type"  class="block mt-1 w-full rounded" name="account_type" required>
                                          <option disabled selected>{{ "Select Account Type"}}</option>
                                          <option value='S'>{{ "Saving Account"}}</option>
                                          <option value='C'>{{ "Current Account"}}</option>
                                          </select>   
                                        <x-input-error :messages="$errors->get('account_type')" class="mt-2" />
                                        </div></div></div>
                                      <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="ifsc_code" value="{{ __('IFSC CODE') }}" />
                                        <x-text-input id="ifsc_code" class="block mt-1 w-full" type="text" name="ifsc_code" :value="old('ifsc_code')" required autofocus autocomplete="ifsc_code" />
                                        <x-input-error :messages="$errors->get('ifsc_code')" class="mt-2" />
                                        </div></div></div>
                                    <div class="p-2">

<div class="ml-1 mr-6">
    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
     
                                        <x-input-label for="micr_code" value="{{ __('MICR CODE') }}" />
                                        <x-text-input id="micr_code" class="block mt-1 w-full" type="text" name="micr_code" :value="old('micr_code')" required autofocus autocomplete="micr_code" />
                                        <x-input-error :messages="$errors->get('micr_code')" class="mt-2" />
                                        </div></div></div>
                                  
                                        </div>
</div>
                                    <div class="flex items-center justify-end mt-4">
                                    
                        
                                        <x-primary-button class="ml-4">
                                            {{ __('Add Faculty') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

</x-faculty-layout>
