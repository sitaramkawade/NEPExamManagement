<div>
<section>
            <form wire:submit="member_id_form()">
              <div class="m-2 overflow-hidden bg-white border rounded  shadow dark:border-primary-darker dark:bg-darker ">
                <div class="px-2 py-2 font-semibold text-white dark:text-light bg-primary">
                  Student Information
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2">
                  <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
                    <x-input-label for="memid" :value="__('Student Member ID ( From I-Card Or Admission Receipt)')" />
                    <x-text-input  id="memid" type="number" wire:model.live="memid" name="memid" class="w-full mt-1"  :value="old('memid',$memid)" required autofocus autocomplete="memid" />
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
                      <span class="mx-2"> Submit</span>
                    </button>
                  @endif
                </div>
              </div>
            </form>
        </section>
</div>
