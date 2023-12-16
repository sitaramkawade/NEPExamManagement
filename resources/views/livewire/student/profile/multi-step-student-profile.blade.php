<div>



  
  <div>

      <div class="mx-auto max-w-7xl sm:px-6 lg:p-2">
            {{-- Member ID --}}
            @if ($current_step===1)
              <section>
                  <form wire:submit="member_id_form()">
                    <div class="m-2 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
                      <div class="px-2 py-2 font-semibold text-white dark:text-light bg-primary">
                        Student Information
                      </div>
                      <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                          <x-input-label for="memid" :value="__('Student Member ID (From I-card or Admission receipt)')" />
                          <x-text-input  id="memid" type="number" wire:model.live="memid" name="memid" class=" @error('memid') is-invalid @enderror w-full mt-1"  :value="old('memid',$memid)" required autofocus autocomplete="memid" />
                          <x-input-error :messages="$errors->get('memid')" class="mt-2" />
                            
                        </div>
                      </div>
                      <div class="h-20 p-2">
                        @if ($current_step!==1)
                          <button wire:click="back()" type="button"class=" float-start  text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-darker font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary dark:hover:bg-primary-dark dark:focus:ring-primary-darker">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953l7.108-4.062A1.125 1.125 0 0121 8.688v8.123zM11.25 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953L9.567 7.71a1.125 1.125 0 011.683.977v8.123z" />
                            </svg>
                            <span class="mx-2">Back</span>
                          </button>
                        @endif
                        @if ($current_step < $steps)
                          <button  type="submit" class=" float-right  text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-darker font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary dark:hover:bg-primary-dark dark:focus:ring-primary-darker">
                            <span class="mx-2"> Save & Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062A1.125 1.125 0 013 16.81V8.688zM12.75 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062a1.125 1.125 0 01-1.683-.977V8.688z" />
                            </svg>
                          </button>
                        @endif
                        @if ($current_step===$steps)
                          <button type="button" class=" float-right  text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-darker font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary dark:hover:bg-primary-dark dark:focus:ring-primary-darker">
                            <span class="mx-2"> Submite</span>
                          </button>
                        @endif
                      </div>
                    </div>
                  </form>
              </section>
            @endif
          {{-- Student Information --}}
          @if ($current_step===2)
            <section>
              <form wire:submit="student_information_form()">
                <div class="m-2 overflow-hidden bg-white border shadow dark:border-primary-darker dark:bg-darker rounded">
                  <div class="px-2 py-2 font-semibold text-white dark:text-light bg-primary">
                    Student Information
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="student_name" :value="__('Student Name ( Not Editable )')" />
                      <x-text-input  id="student_name" type="text" wire:model.live="student_name" name="student_name" disabled readonly class="disabled @error('student_name') is-invalid @enderror w-full mt-1"  :value="old('student_name',$student_name)" required autofocus autocomplete="student_name" />
                      <x-input-error :messages="$errors->get('student_name')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="email" :value="__('Student Email ( Not Editable )')" />
                      <x-text-input  id="email" type="email" wire:model.live="email" name="email" disabled readonly class="disabled @error('email') is-invalid @enderror w-full mt-1"  :value="old('email',$email)" required autofocus autocomplete="email" />
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="mobile_no" :value="__('Student Mobile Number ( Not Editable )')" />
                      <x-text-input  id="mobile_no" type="number" wire:model.live="mobile_no" name="mobile_no" disabled readonly  class="disabled @error('mobile_no') is-invalid @enderror w-full mt-1"  :value="old('mobile_no',$mobile_no)" required autofocus autocomplete="mobile_no" />
                      <x-input-error :messages="$errors->get('mobile_no')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="father_name" :value="__('Father / Husband Name')" />
                      <x-text-input  id="father_name" type="text" wire:model.live="father_name" name="father_name" class=" @error('father_name') is-invalid @enderror w-full mt-1"  :value="old('father_name',$father_name)" required autofocus autocomplete="father_name" />
                      <x-input-error :messages="$errors->get('father_name')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="mother_name" :value="__('Mother Name')" />
                      <x-text-input  id="mother_name" type="text" wire:model.live="mother_name" name="mother_name" class=" @error('mother_name') is-invalid @enderror w-full mt-1"  :value="old('mother_name',$mother_name)" required autofocus autocomplete="mother_name" />
                      <x-input-error :messages="$errors->get('mother_name')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="adharnumber" :value="__('Adhar Number')" />
                      <x-text-input  id="adharnumber" type="number" wire:model.live="adharnumber" name="adharnumber" class=" @error('adharnumber') is-invalid @enderror w-full mt-1"  :value="old('adharnumber',$adharnumber)" required autofocus autocomplete="adharnumber" />
                      <x-input-error :messages="$errors->get('adharnumber')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="date_of_birth" :value="__('Date Of Birth')" />
                      <x-text-input  id="date_of_birth" type="date" wire:model.live="date_of_birth" name="date_of_birth" class=" @error('date_of_birth') is-invalid @enderror w-full mt-1"  :value="old('date_of_birth',$date_of_birth)" required autofocus autocomplete="date_of_birth" />
                      <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="gender" :value="__('Gender')" />
                      <x-input-select id="gender" wire:model.live="gender" name="gender" class="text-center @error('gender') is-invalid @enderror w-full mt-1"  :value="old('gender',$gender)" required autofocus autocomplete="gender">
                        <x-select-option class="text-start" hidden> -- Select Gender -- </x-select-option>
                        @foreach ($genders as $gender)
                            <x-select-option wire:key="{{ $gender->id }}" value="{{ $gender->gender_shortform	 }}" class="text-start">{{$gender->gender }}</x-select-option>
                        @endforeach
                      </x-input-select>
                      <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="caste_category_id" :value="__('Cast Category')" />
                      <x-input-select id="caste_category_id" type="text" wire:model.live="caste_category_id" name="caste_category_id" class="text-center @error('caste_category_id') is-invalid @enderror w-full mt-1"  :value="old('caste_category_id',$caste_category_id)" required autofocus autocomplete="caste_category_id">
                        <x-select-option class="text-start" hidden> -- Select Cast Category -- </x-select-option>
                        @foreach ($cast_categories as $c_category)
                            <x-select-option wire:key="{{ $c_category->id }}" value="{{ $c_category->id }}" class="text-start">{{$c_category->caste_category }}</x-select-option>
                        @endforeach
                      </x-input-select>
                      <x-input-error :messages="$errors->get('caste_category_id')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="nationality" :value="__('Nationality')" />
                      <x-input-select id="nationality" wire:model.live="nationality" name="nationality" class="text-center @error('nationality') is-invalid @enderror w-full mt-1"  :value="old('nationality',$nationality)" required autofocus autocomplete="nationality">
                        <x-select-option class="text-start" hidden> -- Select Nationality-- </x-select-option>
                        <x-select-option class="text-start" value="Indian">Indian</x-select-option>
                        <x-select-option class="text-start" value="Other">Other</x-select-option>
                      </x-input-select>
                      <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="is_noncreamylayer" :value="__('Is Non Creamy Layer')" />
                      <x-input-select id="is_noncreamylayer"  wire:model.live="is_noncreamylayer" name="is_noncreamylayer" class="text-center @error('is_noncreamylayer') is-invalid @enderror w-full mt-1"  :value="old('is_noncreamylayer',$is_noncreamylayer)" required autofocus autocomplete="is_noncreamylayer">
                        <x-select-option class="text-start" hidden> -- Select -- </x-select-option>
                        <x-select-option class="text-start" value="1">Yes</x-select-option>
                        <x-select-option class="text-start" value="0">No</x-select-option>
                      </x-input-select>
                      <x-input-error :messages="$errors->get('is_noncreamylayer')" class="mt-2" />
                    </div>
                    <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                      <x-input-label for="is_handicap" :value="__('Is Handicapped')" />
                      <x-input-select id="is_handicap" wire:model.live="is_handicap" name="is_handicap" class="text-center @error('is_handicap') is-invalid @enderror w-full mt-1"  :value="old('is_handicap',$is_handicap)" required autofocus autocomplete="is_handicap">
                        <x-select-option class="text-start" hidden> -- Select -- </x-select-option>
                        <x-select-option class="text-start" value="1">Yes</x-select-option>
                        <x-select-option class="text-start" value="0">No</x-select-option>
                      </x-input-select>
                      <x-input-error :messages="$errors->get('is_handicap')" class="mt-2" />
                    </div>
                  </div>
                  <div class="h-20 p-2">
                    @if ($current_step!==1)
                      <button wire:click="back()" type="button"class=" float-start  text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-darker font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary dark:hover:bg-primary-dark dark:focus:ring-primary-darker">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953l7.108-4.062A1.125 1.125 0 0121 8.688v8.123zM11.25 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953L9.567 7.71a1.125 1.125 0 011.683.977v8.123z" />
                        </svg>
                        <span class="mx-2">Back</span>
                      </button>
                    @endif
                    @if ($current_step < $steps)
                      <button  type="submit" class=" float-right  text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-darker font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary dark:hover:bg-primary-dark dark:focus:ring-primary-darker">
                        <span class="mx-2"> Save & Next</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062A1.125 1.125 0 013 16.81V8.688zM12.75 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062a1.125 1.125 0 01-1.683-.977V8.688z" />
                        </svg>
                      </button>
                    @endif
                    @if ($current_step===$steps)
                      <button type="button" class=" float-right  text-white bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-primary-darker font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary dark:hover:bg-primary-dark dark:focus:ring-primary-darker">
                        <span class="mx-2"> Submite</span>
                      </button>
                    @endif
                  </div>
                </div>
              </form>
            </section>
            @endif
      {{-- Student Information --}}
          <section>
              <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">
                <div class="px-2 py-2 font-semibold text-white bg-gray-500">
                  Student Information
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2">
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="student_name" class="block text-sm font-medium text-gray-700"> Student Name</label>
                        <input type="text" name="student_name" id="student_name" style="background-color: rgb(197, 236, 252);" class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter name as per your marksheet" value="{{ Auth::guard("student")->user()->student_name }}" disabled />
                        @error("student_name")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="father_name" class="block text-sm font-medium text-gray-700">Father / Husband Name</label>
                        <input type="text" name="father_name" value=@if (isset($data)) "{{ $data->father_name }}" @else "{{ old("father_name") }}" @endif id="father_name" class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter Father / Husband Name " required />
                        @error("father_name")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="mother_name" class="block text-sm font-medium text-gray-700">
                            Mother Name ( e.g. Sunita )</label>
                        <input type="text" name="mother_name" @if (isset(Auth::guard("student")->user()->mother_name)) style="background-color: rgb(197, 236, 252);" value="{{ Auth::guard("student")->user()->mother_name }}" readonly @else value="{{ old("mother_name") }}" @endif id="mother_name" class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter Mother Name" required />
                        @error("mother_name")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email </label>
                        <input type="text" name="email" id="email" style="background-color: rgb(197, 236, 252);" class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter email" value="{{ Auth::guard("student")->user()->email }}" disabled />
                        @error("email")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                        <input type="text" name="mobile" id="mobile" style="background-color: rgb(197, 236, 252);" class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter Mobile Number" value="{{ Auth::guard("student")->user()->mobile_no }}" disabled />
                        @error("mobile")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender </label>
                        <select name="gender" id="gender" class="block w-full mt-1 rounded-md shadow-sm form-input" required>
                          <option value="">--Select--</option>
                          <option value="M" @if (isset($data)) @if ($data->gender == "M") selected @else {{ old("gender") == 1 ? "selected" : "" }} @endif @endif >Male</option>
                          <option value="F" @if (isset($data)) @if ($data->gender == "F") selected @else {{ old("gender") == 1 ? "selected" : "" }} @endif @endif >Female</option>
                        </select>
                        @error("gender")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="dob" id="dob" value= "" class="block w-full mt-1 rounded-md shadow-sm form-input" wire:model.defer="state.date_of_birth" required />
                        @error("dob")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                        <select name="nationality" id="nationality" class="block w-full mt-1 rounded-md shadow-sm form-input" required>
                          <option value="I" @if (isset($data)) @if ($data->nationality == "I") selected @else {{ old("nationality") == 1 ? "selected" : "" }} @endif @endif>Indian</option>
                          <option value="O" @if (isset($data)) @if ($data->nationality == "O") selected @else {{ old("nationality") == 1 ? "selected" : "" }} @endif @endif>Other</option>
                        </select>
                        @error("nationality")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="adharno" class="block text-sm font-medium text-gray-700">Adhar Number</label>
                        <input type="text" name="adharno" id="adharno" class="block w-full mt-1 rounded-md shadow-sm form-input" value="" placeholder="Enter your valid Adhar Number" required />
                        @error("adharno")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="category" class="block text-sm font-medium text-gray-700">Caste category</label>
                        <select name="category" id="category" class="block w-full mt-1 rounded-md shadow-sm form-input" required>
                          <option value="">--Select--</option>
                          <option value="1" @if (isset($data)) @if ($data->category == "1") selected @else {{ old("category") == 1 ? "selected" : "" }} @endif @endif >OPEN</option>
                          <option value="2" @if (isset($data)) @if ($data->category == "2") selected @else {{ old("category") == 2 ? "selected" : "" }} @endif @endif >OBC</option>
                          <option value="3" @if (isset($data)) @if ($data->category == "3") selected @else {{ old("category") == 3 ? "selected" : "" }} @endif @endif >SBC</option>
                          <option value="4" @if (isset($data)) @if ($data->category == "4") selected @else {{ old("category") == 4 ? "selected" : "" }} @endif @endif >NT</option>
                          <option value="5" @if (isset($data)) @if ($data->category == "5") selected @else {{ old("category") == 5 ? "selected" : "" }} @endif @endif >DT</option>
                          <option value="6" @if (isset($data)) @if ($data->category == "6") selected @else {{ old("category") == 6 ? "selected" : "" }} @endif @endif >SC</option>
                          <option value="7" @if (isset($data)) @if ($data->category == "7") selected @else {{ old("category") == 7 ? "selected" : "" }} @endif @endif >ST</option>
                          <option value="8" @if (isset($data)) @if ($data->category == "8") selected @else {{ old("category") == 8 ? "selected" : "" }} @endif @endif >OTHER</option>
                        </select>
                        @error("category")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="is_noncreamylayer" class="block text-sm font-medium text-gray-700">Is NonCreamy Layer</label>
                        <select name="is_noncreamylayer" id="is_noncreamylayer" class="block w-full mt-1 rounded-md shadow-sm form-input">
                          <option value="0" @if (isset($data)) @if ($data->is_noncreamylayer == "0") selected @else {{ old("is_noncreamylayer") == 0 ? "selected" : "" }} @endif @endif >NO</option>
                          <option value="1" @if (isset($data)) @if ($data->is_noncreamylayer == "1") selected @else {{ old("is_noncreamylayer") == 1 ? "selected" : "" }} @endif @endif >YES</option>
                        </select>
                        @error("is_noncreamylayer")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="p-6">
                    <div class="ml-12">
                      <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <label for="is_handicap" class="block text-sm font-medium text-gray-700">Is Handicapped</label>
                        <select name="is_handicap" id="is_handicap" class="block w-full mt-1 rounded-md shadow-sm form-input">
                          <option value="0" @if (isset($data)) @if ($data->is_handicap == "0") selected @else {{ old("is_handicap") == 0 ? "selected" : "" }} @endif @endif >NO</option>
                          <option value="1" @if (isset($data)) @if ($data->is_handicap == "1") selected @else {{ old("is_handicap") == 1 ? "selected" : "" }} @endif @endif >YES</option>
                        </select>
                        @error("is_handicap")
                          <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </section>

          {{-- Upload Photo & Sign --}}
          <section>
            <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">
                <div class="px-2 py-2 font-semibold text-white bg-gray-500"> Upload Photo & Sign </div>
                <div class="p-6">
                    <div class="ml-12">
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL($refs.photo.files[0]); " name='profile_photo_path' />
                            <div wire:loading wire:target="photo">Uploading...</div>
                            <label for="profile_photo_path" value="">{{ __("Photo") }} </label>
                            <!-- Current Profile Photo -->
                            @if (isset($data))
                            <div class="mt-2" x-show="! photoPreview">
                                <img src="{{ asset("public/storage/images/photo/" . $data->student->studentprofile->profile_photo_path) }}" class="object-cover w-20 h-20 rounded">
                            </div>
                            @endif
                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview">
                            <span class="block w-20 h-20 rounded" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                            photoPreview + '\');'">
                            </span>
                            </div>
                            <button> {{ __("Select A New Photo") }}</button>
                        </div>
                        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL($refs.photo.files[0]);  " name='sign_photo_path' />
                            <label for="">{{ __("Sign") }}</label>
                            <!-- Current Profile Photo -->
                            @if (isset($data))
                            <div class="mt-2" x-show="! photoPreview">
                                <img src="{{ asset("public/storage/images/sign/" . $data->student->studentprofile->profile_photo_path) }}" class="object-cover w-20 h-20 rounded">
                            </div>
                            @endif
                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview">
                            <span class="block w-20 h-10 rounded" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                            photoPreview + '\');'">
                            </span>
                            </div>
    
                            <button>   {{ __("Select A New Photo") }}</button>
                        </div>
                        </div>
                    </div>
                    </div>
              </div>
          </section>
         
