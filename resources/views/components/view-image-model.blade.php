@props(['title'=>"View"])
<div>
  <div id="view-document-model" tabindex="-1" class="modal fixed inset-0 items-center justify-center z-50 flex hidden w-full p-4 overflow-y-auto md:inset-0 min-h-full max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-medium text-gray-900 dark:text-white">
            {{ $title }}
          </h3>
          <button onclick="closeModal()" type="button" class="hover:bg-red-800 bg-red-500 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center text-white" data-modal-hide="large-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <div class="p-4 md:p-5 space-y-4">
          <img id="view-document-model-image" class="border w-full max-h-50 object-cover overflow-y-scroll" src="" alt="image description">
        </div>
      </div>
    </div>
  </div>
  @section('scripts')
    <script>
      function openModal(imagePath) {
        document.getElementById("view-document-model-image").src = imagePath;
        document.getElementById("view-document-model").classList.remove("hidden");
      }

      function closeModal() {
        document.getElementById("view-document-model").classList.add("hidden");
      }
    </script>
  @endsection
</div>
