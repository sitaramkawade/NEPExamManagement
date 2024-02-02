<div>

    @if ($mode=='add')
    <div>
        <x-card-header heading=" Add ">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.generate-exam-order.add')
        </x-form>
    </div>

    @elseif($mode=='all')
    <div>
        <x-breadcrumb.breadcrumb>
            <x-breadcrumb.link route="user.dashboard" name="Dashboard" />
            <x-breadcrumb.link name="Order's" />
            </x-breadcrumb.link>
            <x-card-header heading="Generate Exam Order's">
                <x-add-btn wire:click="setmode('add')" />
            </x-card-header>
            <x-table.frame x="0">
                <x-slot:header>
                    </x-slot>
                    <x-slot:body>
                        <x-table.table>
                            <x-table.thead>
                                <x-table.tr>
                                    <x-table.th wire:click="sort_column('id')" name="id" :sort="$sortColumn" :sort_by="$sortColumnBy">No.</x-table.th>
                                    <x-table.th wire:click="sort_column('exam_name')" name="exam_name" :sort="$sortColumn" :sort_by="$sortColumnBy">Exam Name </x-table.th>
                                    <x-table.th wire:click="sort_column('patternclass_id')" name="patternclass_id" :sort="$sortColumn" :sort_by="$sortColumnBy">Pattern Class Name </x-table.th>
                                    <x-table.th> Action </x-table.th>
                                </x-table.tr>
                            </x-table.thead>
                            <x-table.tbody>
                                @forelse ($panels as $panel)
                                <x-table.tr wire:key="{{ $panel->id }}">
                                    <x-table.td> {{ $panel->id }}</x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll> {{ $panel->exam->exam_name }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                        <x-table.text-scroll>{{ isset($panel->patternclass->pattern->pattern_name) ? $panel->patternclass->pattern->pattern_name : '-' }} {{ isset($panel->patternclass->courseclass->classyear->classyear_name) ? $panel->patternclass->courseclass->classyear->classyear_name : '-' }} {{ isset($panel->patternclass->courseclass->course->course_name) ? $panel->patternclass->courseclass->course->course_name : '-' }} </x-table.text-scroll>
                                    </x-table.td>
                                    <x-table.td>
                                      <a href="{{ route('user.examorder',$panel->id)}}">  <x-table.edit i="0">Create Order</x-table.edit></a>
                                        <x-status>Send Panel List</x-status>
                                        <x-status type="info">Send Email</x-status>
                                    </x-table.td>
                                </x-table.tr>
                                @empty
                                <x-table.tr>
                                    <x-table.td colSpan='8' class="text-center">No Data Found</x-table.td>
                                </x-table.tr>
                                @endforelse
                            </x-table.tbody>
                        </x-table.table>
                        </x-slot>
                        <x-slot:footer>
                            <x-table.paginate :data="$panels" />
                            </x-slot>
            </x-table.frame>
    </div>
    @endif
</div>
