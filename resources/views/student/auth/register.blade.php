<x-newstudent-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Student Registration') }}
            </h2>
           

                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="/student/"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="/student/login"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Login</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span
                                    class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Register</span>
                            </div>
                        </li>
                    </ol>
                </nav>

             
        </div>
    </x-slot>
    <div
        class="m-auto w-full sm:max-w-5xl			 mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-lg overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('student.register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('first_name')" required autofocus autocomplete="first_name"  placeholder="Enter First Name"/>
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
             <!-- Middle Name -->
             <div>
                <x-input-label for="middle_name" :value="__('Middle Name')" />
                <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name"
                    :value="old('middle_name')" required autofocus autocomplete="middle_name" placeholder="Enter Middle Name" />
                <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
            </div>
             <!-- First Name -->
             <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="old('last_name')" required autofocus autocomplete="last_name" placeholder="Enter Last Name"  />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="mother_name" :value="__('Mother Name ')" />
                <x-text-input id="mother_name" class="block mt-1 w-full" type="text" name="mother_name"
                    :value="old('mother_name')" required autofocus autocomplete="mother_name" placeholder="Enter Mother"  />
                <x-input-error :messages="$errors->get('mother_name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="memid" :value="__('Member ID ')" />
                <x-text-input id="memid" class="block mt-1 w-full" type="text" name="memid"
                    :value="old('memid')" required autofocus autocomplete="memid" placeholder="Enter MemID"  />
                <x-input-error :messages="$errors->get('memid')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="eligibilityno" :value="__('Eligibility No.')" />
                <x-text-input id="eligibilityno" class="block mt-1 w-full" type="text" name="eligibilityno"
                    :value="old('eligibilityno')" required autofocus autocomplete="eligibilityno" placeholder="Enter Eligibility Number"  />
                <x-input-error :messages="$errors->get('eligibilityno')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="aadhar_card_no" :value="__('Addhar Number')" />
                <x-text-input id="aadhar_card_no" class="block mt-1 w-full" type="text" name="aadhar_card_no"
                    :value="old('aadhar_card_no')" required autofocus autocomplete="aadhar_card_no" placeholder="Enter Addhar Number"  />
                <x-input-error :messages="$errors->get('aadhar_card_no')" class="mt-2" />
            </div>
            
            <div>
                <x-input-label for="abcid" :value="__('ABC-ID.')" />
                <x-text-input id="abcid" class="block mt-1 w-full" type="text" name="abcid"
                    :value="old('abcid')" required autofocus autocomplete="abcid" placeholder="Enter ABC-ID"  />
                <x-input-error :messages="$errors->get('abcid')" class="mt-2" />
            </div>
            
            
    
            <div class="mt-4">
                <x-input-label for="mobile_no" value="{{ __('Mobile Number') }}" />
                <x-text-input id="mobile_no" class="block mt-1 w-full" type="text"
                    name="mobile_no" :value="old('mobile_no')" required placeholder="Enter  Mobile Number" />
                <x-input-error :messages="$errors->get('mobile_no')" for="mobile_no" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" placeholder="Enter Email-Id"  />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password"   placeholder="Enter Password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('student.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-newstudent-layout>
