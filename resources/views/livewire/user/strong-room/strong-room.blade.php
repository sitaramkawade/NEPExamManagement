<div>
  <x-breadcrumb.breadcrumb>
    <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
    <x-breadcrumb.link name="Strong Room's" />
  </x-breadcrumb.breadcrumb>
  <x-card-header heading="Strong Room's" />
  <div>
    @if (!$papersubmissions->isEmpty())
     {{-- <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
        <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
          Approve Paper Set For {{ isset($exam->exam_name) ? $exam->exam_name : '' }} Exam <x-spinner />
        </div>
        <div>
          <x-form wire:submit='approve_papaer_set()'>
            <div class="grid grid-cols-2">
              <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
                <x-input-label for="set_id" :value="__('Select Question Paper Set')" />
                <x-input-select id="set_id" wire:model.live="set_id" name="set_id" class="text-center w-full mt-1" :value="old('set_id', $set_id)" required autocomplete="set_id">
                  <x-select-option class="text-start" hidden> -- Select Question Paper Set -- </x-select-option>
                  @forelse ($pappersets as $set)
                    <x-select-option wire:key="{{ $set->id }}" value="{{ $set->id }}" class="text-start"> {{ $set->set_name }} </x-select-option>
                  @empty
                    <x-select-option class="text-start">Question Paper Sets Not Found</x-select-option>
                  @endforelse
                </x-input-select>
                <x-input-error :messages="$errors->get('set_id')" class="mt-1" />
              </div>
              <div class="px-5 py-2  text-sm text-gray-600 dark:text-gray-400">
                <br>
                <x-form-btn>Use Selected Paper Set For {{ isset($exam->exam_name) ? $exam->exam_name : '' }} Exam</x-form-btn>
              </div>
            </div>
          </x-form>
        </div>
      </div>  --}}
      <x-form wire:submit='approve_papaer_set()'>
        <x-table.frame a="0">
          <x-slot:body>
            <x-table.table>
            <x-table.thead>
              <x-table.tr>
                <x-table.th>ID</x-table.th>
                <x-table.th>Subject</x-table.th>
                @foreach ($pappersets as $set)
                  <x-table.th> 
                    <x-input-checkbox id="check_all" name="check_all" class=" h-6 w-6 ml-2" />
                    {{ $set->set_name }}
                  </x-table.th>
                @endforeach
              </x-table.tr>
            </x-table.thead>
            <x-table.tbody>
              @foreach ($papersubmissions as $papersubmission)
                <x-table.tr wire:key="{{ $papersubmission->id }}">
                  <x-table.td> {{ $papersubmission->id }}</x-table.td>
                  <x-table.td> {{ $papersubmission->subject->subject_name }}</x-table.td>
                  @foreach ($pappersets as $set)
                    @php
                      $question_bank = $papersubmission
                          ->questionbanks()
                          ->where('set_id', $set->id)
                          ->first();
                    @endphp
                    @if (isset($question_bank->set_id) && $question_bank->is_used==0)
                      <x-table.td>
                        <x-input-checkbox name="question_bank.{{ $question_bank->id }}" wire:model="question_bank.{{ $question_bank->id }}" id="question_bank.{{ $question_bank->id }}" class="SET-{{ $set->set_name }}   h-6 w-6 mx-2" />
                      </x-table.td>
                    @elseif(isset($question_bank->is_used))
                      <x-table.td>
                        <x-status type="success" class="!p-0.5 ml-2">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                          </svg>
                        </x-status>
                      </x-table.td>
                    @else
                      <x-table.td>
                        <x-status type="danger" class="!p-0.5 ml-2">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                          </svg>
                        </x-status>
                      </x-table.td>
                    @endif
                  @endforeach
                </x-table.tr>
              @endforeach
            </x-table.tbody>
          </x-table.table>
          <div class="inline w-full ">
            <x-status type="success" class="!p-0.5 ml-2 h-5 mt-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </x-status>
            <span class="h-5 mt-5 mx-2">Used Set</span>
            <x-status type="danger" class="!p-0.5 ml-2 h-5 mt-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </x-status>
            <span class="h-5 mt-5 mx-2">Not Uploaded</span>
              <x-form-btn >Use Selected Paper Set For {{ isset($exam->exam_name) ? $exam->exam_name : '' }} Exam</x-form-btn>
          </div>
        </x-slot>
        <x-slot:footer>
          <x-table.paginate :data="$papersubmissions" />
        </x-slot>
      </x-table.frame>
      </x-form>
      @php
       session()->forget('session-alert');
      @endphp
    @else
      @php
        session()->flash('session-alert', [['type' => 'info', 'message' => 'Exam Question Paper will be available two hours before the start time.']]);
      @endphp
      <x-alert />
    @endif
  </div>
</div>
