<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading=" Add Subject Wise Exam Time Table">

            <x-back-btn wire:click="setmode('all')" />

        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.exam-time-table.subject-exam-time-table-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit Subject Wise Exam Time Table">
        <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $college_id  }})">
        @include('livewire.user.exam-time-table.subject-exam-time-table-form')
    </x-form>
    @elseif($mode=='all')
    <div>
        <x-card-header heading=" All Subject Wise Exam Time Table's">
            <x-add-btn wire:click="setmode('add')" />
        </x-card-header>
        <x-table.frame>
            <x-slot:header>
                </x-slot>
                <x-slot:body>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.tr>
                                <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
                                <x-table.th wire:click="sort_column('class')" name="class" :sort="$sortColumn" :sort_by="$sortColumnBy">Class </x-table.th>
                                <x-table.th wire:click="sort_column('date')" name="date" :sort="$sortColumn" :sort_by="$sortColumnBy">Date </x-table.th>
                                <x-table.th wire:click="sort_column('time')" name="time" :sort="$sortColumn" :sort_by="$sortColumnBy">Time</x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            {{-- @forelse ($subjects as  $college)
                            <x-table.tr wire:key="{{ $college->id }}">
                                <x-table.td> {{ $college->id }}</x-table.td>
                                <x-table.td>
                                    <x-table.text-scroll> {{ $college->college_name }} </x-table.text-scroll>
                                </x-table.td>
                                <x-table.td> {{ $college->college_email}} </x-table.td>
                                <x-table.td>
                                    <x-table.text-scroll> {{ $college->college_address }}</x-table.text-scroll>
                                </x-table.td>
                                <x-table.td>
                                    <x-table.text-scroll> {{ $college->sanstha->sanstha_name }} </x-table.text-scroll>
                                </x-table.td>
                                <x-table.td>
                                    <x-table.text-scroll> {{ $college->university->university_name }} </x-table.text-scroll>
                                </x-table.td>
                                <x-table.td>
                                    @if($college->status==1)
                                    <x-status type="success">Active</x-status>
                                    @else
                                    <x-status type="danger">Inactive</x-status>
                                    @endif --}}
                                {{-- </x-table.td>
                                
                            </x-table.tr>
                            @empty
                            <x-table.tr>
                                <x-table.td colSpan='8' class="text-center">No Data Found</x-table.td>
                            </x-table.tr>
                            @endforelse --}}
                        </x-table.tbody>
                    </x-table.table>
                    </x-slot>
                    <x-slot:footer>
                      
                        </x-slot>
        </x-table.frame>
    </div>
    @endif
</div>