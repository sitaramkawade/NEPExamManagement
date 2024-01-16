<x-card-collapsible heading="Faculty Registration">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="prefix" :value="__('Prefix')" />
            @if ($isDisabled)
                <x-text-input id="prefix" type="text" :value="$prefix" disabled class="bg-gray-100 cursor-not-allowed @error('prefix') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('prefix')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="faculty_name" :value="__('Faculty Name')" />
            @if ($isDisabled)
                <x-text-input id="faculty_name" type="text" :value="$faculty_name" disabled class="bg-gray-100 cursor-not-allowed @error('faculty_name') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('faculty_name')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="email" :value="__('Email')" />
            @if ($isDisabled)
                <x-text-input id="email" type="text" wire:model="email" name="email" disabled class="bg-gray-100 cursor-not-allowed @error('email') is-invalid @enderror w-full mt-1" :value="$email" required />
            @endif
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="mobile_no" :value="__('Mobile Number')" />
            @if ($isDisabled)
                <x-text-input id="mobile_no" type="number" wire:model="mobile_no" name="mobile_no" disabled class="bg-gray-100 cursor-not-allowed @error('mobile_no') is-invalid @enderror w-full mt-1" :value="$mobile_no" required />
            @endif
            <x-input-error :messages="$errors->get('mobile_no')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="department_id" :value="__('Department')" />
            @if ($isDisabled)
                <x-text-input id="department_id" type="number" wire:model="department_id" name="department_id->dept_name" disabled class="bg-gray-100 cursor-not-allowed @error('department_id')is-invalid @enderror w-full mt-1" :value="$department_id" required />
            @endif
            <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
        </div>

        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="role_id" :value="__('Role')" />
            @if ($isDisabled)
                <x-text-input id="role_id" type="number" wire:model="role_id" name="role_id" disabled class="bg-gray-100 cursor-not-allowed @error('role_id')is-invalid @enderror w-full mt-1" :value="$role_id" required />
            @endif
            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="college_id" :value="__('College')" />
            @if ($isDisabled)
                <x-text-input id="college_id" type="number" wire:model="college_id" name="college_id" disabled class="bg-gray-100 cursor-not-allowed @error('role_id')is-invalid @enderror w-full mt-1" :value="$role_id" required />
            @endif
            <x-input-error :messages="$errors->get('college_id')" class="mt-2" />
        </div>
    </div>
</x-card-collapsible>

<x-card-collapsible heading="Bank Account Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="account_no" :value="__('Account Number')" />
            @if ($isDisabled)
                <x-text-input id="account_no" type="text" :value="$account_no" disabled class="bg-gray-100 cursor-not-allowed @error('account_no') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('account_no')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="bank_address" :value="__('Bank Address')" />
            @if ($isDisabled)
                <x-text-input id="bank_address" type="text" :value="$bank_address" disabled class="bg-gray-100 cursor-not-allowed @error('bank_address') is-invalid @enderror w-full mt-1" />
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
            @endif
            <x-input-error :messages="$errors->get('branch_name')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="branch_code" :value="__('Branch Code')" />
            @if ($isDisabled)
                <x-text-input id="branch_code" type="text" :value="$branch_code" disabled class="bg-gray-100 cursor-not-allowed @error('branch_code') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('branch_code')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="ifsc_code" :value="__('IFSC Code')" />
            @if ($isDisabled)
                <x-text-input id="ifsc_code" type="text" :value="$ifsc_code" disabled class="bg-gray-100 cursor-not-allowed @error('ifsc_code') is-invalid @enderror w-full mt-1" />
            @endif
            <x-input-error :messages="$errors->get('ifsc_code')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="micr_code" :value="__('MICR Code')" />
            @if ($isDisabled)
                <x-text-input id="micr_code" type="text" :value="$micr_code" disabled class="bg-gray-100 cursor-not-allowed @error('micr_code') is-invalid @enderror w-full mt-1" />
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
</x-card-collapsible>
