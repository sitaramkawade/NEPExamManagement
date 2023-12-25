@props(["header" => false, "body" => false, "footer" => false])

<div class="m-2 flex flex-col ">
  <div class="-m-1.5 overflow-x-auto">
    <div class="inline-block min-w-full p-1.5 align-middle">
      <div class="overflow-hidden">
        <div class="flex flex-col">
          <div class="-m-1.5 overflow-x-auto">
            <div class="inline-block min-w-full p-1.5 align-middle">
              <div class="divide-y divide-gray-300 bg-gray-200 dark:bg-transparent rounded-lg border dark:divide-primary-darker dark:border-primary-darker">
                <div class="px-4 py-3">
                  {{ $header }}
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
