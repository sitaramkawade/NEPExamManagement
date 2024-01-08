<div>
  @if ($mode == 'add')
    <div>
      <x-card-header heading="Add Helpline Request">
        <x-back-btn wire:click="setmode('all')" />
      </x-card-header>
      <x-form wire:submit="add()">
        @include('livewire.user.helpline.helpline-form')
      </x-form>
    </div>
  @elseif($mode == 'edit')
    <div>
      <x-card-header heading="  Edit  Helpline Request">
        <x-back-btn wire:click="setmode('all')" />
      </x-card-header>
      <x-form wire:submit="update({{ $edit_id }})">
        @include('livewire.user.helpline.helpline-form')
      </x-form>
    </div>
  @elseif($mode == 'view')
    <div>
      <x-card-header heading="View Helpline Request">
        <x-back-btn wire:click="setmode('all')" />
      </x-card-header>
      <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
        <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
          View Modification Request
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
          <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="student_id" :value="__('Student Name')" />
            <x-input-show id="student_id" :value="$student_name" />
          </div>
          <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="student_helpline_query_id" :value="__('Seleteed Query')" />
            <x-input-show id="student_helpline_query_id" :value="$current_query" />
          </div>
          <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="old_query" :value="__('Current Query')" />
            <x-input-show id="old_query" :value="$old_query" />
          </div>
          <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
            <x-input-label for="new_query" :value="__('New Query')" />
            <x-input-show id="new_query" :value="$new_query" />
          </div>
        </div>
        <div class="px-5 py-2 text-sm text-gray-600 dark:text-gray-400">
          <x-input-label for="description" :value="__('Description')" />
          <x-textarea-show id="description" :value="$description" />
        </div>
        @if (count($documents) > 0)
          <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
            <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
              Uploaded Documents <x-spinner />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 mx-auto">
              @foreach ($documents as $doc)
                <div class="flex flex-col items-center space-x-1 border rounded-md border-primary m-2 ">
                  <div class="shrink-0 p-2">
                    <img style="width: 135px; height: 150px;" class="object-center object-fill  " src="{{ isset($uploaded_documents_old[$doc->id]) ? asset($uploaded_documents_old[$doc->id]) : asset('img/no-img.png') }}" alt="{{ $doc->document_name }}" />
                  </div>
                  <x-input-label class="py-2" for="{{ $doc->id }}" :value="$doc->document_name" />
                </div>
              @endforeach
            </div>
          </div>
        @endif
      </div>
    </div>
  @elseif($mode == 'all')
    <div>
      <x-card-header heading="All Helpline Request's">
        <x-add-btn wire:click="setmode('add')" />
      </x-card-header>
      <x-table.frame>
        <x-slot:body>
          <x-table.table>
            <x-table.thead>
              <x-table.tr>
                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
                <x-table.th wire:click="sort_column('student_id')" name="student_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Student</x-table.th>
                <x-table.th wire:click="sort_column('student_helpline_query_id')" name="student_helpline_query_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Query</x-table.th>
                <x-table.th wire:click="sort_column('remark')" name="remark" :sort="$sortColumn" :sort_by="$sortColumnBy">Remark</x-table.th>
                <x-table.th wire:click="sort_column('verified_by')" name="verified_by" :sort="$sortColumn" :sort_by="$sortColumnBy">Verified By</x-table.th>
                <x-table.th wire:click="sort_column('approve_by')" name="approve_by" :sort="$sortColumn" :sort_by="$sortColumnBy">Approved By</x-table.th>
                <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
                <x-table.th> Action </x-table.th>
              </x-table.tr>
            </x-table.thead>
            <x-table.tbody>
              @foreach ($student_helplines as $helpline)
                <x-table.tr wire:key="{{ $helpline->id }}">
                  <x-table.td>{{ $helpline->id }} </x-table.td>
                  <x-table.td>{{ $helpline->student->student_name }} </x-table.td>
                  <x-table.td>{{ $helpline->studenthelplinequery->query_name }} </x-table.td>
                  <x-table.td> {{ $helpline->remark ?? '-' }} </x-table.td>
                  <x-table.td> {{ isset($helpline->verified->name)?$helpline->verified->name:'N.A.'; }} </x-table.td>
                  <x-table.td> {{ isset($helpline->approved->name)?$helpline->verified->name:'N.A.'; }} </x-table.td>
                  <x-table.td>
                    @if ($helpline->status == 0)
                      <x-status type="warning"> Pending </x-status>
                    @elseif ($helpline->status == 1)
                      <x-status type="success"> Approve </x-status>
                    @elseif ($helpline->status == 2)
                      <x-status type="danger"> Canceled </x-status>
                    @else
                      <x-status type="danger"> Rejected </x-status>
                    @endif
                  </x-table.td>
                  <x-table.td>

                    @if ($helpline->deleted_at)
                      <x-table.delete wire:click="deleteconfirmation({{ $helpline->id }})" />
                      <x-table.restore wire:click="restore({{ $helpline->id }})" />
                    @else
                      <x-table.view wire:click="view({{ $helpline->id }})" />
                      <x-table.edit wire:click="edit({{ $helpline->id }})" />
                      @if ($helpline->status == 0)
                        <x-table.active wire:click="status({{ $helpline->id }})" />
                      @elseif ($helpline->status == 1)
                        <x-table.inactive wire:click="status({{ $helpline->id }})" />
                      @elseif ($helpline->status == 3)
                        <x-table.active wire:click="status({{ $helpline->id }})" />
                      @endif
                      <x-table.archive wire:click="delete({{ $helpline->id }})" />
                    @endif
                  </x-table.td>
                </x-table.tr>
              @endforeach
            </x-table.tbody>
          </x-table.table>
        </x-slot>
        <x-slot:footer>
          <x-table.paginate :data="$student_helplines" />
        </x-slot>
      </x-table.frame>
    </div>
  @endif
</div>
