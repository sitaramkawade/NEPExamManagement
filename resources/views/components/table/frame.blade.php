@props(['header' => false, 'mode' => 'all', 'r' => true, 'body' => false, 'footer' => false, 'title' => false, 'i' => false, 'x' => true, 'p' => true, 's' => true, 'a' => true])
<div class="m-2 flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="inline-block min-w-full p-1.5 align-middle">
      <div class="overflow-hidden">
        <div class="flex flex-col">
          <div class="-m-1.5 overflow-x-auto">
            <div class="inline-block min-w-full p-1.5 align-middle">
              <div class="divide-y divide-gray-300 rounded-lg border bg-gray-200 dark:divide-primary-darker dark:border-primary-darker dark:bg-transparent">
                @if ($a)
                  <div class="px-4 py-3">
                    <x-table.loading />
                    @if ($p)
                      <x-table.perpage />
                    @endif
                    @if ($s)
                      <x-table.search />
                    @endif
                    {{ $header }}
                    @if ($i)
                      @if (isset($mode))
                        @if ($mode == 'all')
                          <x-table.import-btn wire:click="setmode('import')" />
                        @elseif($mode == 'import')
                          <x-table.import-close-btn wire:click="setmode('all')" />
                        @endif
                      @endif
                    @endif
                    @if ($r)
                      <x-table.refresh />
                    @endif
                    @if ($x)
                      <x-table.export />
                    @else
                      <x-table.spinner />
                    @endif
                  </div>
                @endif
                <div class="overflow-hidden">
                  {{ $body }}
                </div>
                {{ $footer }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
