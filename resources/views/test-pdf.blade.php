<form method="post" action="{{ route('add-watermark') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="pdf_file" accept="application/pdf">
    <button type="submit">Add Watermark</button>
</form>
