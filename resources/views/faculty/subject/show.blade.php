<x-faculty-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subject Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="py-2   align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="m-10 shadow-md rounded-lg px-3 py-4 overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="block mb-8">
                                <a href="{{ route('admin.subject.showsubject') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Back </a>
                            </div>

                            <div class="flex  bg-white">
                                <div class="w-1/2 border-r-2 border-gray-250">
                                    <div class="p-2">
                                        <div class="ml-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                                <x-input-label for="name" :value="__('*** Personal Details ***')" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-2">
                                        <div class="ml-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Name of the Faculty : {{$faculty->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                E-mail :{{$faculty->email}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Mobile No : {{$faculty->mobile_no}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                University ID : {{$faculty->unipune_id}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Qualification : {{$faculty->qualification}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Role : {{$faculty->role->role_name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Department : {{$faculty->department->dept_name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                College : {{$faculty->college->college_name}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <div class="p-2">
                                        <div class="ml-1 mr-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                                <x-input-label for="name" :value="__('*** Bank Details ***')" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-2">
                                        <div class="ml-1 mr-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Account Number : {{$faculty->facultybankaccount->account_no}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-1 mr-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Bank Address : {{$faculty->facultybankaccount->bank_address}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-1 mr-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Bank Name : {{$faculty->facultybankaccount->bank_name}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-1 mr-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Branch Name : {{$faculty->facultybankaccount->branch_name}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-1 mr-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Branch Code : {{$faculty->facultybankaccount->branch_code}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-1 mr-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                Account Type : {{$faculty->facultybankaccount->account_type=='S'?"Saving Account":"Current Account"}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-1 mr-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                IFSC Code : {{$faculty->facultybankaccount->ifsc_code}}</div>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="ml-1 mr-6">
                                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                                MICR Code : {{$faculty->facultybankaccount->micr_code}}</div>
                                        </div>
                                    </div>

                                    <div class=" mx-5 py-2 text-center rounded-lg  {{$faculty->active!=1? 'bg-red-600 text-white':'bg-green-500'}} text-2xl  font-semibold"> Status :{{$faculty->active==1?"Active":"Inactive"}}</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-faculty-layout>