<div>
  <div class="m-2 overflow-hidden rounded border bg-white shadow dark:border-primary-darker dark:bg-darker">
    <div class="bg-primary px-2 py-2 font-semibold text-white dark:text-light">
      Question Bank's <x-spinner />
    </div>
    <div>
      <x-form wire:submit="confirm_uploaded_paper_sets()">
        <x-table.table>
          <x-table.thead>
            <x-table.tr>
              <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">ID</x-table.th>
              <x-table.th wire:click="sort_column('subject_id')" name="subject_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Subject</x-table.th>
              @foreach ($sets as $set)
                <x-table.th>{{ 'Set ' . $set->set_name }} </x-table.th>
              @endforeach
            </x-table.tr>
          </x-table.thead>
          <x-table.tbody>
            @forelse ($subjects as  $subject)
              <x-table.tr wire:key="{{ $subject->id }}">
                <x-table.td>{{ $subject->id }} </x-table.td>
                <x-table.td>{{ $subject->subject_name }} </x-table.td>
                @foreach ($sets as $set)
                  <x-table.td>
                    @php
                        $ukey = (int)$subject->id . '' . (int)$set->id;
                    @endphp
                    <livewire:user.question-paper-bank.question-paper-cell :key="$ukey" :$set :$faculty_id subject_id='{{ $subject->id }}' />
                  </x-table.td>
                @endforeach
              </x-table.tr>
            @empty
              <x-table.tr>
                <x-table.td colSpan='8' class="text-center">No Data Found</x-table.td>
              </x-table.tr>
            @endforelse
          </x-table.tbody>
        </x-table.table>
        <x-form-btn>Confirm & Submit</x-form-btn>
      </x-form>
    </div>
  </div>
</div>
