<div>
    @if ($mode=='add')
    <div>
        <x-card-header heading="Add University">
                <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="add()">
            @include('livewire.user.university.university-form')
        </x-form>
    </div>
    @elseif($mode=='edit')
    <x-card-header heading="Edit University">
            <x-back-btn wire:click="setmode('all')" />
    </x-card-header>
    <x-form wire:submit="update({{ $university_id  }})">
        @include('livewire.user.university.university-form')
    </x-form>
    @elseif($mode=='all')
    <div>
        <x-card-header heading="All University's">
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
                                <x-table.th wire:click="sort_column('university_name')" name="university_name" :sort="$sortColumn" :sort_by="$sortColumnBy">University Name </x-table.th>
                                <x-table.th wire:click="sort_column('university_email')" name="university_email" :sort="$sortColumn" :sort_by="$sortColumnBy">University Email </x-table.th>
                                <x-table.th wire:click="sort_column('university_address')" name="university_address" :sort="$sortColumn" :sort_by="$sortColumnBy">University Address</x-table.th>
                                <x-table.th wire:click="sort_column('university_website_url')" name="university_website_url" :sort="$sortColumn" :sort_by="$sortColumnBy">University website url.</x-table.th>
                                <x-table.th wire:click="sort_column('status')" name="status" :sort="$sortColumn" :sort_by="$sortColumnBy">Status</x-table.th>
                                <x-table.th> Action </x-table.th>
                            </x-table.tr>
                        </x-table.thead>
                        <x-table.tbody>
                            @forelse ($universities as $key => $university)
                            <x-table.tr wire:key="{{ $university->id }}">
                                <x-table.td>{{ $key+1 }}</x-table.td>
                                <x-table.td >{{ $university->university_name }} </x-table.td>
                                <x-table.td> {{ $university->university_email}} </x-table.td>
                                <x-table.td> {{ $university->university_address }} </x-table.td>
                                <x-table.td> {{ $university->university_website_url }} </x-table.td>
                                <x-table.td> 
                                 @if($university->status==1)
                                <x-status type="success">Active</x-status>
                                @else
                                <x-status type="danger">Inactive</x-status>
                                @endif
                                 </x-table.td>
                                <x-table.td>
                                    <x-table.edit wire:click="edit({{ $university->id }})" />
                                    <x-table.delete wire:click="delete({{ $university->id }})" />
                                      @if($university->status==1)
                                    <x-table.inactive wire:click="Status({{ $university->id }})" />
                                    @else
                                    <x-table.active wire:click="Status({{ $university->id }})" />
                                    @endif
                                </x-table.td>
                            </x-table.tr>
                            @empty
                            <x-table.tr>
                                <x-table.td class='text-center' colSpan='7'>No Data Found</x-table.td>
                            </x-table.tr>
                            @endforelse
                        </x-table.tbody>
                    </x-table.table>
                    </x-slot>
                    <x-slot:footer>
                        <x-table.paginate :data="$universities" />
                        </x-slot>
        </x-table.frame>
    </div>
    @endif
</div>
