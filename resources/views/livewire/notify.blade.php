
<div class="fixed right-0 flex flex-col h-0">
    @foreach($notifies as $notify)
    <div class="px-4 py-2 m-3 slashed-zero shadow opacity-80 rounded-md {{ $colors[$notify['type']] }} {{ $bgcolors[$notify['type']] }}">
        <div class="text-sm font-semibold">{{ $notify['title'] }}</div>
        <div class="text-xs font-semibold">{{ $notify['message'] }}</div>
    </div>
    @endforeach
</div>
