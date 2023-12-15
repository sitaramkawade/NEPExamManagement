<div>
    <div>
        <form wire:submit="add()">

        <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
            <div class="container mx-auto p-4">
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                    <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Faculty Registration</h1>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">Fill all the required details</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-1 gap-4 mb-4">
                            <div class="input-group">
                                <x-input-label class="form-label">Prefix</x-input-label>
                                <x-input-select id="prefix" wire:model.live="prefix" class="border p-2 rounded w-full">
                                    <x-select-option hidden>Select Prefix</x-select-option>
                                    @foreach ($prefixes as $prefix)
                                        <option wire:key="{{ $prefix->id }}" value="{{ $prefix->prefix_shortform }}">{{ $prefix->prefix_shortform }}-{{ $prefix->prefix }}</option>
                                    @endforeach
                                </x-input-select>
                                @error('prefix')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <x-input-label class="form-label">Faculty Name</x-input-label>
                                <x-text-input type="text" wire:model.live="faculty_name" placeholder="Faculty Name" class="border p-2 rounded w-full" />
                                @error('faculty_name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <x-input-label class="form-label">Email</x-input-label>
                                <x-text-input input type="email" wire:model.live="email" placeholder="Email Address" class="border p-2 rounded w-full" />
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div class="input-group">
                                <x-input-label class="form-label">Mobile Number</x-input-label>
                                <x-text-input type="text" wire:model.live="mobile_no" placeholder="Mobile Number" class="border p-2 rounded w-full" />
                                @error('mobile_no')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <x-input-label class="form-label">Select Department</x-input-label>
                                <x-input-select wire:model.live="department_id" class="border p-2 rounded w-full">
                                    <x-select-option hidden>Select Department</x-select-option>
                                    @foreach ($departments as $department)
                                        <option wire:key="{{ $department->id }}" value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                    @endforeach
                                </x-input-select>
                                @error('department_id')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <x-input-label class="form-label">Select Role</x-input-label>
                                <x-input-select wire:model.live="role_id" class="border p-2 rounded w-full">
                                    @foreach ($roles as $roles)
                                        <x-select-option hidden>Select Role</x-select-option>
                                        <option wire:key="{{ $roles->id }}" value="{{ $roles->id }}">{{ $roles->roletype_name }}
                                        </option>
                                    @endforeach
                                </x-input-select>
                                @error('role_id')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4">
                            <div class="input-group">
                                <x-input-label class="form-label">Select College</x-input-label>
                                <x-input-select wire:model.live="college_id" class="border p-2 rounded w-full">
                                    <x-select-option hidden>Select College</x-select-option>
                                    @foreach ($colleges as $college)
                                        <option wire:key="{{ $college->id }}" value="{{ $college->id }}">{{ $college->college_name }}</option>
                                    @endforeach
                                </x-input-select>
                                @error('college_id')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div class="input-group">
                                <x-input-label class="form-label">Active</x-input-label>
                                <x-text-input type="text" wire:model.live="active" placeholder="status" class="border p-2 rounded w-full" />
                                @error('active')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <x-input-label class="form-label">faculty verified</x-input-label>
                                <x-text-input type="text" wire:model.live="faculty_verified" placeholder="faculty_verified" class="border p-2 rounded w-full" />
                                @error('faculty_verified')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
            <div class="container mx-auto p-4">
                <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                    <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Account Details</h1>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">Fill all the required details</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-1 gap-4 mb-4">
                        <div class="input-group">
                            <x-input-label class="form-label">Account Number</x-input-label>
                            <x-text-input type="text" wire:model.live="account_no" placeholder="Account Number" class="border p-2 rounded w-full" />
                            @error('account_no')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">Bank Address</x-input-label>
                            <x-text-input type="text" wire:model.live="bank_address" placeholder="Bank Address" class="border p-2 rounded w-full" />
                            @error('bank_address')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">Bank Name</x-input-label>
                            <x-input-select wire:model.live="bank_name" class="border p-2 rounded w-full">
                                <x-select-option hidden>Select Bank</x-select-option>
                                @foreach ($banknames as $bankname)
                                    <option wire:key="{{ $bankname->id }}" value="{{ $bankname->bank_name }}">{{ $bankname->bank_name }}</option>
                                @endforeach
                            </x-input-select>
                            @error('bank_name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-1 gap-4 mb-4">
                        <div class="input-group">
                            <x-input-label class="form-label">Branch Name</x-input-label>
                            <x-text-input type="text" wire:model.live="branch_name" placeholder="Branch Name" class="border p-2 rounded w-full" />
                            @error('branch_name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">Branch Code</x-input-label>
                            <x-text-input input type="text" wire:model.live="branch_code" placeholder="Branch Code" class="border p-2 rounded w-full" />
                            @error('branch_code')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">IFSC Code</x-input-label>
                            <x-text-input type="text" wire:model.live="ifsc_code" placeholder="IFSC Code" class="border p-2 rounded w-full" />
                            @error('ifsc_code')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-1 gap-4 mb-4">
                        <div class="input-group">
                            <x-input-label class="form-label">MICR Code</x-input-label>
                            <x-text-input type="text" wire:model.live="micr_code" placeholder="MICR Code" class="border p-2 rounded w-full" />
                            @error('micr_code')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">Account Type</x-input-label>
                            <x-input-select wire:model.live="account_type" class="border p-2 rounded w-full">
                                <x-select-option hidden>Select Account Type</x-select-option>
                                <option value="C">CURRENT</option>
                                <option value="S">SAVINGS</option>
                            </x-input-select>
                            @error('account_type')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">Account Verified</x-input-label>
                            <x-text-input type="text" wire:model.live="acc_verified" placeholder="Account Verified" class="border p-2 rounded w-full" />
                            @error('acc_verified')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <x-primary-button type="submit" id="theme-toggle" class="px-4 py-2 rounded text-white">
                        Submit
                    </x-primary-button>
                </div>
            </div>
        </div>
    </form>

    </div>
</div>
