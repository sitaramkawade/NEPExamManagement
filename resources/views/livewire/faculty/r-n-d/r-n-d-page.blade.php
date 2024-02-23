<div>
    @if ($mode == 'add')
        <div>
            <x-card-header heading="Add Roletype">
                <x-back-btn wire:click="setmode('all')" />
            </x-card-header>
            <x-form wire:submit="save()">
                @include('livewire.faculty.faculty-roletype.roletype-form')
            </x-form>
        </div>
    @elseif($mode == 'edit')
        <x-card-header heading="Edit Roletype">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        <x-form wire:submit="update({{ $roletype_id }})">
            @include('livewire.faculty.faculty-roletype.roletype-form')
        </x-form>
    @elseif($mode == 'view')
        <x-card-header heading="View Roletype">
            <x-back-btn wire:click="setmode('all')" />
        </x-card-header>
        @include('livewire.faculty.faculty-roletype.view-form')
    @elseif($mode == 'all')
    <div>
        <x-breadcrumb.breadcrumb>
            <x-breadcrumb.link route="faculty.dashboard" name="Dashboard" />
            <x-breadcrumb.link name="Roletype's" />
        </x-breadcrumb.breadcrumb>
        <x-card-header heading="All Roletype's">
            <x-add-btn wire:click="setmode('add')" />
        </x-card-header>
        <x-table.frame>
            <x-slot:body>
                <x-table.table>
                    <x-table.thead>
                        <x-table.tr>
                            <x-table.th >ID</x-table.th>
                            <x-table.th >Role Type Name</x-table.th>
                            <x-table.th >Status</x-table.th>
                            <x-table.th >Action</x-table.th>
                        </x-table.tr>
                    </x-table.thead>
                    <x-table.tbody>
                        @forelse ($roletypes as $roletype)
                            <x-table.tr wire:key="{{ $roletype->id }}">
                                <x-table.td>
                                    <div class="h-4 w-full rounded-md shimmer relative overflow-hidden before:absolute before:inset-0 before:-translate-x-full before:bg-gradient-to-r before:from-transparent before:via-white/20 hover:shadow-lg before:animate-[shimmer_1.5s_infinite] bg-neutral-600"></div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="h-4 w-full rounded-md shimmer relative overflow-hidden before:absolute before:inset-0 before:-translate-x-full before:bg-gradient-to-r before:from-transparent before:via-white/20 hover:shadow-lg before:animate-[shimmer_1.5s_infinite] bg-neutral-600"></div>
                                </x-table.td>
                                <x-table.td>
                                    @if (!$roletype->deleted_at)
                                        @if ($roletype->status === 1)
                                            <x-rnd.status wire:click="status({{ $roletype->id }})" />
                                        @else
                                            <x-rnd.status wire:click="status({{ $roletype->id }})" />
                                        @endif
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    @if ($roletype->deleted_at)
                                        <x-rnd.button wire:click="deleteconfirmation({{ $roletype->id }})" />
                                        <x-rnd.button wire:click="restore({{ $roletype->id }})" />
                                    @else
                                        <x-rnd.button wire:click="view({{ $roletype->id }})" />
                                        <x-rnd.button wire:click="edit({{ $roletype->id }})" />
                                        <x-rnd.button wire:click="softdelete({{ $roletype->id }})" />
                                    @endif
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
                <x-table.paginate :data="$roletypes" />
            </x-slot>
        </x-table.frame>
    </div>
    @endif
</div>
