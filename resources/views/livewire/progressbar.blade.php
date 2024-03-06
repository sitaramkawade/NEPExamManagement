<div class="m-3">
  <div class="flex items-center justify-between">
    @php
      $percentage = $total > 0 && $completed <= $total ? round(($completed / $total) * 100) : 0;
    @endphp
    <div class="w-full bg-gray-200 rounded-full h-4 dark:bg-gray-600 relative">
      <div class="bg-primary-dark h-4 rounded-full" style="width:{{ $percentage }}%"></div>
    </div>
    <span class="ml-2 text-sm font-medium text-nowrap text-primary-darker dark:text-white">{{ $percentage }} %</span>
  </div>
</div>
