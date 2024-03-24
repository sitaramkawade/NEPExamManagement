<div>
  <x-breadcrumb.breadcrumb>
    <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
    <x-breadcrumb.link name="Strong Room's" />
  </x-breadcrumb.breadcrumb>
  <x-card-header heading="Strong Room's" />
  <div>
    <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
      <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
        Approve Paper Set For {{ isset($exam->exam_name) ? $exam->exam_name : '' }} Exam <x-spinner/>
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
                <x-form-btn>Use Selected Paper Set For  {{ isset($exam->exam_name) ? $exam->exam_name : '' }} Exam</x-form-btn>
            </div>
          </div>
        </x-form>
      </div>
    </div>
    <x-table.frame a="0">
      <x-slot:body>
        <x-table.table>
          <x-table.tbody>
            <x-table.tr>
              <x-table.td colspan='10' class=" !p-0 !m-0">
                <div class="overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
                  <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
                    ACTIVE EXAM - {{ isset($exam->exam_name) ? $exam->exam_name : '' }}
                  </div>
                  <div>
                    <x-table.table>
                      <x-table.tbody>
                        @forelse ($papersubmissions as  $papersubmission)
                          <x-table.tr wire:key="{{ $papersubmission->id }}">
                            <x-table.td colSpan='10' class="m-0 p-0">
                              <x-card-collapsible class="m-0 p-0" heading="SUBJECT NAME - {{ $papersubmission->subject->subject_name }}" on="0">
                                <div class="grid grid-cols-1 md:grid-cols-3">
                                  @foreach ($papersubmission->questionbanks()->get() as $question_banck)
                                    <div class="m-2 mx-auto w-80">
                                      <div class="w-full p-2 max-w-sm bg-white border border-primary rounded-lg shadow dark:bg-gray-800 dark:border-primary">
                                        <div class="flex flex-col items-center">
                                          <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">SET - {{ $question_banck->paperset->set_name }}</h5>
                                          <span class="text-sm text-gray-500 dark:text-gray-400"> {{ $question_banck->file_name }}</span>
                                          <div class="flex my-4 ">
                                            <x-view-image-model-btn title="{{ $question_banck->file_name }}" i="1" src="{{ isset($question_banck->file_path) ? asset($question_banck->file_path) : asset('img/no-img.png') }}">View Question Paper</x-view-image-model-btn>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  @endforeach
                                </div>
                              </x-card-collapsible>
                            </x-table.td>
                          </x-table.tr>
                        @empty
                          <x-table.tr>
                            <x-table.td colSpan='8' class="text-center">No Data Found</x-table.td>
                          </x-table.tr>
                        @endforelse
                      </x-table.tbody>
                    </x-table.table>
                  </div>
                </div>
              </x-table.td>
            </x-table.tr>
          </x-table.tbody>
        </x-table.table>
      </x-slot>
      <x-slot:footer>
        <x-table.paginate :data="$papersubmissions" />
      </x-slot>
    </x-table.frame>
  </div>
</div>
