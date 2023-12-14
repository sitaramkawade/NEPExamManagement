<div>
    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div>{{ session('error') }}</div>
    @endif

    <div class="bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto p-4">
            <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
                <h1 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Faculty Registration</h1>
                <p class="text-gray-600 dark:text-gray-300 mb-6">Fill all the required details</p>
                <form wire:submit="add()">
                    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-1 gap-4 mb-4">
                        <div class="input-group">
                            <x-input-label class="form-label">Prefix</x-input-label>
                            <x-input-select wire:model.live="prefix" class="border p-2 rounded w-full">
                                <x-select-option hidden>Select Prefix</x-select-option>
                                @foreach ($prefixes as $p)
                                    <option value={{ $p->id }}>{{ $p->prefix_shortform }}</option>
                                @endforeach
                            </x-input-select>
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">Faculty Name</x-input-label>
                            <x-text-input type="text" wire:model="faculty_name" placeholder="Faculty Name" class="border p-2 rounded w-full" />
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">Email</x-input-label>
                            <x-text-input input type="email" wire:model="email" placeholder="Email Address" class="border p-2 rounded w-full" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div class="input-group">
                            <x-input-label class="form-label">Mobile Number</x-input-label>
                            <x-text-input type="text" wire:model="mobile_no" placeholder="Mobile Number" class="border p-2 rounded w-full" />
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">Select Department</x-input-label>
                            <x-input-select wire:model.change="department_id" class="border p-2 rounded w-full">
                                <x-select-option hidden>Select Department</x-select-option>
                                @foreach ($departments as $dept)
                                    <option wire:key='{{ $dept->id }}' value={{ $dept->id }}>
                                        {{ $dept->dept_name }}</option>
                                @endforeach
                            </x-input-select>
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">Select Role</x-input-label>
                            <x-input-select wire:model.change="role_id" class="border p-2 rounded w-full">
                                @foreach ($roles as $r)
                                    <x-select-option hidden>Select Role</x-select-option>
                                    <option wire:key='{{ $r->id }}' value={{ $r->id }}>{{ $r->roletype_name }}
                                    </option>
                                @endforeach
                            </x-input-select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4">
                        <div class="input-group">
                            <x-input-label class="form-label">Select College</x-input-label>
                            <x-input-select wire:model.change="college_id" class="border p-2 rounded w-full">
                                <x-select-option hidden>Select College</x-select-option>
                                @foreach ($colleges as $clg)
                                    <option wire:key='{{ $clg->id }}' value={{ $clg->id }}>
                                        {{ $clg->college_name }}</option>
                                @endforeach
                            </x-input-select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="input-group">
                            <x-input-label class="form-label">Status</x-input-label>
                            <x-text-input type="text" wire:model="active" placeholder="status" class="border p-2 rounded w-full" />
                        </div>
                        <div class="input-group">
                            <x-input-label class="form-label">faculty verified</x-input-label>
                            <x-text-input type="text" wire:model="faculty_verifed" placeholder="faculty_verified" class="border p-2 rounded w-full" />
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
                        <x-text-input type="text" wire:model="account_no" placeholder="Account Number" class="border p-2 rounded w-full" />

                    </div>
                    <div class="input-group">
                        <x-input-label class="form-label">Bank Address</x-input-label>
                        <x-text-input type="text" wire:model="bank_address" placeholder="Bank Address" class="border p-2 rounded w-full" />
                    </div>
                    <div class="input-group">
                        <x-input-label class="form-label">Bank Name</x-input-label>
                        <x-input-select wire:model.change="bank_name" class="border p-2 rounded w-full">
                            <x-select-option hidden>Select Bank</x-select-option>
                            @foreach ($banknames as $bank)
                                <option wire:key='{{ $bank->id }}' value={{ $bank->id }}>
                                    {{ $bank->bank_name }}</option>
                            @endforeach
                        </x-input-select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-1 gap-4 mb-4">
                    <div class="input-group">
                        <x-input-label class="form-label">Branch Name</x-input-label>
                        <x-text-input type="text" wire:model="branch_name" placeholder="Branch Name" class="border p-2 rounded w-full" />

                    </div>
                    <div class="input-group">
                        <x-input-label class="form-label">Branch Code</x-input-label>
                        <x-text-input input type="text" wire:model="branch_code" placeholder="Branch Code" class="border p-2 rounded w-full" />
                    </div>
                    <div class="input-group">
                        <x-input-label class="form-label">IFSC Code</x-input-label>
                        <x-text-input type="text" wire:model="ifsc_code" placeholder="IFSC Code" class="border p-2 rounded w-full" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-1 gap-4 mb-4">
                    <div class="input-group">
                        <x-input-label class="form-label">MICR Code</x-input-label>
                        <x-text-input type="text" wire:model="micr_code" placeholder="MICR Code" class="border p-2 rounded w-full" />
                    </div>
                    <div class="input-group">
                        <x-input-label class="form-label">Account Type</x-input-label>
                        <x-input-select wire:model.live="prefix" class="border p-2 rounded w-full">
                            <x-select-option hidden>Select Account Type</x-select-option>
                            <option value='C'>CURRENT</option>
                            <option value='S'>SAVINGS</option>
                        </x-input-select>
                    </div>
                    <div class="input-group">
                        <x-input-label class="form-label">Account Verified</x-input-label>
                        <x-text-input type="text" wire:model="acc_verified" placeholder="Account Verified" class="border p-2 rounded w-full" />
                    </div>
                </div>
                <x-primary-button type="submit" id="theme-toggle" class="px-4 py-2 rounded text-white">
                    Submit
                </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