{{-- 
          <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">

            <div class="px-2 py-2 font-semibold text-white bg-gray-500">
              Correspondence Address
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2">

              <div class="p-6">

                <div class="ml-12">

                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">

                    <label for="c_pincode" class="block text-sm font-medium text-gray-700">
                      Pincode</label>
                    <input type="text" name="c_pincode" id="c_pincode" class="block w-full mt-1 rounded-md shadow-sm form-input" value=@if (isset($data1)) "{{ $data1->c_pincode }}" @else "{{ old("c_pincode") }}" @endif placeholder="Enter PINCODE" required />
                    @error("c_pincode")
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

              </div>
              <div class="p-6">

                <div class="ml-12">
                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    <label for="c_state" class="block text-sm font-medium text-gray-700">
                      State</label>
                    <select name="c_state" id="c_state" class="block w-full mt-1 rounded-md shadow-sm form-input" required>

                      <option value="1" @if (isset($data1)) @if ($data1->c_state == "1") selected @endif @endif>Maharashtra</option>
                      <option value="0" @if (isset($data1)) @if ($data1->c_state == "0") selected @endif @endif>Other</option>

                    </select>
                    @error("c_state")
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

              </div>
              <div class="p-6">

                <div class="ml-12">
                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    <label for="c_district" class="block text-sm font-medium text-gray-700">
                      District</label>
                    <input type="text" name="c_district" id="c_district" class="block w-full mt-1 rounded-md shadow-sm form-input" value=@if (isset($data1)) "{{ $data1->c_district }}" @else "{{ old("c_district") }}" @endif placeholder="Enter District name" required />
                    @error("c_district")
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

              </div>

              <div class="p-6">

                <div class="ml-12">
                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    <label for="c_taluka" class="block text-sm font-medium text-gray-700">
                      Taluka</label>
                    <input type="text" name="c_taluka" id="c_taluka" class="block w-full mt-1 rounded-md shadow-sm form-input" value=@if (isset($data1)) "{{ $data1->c_taluka }}" @else"{{ old("c_taluka") }}" @endif placeholder="Enter Taluka name" required />
                    @error("c_taluka")
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

              </div>
              <div class="p-6">

                <div class="ml-12">
                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    <label for="c_village_name" class="block text-sm font-medium text-gray-700">
                      Village/City Name</label>
                    <input type="text" name="c_village_name" id="c_village_name" class="block w-full mt-1 rounded-md shadow-sm form-input" @if (isset($data1)) value="{{ $data1->c_village_name }}" @else  value="{{ old("c_village_name") }}" @endif placeholder="Enter Village/City name" required />
                    @error("c_village_name")
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

              </div>

              <div class="p-6">

                <div class="ml-12">
                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    <label for="c_address" class="block text-sm font-medium text-gray-700">Address</label>

                    <textarea rows="3" cols="50" name="c_address" id="c_address" class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter Address" required /> @if (isset($data1)) {{ $data1->c_address }}
@if() @else
{{ old("c_address") }} @endif
        </textarea>

                    @error("c_address")
                      <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

              </div>

              <div class="p-6">

                <div class="ml-12">
                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">

                    <input type="checkbox" name="present" @if (isset($data1)) checked @endif onclick="permanent(this.form)" /> Is permanent address
                    is same
                    as Correspondence address
                  </div>
                </div>
              </div>

            </div>
            <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">

              <div class="px-2 py-2 font-semibold text-white bg-gray-500">
                Permanent Address
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">

                  <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                      <label for="pincode" class="block text-sm font-medium text-gray-700">
                        Pincode</label>
                      <input type="text" name="pincode" id="pincode" maxlength="6" value=@if (isset($data1)) "{{ $data1->pincode }}" @else "{{ old("pincode") }}" @endif class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter Pincode" required />
                      @error("pincode")
                        <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                </div>
                <div class="p-6">

                  <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                      <label for="state" class="block text-sm font-medium text-gray-700">
                        State </label>
                      <select name="state" id="state" class="block w-full mt-1 rounded-md shadow-sm form-input" required>

                        <option value="1" @if (isset($data1)) @if ($data1->state == "1") selected @endif @endif >Maharashtra</option>
                        <option value="0" @if (isset($data1)) @if ($data1->state == "0") selected @endif @endif>Other</option>

                      </select>
                      @error("state")
                        <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                </div>
                <div class="p-6">

                  <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                      <label for="district" class="block text-sm font-medium text-gray-700">
                        District</label>
                      <input type="text" name="district" id="district" @if (isset($data1)) value="{{ $data1->district }}" @else  value="{{ old("district") }}" @endif class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter District" required />
                      @error("district")
                        <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                </div>

                <div class="p-6">

                  <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                      <label for="taluka" class="block text-sm font-medium text-gray-700">
                        Taluka</label>
                      <input type="text" name="taluka" id="taluka" value=@if (isset($data1)) "{{ $data1->taluka }}" @else "{{ old("taluka") }}" @endif class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter Taluka" required />
                      @error("taluka")
                        <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                </div>
                <div class="p-6">

                  <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                      <label for="village_name" class="block text-sm font-medium text-gray-700">
                        Village/City Name</label>
                      <input type="text" name="village_name" id="village_name" value=@if (isset($data1)) "{{ $data1->village_name }}" @else "{{ old("village_name") }}" @endif class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter Village/City Name" required />
                      @error("village_name")
                        <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                </div>
                <!--  <div class="p-6">
            
                                    <div class="ml-12">
                                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                            <label for="locality_name" class="block text-sm font-medium text-gray-700">
                                                Locality Name</label>
                                            <input type="text" name="locality_name" id="locality_name"
                                                class="block w-full mt-1 rounded-md shadow-sm form-input"
                                                placeholder="Enter Locality Name" />
                                            @error("locality_name")
    <p class="text-sm text-red-600">{{ $message }}</p>
  @enderror
                                        </div>
                                    </div>
            
            
                                </div>  -->
                <div class="p-6">

                  <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                      <label for="address" class="block text-sm font-medium text-gray-700">
                        Address</label>
                      <textarea rows="3" cols="50" name="address" id="address" class="block w-full mt-1 rounded-md shadow-sm form-input" placeholder="Enter Address" required /> @if (isset($data1)) {{ $data1->address }}
@else
{{ old("address") }} @endif </textarea>
                      @error("address")
                        <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                </div>

              </div>

            </div>
            <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">

              <div class="my-2">

                <div class="py-1 mt-2 mr-2 text-sm text-right text-gray-600 dark:text-gray-400">
                  <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md focus:shadow-outline-gray hover:bg-gray-700 focus:border-gray-900 focus:outline-none active:bg-gray-900 disabled:opacity-25">
                    Save
                  </button>
                  <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md focus:shadow-outline-gray hover:bg-gray-700 focus:border-gray-900 focus:outline-none active:bg-gray-900 disabled:opacity-25">
                    Cancel
                  </button>

                </div>

              </div>
            </div>
        </form>
      </div>
      <script language="JavaScript">
        function permanent(p) {
          if (p.present.checked == true) {
            p.pincode.value = p.c_pincode.value;
            p.state.value = p.c_state.value;
            p.district.value = p.c_district.value;
            p.taluka.value = p.c_taluka.value;
            p.village_name.value = p.c_village_name.value;

            document.getElementById('address').value = document.getElementById('c_address').value; //p.c_address.value;
          } else {
            p.pincode.value = "";
            document.getElementById(
              "state").selectedIndex = "0";

            p.district.value = "";
            p.taluka.value = "";
            p.village_name.value = "";
            p.locality_name.value = "";
            p.address.value = "";
          }
        }
      </script>

    </x-studapp-layout> --}}

  </div>
  
  {{-- Profile Status Bar --}}
  {{-- <section>
    <div class="p-2">
      <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm rtl:space-x-reverse dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 sm:space-x-4 sm:p-4 sm:text-base">
        <li class="flex items-center text-blue-600 dark:text-blue-500">
          <span class="flex items-center justify-center w-5 h-5 text-xs border border-blue-600 rounded-full me-2 shrink-0 dark:border-blue-500">
            1
          </span>
          Personal <span class="hidden sm:ms-2 sm:inline-flex">Info</span>
          <svg class="w-3 h-3 ms-2 rtl:rotate-180 sm:ms-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
          </svg>
        </li>
        <li class="flex items-center">
          <span class="flex items-center justify-center w-5 h-5 text-xs border border-gray-500 rounded-full me-2 shrink-0 dark:border-gray-400">
            2
          </span>
          Educational <span class="hidden sm:ms-2 sm:inline-flex">Info</span>
          <svg class="w-3 h-3 ms-2 rtl:rotate-180 sm:ms-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
          </svg>
        </li>
        <li class="flex items-center">
          <span class="flex items-center justify-center w-5 h-5 text-xs border border-gray-500 rounded-full me-2 shrink-0 dark:border-gray-400">
            3
          </span>
          Exam Form
        </li>
      </ol>
    </div>
  </section> --}}

  {{-- Profile --}}
  {{-- <section>
    @if($current_step===1)
      <form wire:submit="step_1()">
        <label for="prn">PRN</label>
        <input id="prn" wire:model="prn" type="text">
        <input  class="bg-green-500" type="submit" value="Save And Next">
      </form>
    @endif

    @if($current_step===2)
      <form wire:submit="step_2()">
        <label for="abcid">ABC ID</label>
        <input id="abcid" wire:model="abcid" type="text">
        <input  class="bg-green-500"type="submit" value="Save And Next">
        <button class="bg-blue-500" wire:click="back()" value="Back">Back</button>
      </form>
    @endif

    @if($current_step===3)
      <form wire:submit="step_3()">
        <label for="aadhar_card_no">Aadhar Card No</label>
        <input id="aadhar_card_no" wire:model="aadhar_card_no" type="text">
        <input  class="bg-green-500"type="submit" value="Save And Next">
        <button class="bg-blue-500" wire:click="back()" value="Back">Back</button>
      </form>
    @endif

    @if($current_step===4)
      <form wire:submit="step_4()">
        <label for="mother_name">Mother Name</label>
        <input id="mother_name" wire:model="mother_name" type="text">
        <input class="bg-green-500"type="submit" value="Submit">
        <button class="bg-blue-500" wire:click="back()" value="Back">Back</button>
      </form>
    @endif
    @if($current_step===5)
      <h1>Your changes recored Permanantly</h1>
    @endif
  </section> --}}
 

</div>
