<x-card-collapsible heading="Faculty Registration">
    <x-slot name="content">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="prefix" :value="__('Prefix')" />
                @unless ($isDisabled)
                    <x-text-input id="prefix" type="text" wire:model="prefix" name="prefix" class="@error('prefix') is-invalid @enderror w-full mt-1" :value="$prefix" required />
                @else
                    <x-text-input id="prefix" type="text" :value="$prefix" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="prefix" />
                @endunless
                <x-input-error :messages="$errors->get('prefix')" class="mt-2" />
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="faculty_name" :value="__('Faculty Name')" />
                @if ($isDisabled)
                    <x-text-input id="faculty_name" type="text" :value="$faculty_name" disabled class="bg-gray-100 cursor-not-allowed @error('faculty_name') is-invalid @enderror w-full mt-1" />
                @else
                    <x-text-input id="faculty_name" type="text" wire:model="faculty_name" name="faculty_name" class="@error('faculty_name') is-invalid @enderror w-full mt-1" :value="$faculty_name" required autofocus autocomplete="faculty_name" />
                @endif
                <x-input-error :messages="$errors->get('faculty_name')" class="mt-2" />
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="email" :value="__('Email')" />
                @if ($isDisabled)
                    <x-text-input id="email" type="text" wire:model="email" name="email" disabled class="bg-gray-100 cursor-not-allowed @error('email') is-invalid @enderror w-full mt-1" :value="$email" required />
                @else
                    <x-text-input id="email" type="text" wire:model="email" name="email" class=" @error('email') is-invalid @enderror w-full mt-1" :value="$email" required autofocus autocomplete="email" />
                @endif
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="mobile_no" :value="__('Mobile Number')" />
                @if ($isDisabled)
                    <x-text-input id="mobile_no" type="number" wire:model="mobile_no" name="mobile_no" disabled class="bg-gray-100 cursor-not-allowed @error('mobile_no') is-invalid @enderror w-full mt-1" :value="$mobile_no" required />
                @else
                    <x-text-input id="mobile_no" type="number" wire:model="mobile_no" name="mobile_no" class="@error('mobile_no') is-invalid @enderror w-full mt-1" :value="$mobile_no" required autofocus autocomplete="mobile_no" />
                @endif
                <x-input-error :messages="$errors->get('mobile_no')" class="mt-2" />
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="department_id" :value="__('Department')" />
                @unless ($isDisabled)
                    <x-text-input id="department_id" type="text" wire:model="department_id" name="department_id" class="@error('department_id') is-invalid @enderror w-full mt-1" :value="$department_id->dept_name" required />
                @else
                    <x-text-input id="department_id" type="text" :value="optional($department_id)->dept_name ?? ''" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="department_id" />
                @endunless
                <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
            </div>

            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="role_id" :value="__('Role')" />
                @unless ($isDisabled)
                    <x-text-input id="role_id" type="text" wire:model="role_id" name="role_id" class="@error('role_id') is-invalid @enderror w-full mt-1" :value="$role_id->role_name" required />
                @else
                    <x-text-input id="role_id" type="text" :value="optional($role_id)->role_name ?? ''" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="role_id" />
                @endunless
                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-1">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="college_id" :value="__('College')" />
                @unless ($isDisabled)
                    <x-text-input id="college_id" type="text" wire:model="college_id" name="college_id" class="@error('college_id') is-invalid @enderror w-full mt-1" :value="$college_id->college_name" required />
                @else
                    <x-text-input id="college_id" type="text" :value="optional($college_id)->college_name ?? ''" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="college_id" />
                @endunless
                <x-input-error :messages="$errors->get('college_id')" class="mt-2" />
            </div>
        </div>
    </x-slot>
</x-card-collapsible>

