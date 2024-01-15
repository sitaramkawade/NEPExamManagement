<x-card-collapsible heading="Personal Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="col-span-2">
            <div class="grid grid-cols-1 md:grid-cols-2">
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
                    <x-input-label for="date_of_birth" :value="__('Date of birth')" />
                    <x-text-input id="date_of_birth" type="date" wire:model="date_of_birth" name="date_of_birth" class="@error('date_of_birth') is-invalid @enderror w-full mt-1" :value="old('date_of_birth', $date_of_birth)" required autofocus autocomplete="date_of_birth" />
                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                </div>
                <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="gender" :value="__('Gender')" />
                    <x-input-select id="gender" wire:model.live="gender" name="gender" class="text-center @error('gender') is-invalid @enderror w-full mt-1" :value="old('gender', $gender)" required autofocus autocomplete="gender">
                        <x-select-option class="text-start" hidden> -- Select Gender -- </x-select-option>
                        @foreach ($genders as $gender)
                            <x-select-option wire:key="{{ $gender->id }}" value="{{ $gender->gender_shortform }}" class="text-start">{{ $gender->gender }}</x-select-option>
                        @endforeach
                    </x-input-select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
                <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="pan" :value="__('PAN')" />
                    <x-text-input id="pan" type="text" wire:model="pan" class="@error('pan') is-invalid @enderror w-full mt-1" :value="old('pan', $pan)" required autofocus autocomplete="pan" />
                    <x-input-error :messages="$errors->get('pan')" class="mt-2" />
                </div>
                <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="category" :value="__('Category')" />
                    <x-input-select id="category" wire:model.live="category" name="category" class="text-center @error('category') is-invalid @enderror w-full mt-1" :value="old('category', $category)" required autofocus autocomplete="category">
                        <x-select-option class="text-start" hidden> -- Select Category -- </x-select-option>
                        @foreach ($cast_categories as $category)
                            <x-select-option wire:key="{{ $category->id }}" value="{{ $category->caste_category }}" class="text-start">{{ $category->caste_category }}</x-select-option>
                        @endforeach
                    </x-input-select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
            </div>
        </div>

        <div>
            <div class="m-5 col-span-1 rounded-md bg-white dark:bg-darker dark:border-primary-darker border">
                <div class="flex items-center justify-between border-b p-2 dark:border-primary">
                    <h4 class="text-sm font-semibold text-gray-500 dark:text-light">Upload Profile Photo</h4>
                </div>
                <div class="relative h-auto p-2">
                    <div class=" text-sm text-gray-600 dark:text-gray-400 ">
                        <div class="flex flex-col items-center mx-auto space-x-6  ">
                            <div class="shrink-0 p-2">
                                @if ($profile_photo_path)
                                    <img style="width: 135px; height: 150px;" class="object-center object-fill  " src="{{ isset($profile_photo_path) ? $profile_photo_path->temporaryUrl() : asset('img/no-img.png') }}" alt="Current profile photo" />
                                @else
                                    <img style="width: 135px; height: 150px;" class="object-center object-fill "src="{{ isset($profile_photo_path_old) ? asset($profile_photo_path_old) : asset('img/no-img.png') }}" alt="Current profile photo" />
                                @endif
                            </div>
                            <label class="block p-2">
                                <span class="sr-only">Choose profile photo</span>
                                <x-text-input id="profile_photo_path" wire:model.live="profile_photo_path" name="profile_photo_path" accept="image/png, image/jpeg , image/jpg" :value="old('profile_photo_path', $profile_photo_path)" autocomplete="profile_photo_path" type="file" class="block w-full text-sm dark:text-slate-500 text-black file:mr-4 file:py-2 file:px-4  border file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-darker" />
                                <x-input-error :messages="$errors->get('profile_photo_path')" class="mt-2" />
                            </label>
                            <x-input-label wire:loading.remove wire:target="profile_photo_path" class="py-2" for="profile_photo_path" :value="__('Hint : 250KB , png , jpeg , jpg')" />
                            <x-input-label wire:loading wire:target="profile_photo_path" class="py-2" for="profile_photo_path" :value="__('Uploading...')" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="current_address" :value="__('Current Address')" />
            <x-textarea id="current_address" type="text" wire:model="current_address" class="@error('current_address') is-invalid @enderror w-full mt-1" :value="old('current_address', $current_address)" required autofocus autocomplete="current_address"></x-textarea>
            <x-input-error :messages="$errors->get('current_address')" class="mt-2" />
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="permanant_address" :value="__('Permanant Address')" />
            <x-textarea id="permanant_address" wire:model="permanant_address" type="text" class="@error('permanant_address') is-invalid @enderror w-full mt-1" :value="old('permanant_address', $permanant_address)" required autofocus autocomplete="permanant_address"></x-textarea>
            <x-input-error :messages="$errors->get('permanant_address')" class="mt-2" />
        </div>
    </div>
</x-card-collapsible>


<x-card-collapsible heading="Working Details">
    <div class="grid grid-cols-1 md:grid-cols-3">
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
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="qualification" :value="__('Qualification')" />
            <x-text-input id="qualification" type="text" wire:model="qualification" class="@error('qualification') is-invalid @enderror w-full mt-1" :value="old('qualification', $qualification)" required autofocus autocomplete="qualification" />
            <x-input-error :messages="$errors->get('qualification')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="unipune_id" :value="__('Unipune ID')" />
            <x-text-input id="unipune_id" type="text" wire:model="unipune_id" class="@error('unipune_id') is-invalid @enderror w-full mt-1" :value="old('unipune_id', $unipune_id)" required autofocus autocomplete="unipune_id" />
            <x-input-error :messages="$errors->get('unipune_id')" class="mt-2" />
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1">
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="college_id" :value="__('College')" />
            <x-input-select id="college_id" wire:model.live="college_id" name="college_id" class="text-center @error('college_id') is-invalid @enderror w-full mt-1" :value="old('college_id', $college_id)" required autofocus autocomplete="college_id">
                <x-select-option class="text-start" hidden> -- Select College -- </x-select-option>
                @foreach ($colleges as $college)
                    <x-select-option wire:key="{{ $college->id }}" value="{{ $college->id }}" class="text-start">{{ $college->college_name }}</x-select-option>
                @endforeach
            </x-input-select>
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
    <x-form-btn>Submit</x-form-btn>
</x-card-collapsible>
