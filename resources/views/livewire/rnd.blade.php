 <div class="p-5">
   <div>
     @if (session()->has('success'))
       <div class="alert alert-success">{{ session('success') }}</div>
     @endif

     @if (session()->has('error'))
       <div class="alert alert-danger">{{ session('error') }}</div>
     @endif

     <form wire:submit.prevent="addWatermark" enctype="multipart/form-data">
       <input type="file" wire:model="pdfFile">
       <button type="submit">Add Watermark</button>
     </form>
   </div>
   <x-spinner />

 </div>