<x-card-collapsible heading="Bank Account Details">
    <x-slot name="content">

        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="account_no" :value="__('Account Number')" />
                @if ($isDisabled)
                    <x-text-input id="account_no" type="text" :value="$account_no" disabled class="bg-gray-100 cursor-not-allowed @error('account_no') is-invalid @enderror w-full mt-1" />
                @else
                    <x-text-input id="account_no" type="text" wire:model="account_no" name="account_no" class="@error('account_no') is-invalid @enderror w-full mt-1" :value="$account_no" required autofocus autocomplete="account_no" />
                @endif
                <x-input-error :messages="$errors->get('account_no')" class="mt-2" />
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="bank_address" :value="__('Bank Address')" />
                @if ($isDisabled)
                    <x-text-input id="bank_address" type="text" :value="$bank_address" disabled class="bg-gray-100 cursor-not-allowed @error('bank_address') is-invalid @enderror w-full mt-1" />
                @else
                    <x-text-input id="bank_address" type="text" wire:model="bank_address" name="bank_address" class="@error('bank_address') is-invalid @enderror w-full mt-1" :value="$bank_address" required autofocus autocomplete="bank_address" />
                @endif
                <x-input-error :messages="$errors->get('bank_address')" class="mt-2" />
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="bank_name" :value="__('Bank Name')" />
                @unless ($isDisabled)
                    <x-text-input id="bank_name" type="text" wire:model="bank_name" name="bank_name" class="@error('bank_name') is-invalid @enderror w-full mt-1" :value="$bank_name" required />
                @else
                    <x-text-input id="bank_name" type="text" :value="$bank_name" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="bank_name" />
                @endunless
                <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="branch_name" :value="__('Branch Name')" />
                @if ($isDisabled)
                    <x-text-input id="branch_name" type="text" :value="$branch_name" disabled class="bg-gray-100 cursor-not-allowed @error('branch_name') is-invalid @enderror w-full mt-1" />
                @else
                    <x-text-input id="branch_name" type="text" wire:model="branch_name" name="branch_name" class="@error('branch_name') is-invalid @enderror w-full mt-1" :value="$branch_name" required autofocus autocomplete="branch_name" />
                @endif
                <x-input-error :messages="$errors->get('branch_name')" class="mt-2" />
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="branch_code" :value="__('Branch Code')" />
                @if ($isDisabled)
                    <x-text-input id="branch_code" type="text" :value="$branch_code" disabled class="bg-gray-100 cursor-not-allowed @error('branch_code') is-invalid @enderror w-full mt-1" />
                @else
                    <x-text-input id="branch_code" type="text" wire:model="branch_code" name="branch_code" class="@error('branch_code') is-invalid @enderror w-full mt-1" :value="$branch_code" required autofocus autocomplete="branch_code" />
                @endif
                <x-input-error :messages="$errors->get('branch_code')" class="mt-2" />
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="ifsc_code" :value="__('IFSC Code')" />
                @if ($isDisabled)
                    <x-text-input id="ifsc_code" type="text" :value="$ifsc_code" disabled class="bg-gray-100 cursor-not-allowed @error('ifsc_code') is-invalid @enderror w-full mt-1" />
                @else
                    <x-text-input id="ifsc_code" type="text" wire:model="ifsc_code" name="ifsc_code" class="@error('ifsc_code') is-invalid @enderror w-full mt-1" :value="$ifsc_code" required autofocus autocomplete="ifsc_code" />
                @endif
                <x-input-error :messages="$errors->get('ifsc_code')" class="mt-2" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="micr_code" :value="__('MICR Code')" />
                @if ($isDisabled)
                    <x-text-input id="micr_code" type="text" :value="$micr_code" disabled class="bg-gray-100 cursor-not-allowed @error('micr_code') is-invalid @enderror w-full mt-1" />
                @else
                    <x-text-input id="micr_code" type="text" wire:model="micr_code" name="micr_code" class="@error('micr_code') is-invalid @enderror w-full mt-1" :value="$micr_code" required autofocus autocomplete="micr_code" />
                @endif
                <x-input-error :messages="$errors->get('micr_code')" class="mt-2" />
            </div>
            <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="account_type" :value="__('Account Type')" />
                @unless ($isDisabled)
                    <x-text-input id="account_type" type="text" wire:model="account_type" name="account_type" class="@error('account_type') is-invalid @enderror w-full mt-1" :value="$account_type" required />
                @else
                    <x-text-input id="account_type" type="text" :value="$account_type === 'S' ? 'SAVINGS' : ($account_type === 'C' ? 'CURRENT' : $account_type)" disabled class="bg-gray-100 cursor-not-allowed w-full mt-1" required autofocus autocomplete="account_type" />
                @endunless
                <x-input-error :messages="$errors->get('account_type')" class="mt-2" />
            </div>
        </div>
    </x-slot>
</x-card-collapsible>
