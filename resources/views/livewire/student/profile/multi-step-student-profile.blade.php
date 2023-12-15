<div>
  {{-- Profile Status Bar --}}
  <section>
    <div class="p-2">
      <ol class="flex w-full items-center space-x-2 rounded-lg border border-gray-200 bg-white p-3 text-center text-sm font-medium text-gray-500 shadow-sm rtl:space-x-reverse dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 sm:space-x-4 sm:p-4 sm:text-base">
        <li class="flex items-center text-blue-600 dark:text-blue-500">
          <span class="me-2 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-blue-600 text-xs dark:border-blue-500">
            1
          </span>
          Personal <span class="hidden sm:ms-2 sm:inline-flex">Info</span>
          <svg class="ms-2 h-3 w-3 rtl:rotate-180 sm:ms-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
          </svg>
        </li>
        <li class="flex items-center">
          <span class="me-2 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-gray-500 text-xs dark:border-gray-400">
            2
          </span>
          Educational <span class="hidden sm:ms-2 sm:inline-flex">Info</span>
          <svg class="ms-2 h-3 w-3 rtl:rotate-180 sm:ms-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
          </svg>
        </li>
        <li class="flex items-center">
          <span class="me-2 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-gray-500 text-xs dark:border-gray-400">
            3
          </span>
          Exam Form
        </li>
      </ol>
    </div>
  </section>

  {{-- Profile --}}
  <section>
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
  </section>
 

</div>
