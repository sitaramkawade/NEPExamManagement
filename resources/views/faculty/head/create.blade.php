<x-faculty-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faculty') }}



        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('admin.head.showfaculty') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">back </a>
            </div>
           


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                        <div class="py-2   align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="m-20  overflow-hidden border-b border-gray-200 sm:rounded-lg">
                             
                                <form method="POST" action="{{ route('admin.head.store') }}">
                                    @csrf
                        
                                    <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
                        
                                     <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
                                    <div>
                                        <x-input-label for="mobile" value="{{ __('Mobile Number') }}" />
                                        <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                                    </div>
                                    <div class="mt-4">
                                        <x-input-label for="college" value="{{ __('College') }}" />
                                        <select id="college"  class="block mt-1 w-full rounded" name="college">
                                        <option value="" disabled >
                                                {{"Select "}}
                                            </option>

                                            @foreach ($college as $item)
                                            <option value={{$item->id}}  >
                                                {{ Str::upper( $item->college_name)}}
                                            </option>
                                            @endforeach
                                           
                                         
                            
                                        </select>   
                                        <x-input-error :messages="$errors->get('college')" class="mt-2" />
                                      </div>
                        
                                    <div class="mt-4">
                                        <x-input-label for="dept" value="{{ __('Department') }}" />
                                        <select id="dept"  class="block mt-1 w-full rounded" name="dept">
                                          

                                            @foreach ($dept as $item)
                                            <option value={{$item->id}}  >
                                                {{ Str::upper( $item->dept_name)}}
                                            </option>
                                            @endforeach
                                           
                                         
                            
                                        </select>   
                                        <x-input-error :messages="$errors->get('dept')" class="mt-2" />
                                      </div>
                                   
                                      <div class="mt-4">
                                        <x-input-label for="roles" value="{{ __('Role') }}" />
                                        <select id="role"  class="block mt-1 w-full rounded" name="role">
                                            <option value=""  >
                                                {{"Select "}}
                                            </option>

                                            @foreach ($role as $item)
                                            <option value={{$item->id}}  >
                                                {{ Str::upper( $item->role_name)}}
                                            </option>
                                            @endforeach
                                           
                                         
                            
                                        </select>    
                                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                      </div>
                                       
 
 
 
 

 

                                      <div>
                                        <x-input-label for="account_no" value="{{ __('Account No') }}" />
                                        <x-text-input id="account_no" class="block mt-1 w-full" type="text" name="account_no" :value="old('account_no')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('account_no')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="bank_address" value="{{ __('Bank Address') }}" />
                                        <x-text-input id="bank_address" class="block mt-1 w-full" type="text" name="bank_address" :value="old('bank_address')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('bank_address')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="bank_name" value="{{ __('Bank Name') }}" />
                                        <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="branch_name" value="{{ __('Branch Name') }}" />
                                        <x-text-input id="branch_name" class="block mt-1 w-full" type="text" name="branch_name" :value="old('branch_name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('branch_name')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="branch_code" value="{{ __('Branch Code') }}" />
                                        <x-text-input id="branch_code" class="block mt-1 w-full" type="text" name="branch_code" :value="old('branch_code')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('branch_code')" class="mt-2" />
                                    </div>

                                    
                                    <div>
                                        <x-input-label for="ifsc_code" value="{{ __('IFSC CODE') }}" />
                                        <x-text-input id="ifsc_code" class="block mt-1 w-full" type="text" name="ifsc_code" :value="old('ifsc_code')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('ifsc_code')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="micr_code" value="{{ __('MICR CODE') }}" />
                                        <x-text-input id="micr_code" class="block mt-1 w-full" type="text" name="micr_code" :value="old('micr_code')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('micr_code')" class="mt-2" />
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
