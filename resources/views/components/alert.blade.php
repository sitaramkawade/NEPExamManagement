
@if (session()->has('alert'))
    @foreach (session('alert') as $key => $alert)
        <x-toast :type="$alert['type']" :key="$key">
            {{ $alert['message'] }}
        </x-toast>
    @endforeach
@endif
