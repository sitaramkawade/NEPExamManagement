@extends("layouts.student")
@section("student")
  <div class="flex min-h-screen flex-col-1 items-center bg-gray-100 pt-6 dark:bg-gray-900 sm:justify-center sm:pt-0  px-2">
    <div class="mt-6 w-full p-5 overflow-hidden bg-white xm:m-10 md:m-20 shadow-md dark:bg-gray-800  sm:rounded-lg ">

      <form method="POST" action="{{ route('student.register') }}">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 ">
                <!--First Name -->
                <div class="mt-1">
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input placeholder="Enter First Name As Per Your Previous Year Marksheet" id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-1" />
                </div>

                <!--Middle Name -->
                <div class="mt-1"> 
                    <x-input-label for="middle_name" :value="__('Middle Name')" />
                    <x-text-input placeholder="Enter Middle Name As Per Your Previous Year Marksheet" id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" required autofocus autocomplete="middle_name" />
                    <x-input-error :messages="$errors->get('middle_name')" class="mt-1" />
                </div>

                <!--Last Name -->
                <div class="mt-1">
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input placeholder="Enter Last Name As Per Your Previous Year Marksheet" id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-1" />
                </div>
                
                <!--Member ID -->
                <div class="mt-1">
                    <x-input-label for="member_id" :value="__('Member ID')" />
                    <x-text-input placeholder="Enter Member ID As Per Your I-CARD / Admission" id="member_id" class="block mt-1 w-full" type="number" name="member_id" :value="old('member_id')" required autofocus autocomplete="member_id" />
                    <x-input-error :messages="$errors->get('member_id')" class="mt-1" />
                </div>

                <!--Mobile Number -->
                <div class="mt-1">
                    <x-input-label for="mobile_no" :value="__('Mobile Number')" />
                    <x-text-input placeholder="Enter Mobile Number" id="mobile_no" class="block mt-1 w-full" type="number" name="mobile_no" :value="old('mobile_no')" required autofocus autocomplete="mobile_no" />
                    <x-input-error :messages="$errors->get('mobile_no')" class="mt-1" />
                </div>
            
                <!-- Email -->
                <div class="mt-1">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input placeholder="Enter Valid Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>
            
                <!-- Password -->
                <div class="mt-1">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input placeholder="Enter Password" id="password" class="block mt-1 w-full"  type="password"  name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>
            
                <!-- Confirm Password -->
                <div class="mt-1">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input placeholder="Enter Confirm Password" id="password_confirmation" class="block mt-1 w-full"  type="password"  name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>
            </div>
            <div class="flex items-center justify-end mt-3">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('student.login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="ms-4"> {{ __('Register') }} </x-primary-button>
            </div>
        </form>
    </div>
  </div>
@endsection
