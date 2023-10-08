@props(['status'])

@if (!empty($status))
    <div class="w-full px-4 py-2 rounded-lg mt-4 flex justify-between text-lg text-white bg-green-500">
        <div>{{ $status }}</div>
        {{-- <div>x</div> --}}
    </div>
@endif
