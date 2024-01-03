@props(["header" => false, "body" => false, "footer" => false, "title" => false ])

<div class="m-2 flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="inline-block min-w-full p-1.5 align-middle">
      <div class="overflow-hidden">
        <div class="flex flex-col">
          <div class="-m-1.5 overflow-x-auto">
            <div class="inline-block min-w-full p-1.5 align-middle">
              <div class="divide-y divide-gray-300 rounded-lg border bg-gray-200 dark:divide-primary-darker dark:border-primary-darker dark:bg-transparent">
                <div class="px-4 py-3">
                  <x-table.loading />
                  <x-table.perpage />
                  <x-table.search />
                  {{ $header }}
                  <x-table.export />
                </div>
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
