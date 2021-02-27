@if ($member->premium->verified_at)
<span class="">
    @if ($member->verified_at)
    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
        Aktif
    </span>
    @else
    @if(Auth::user() && Auth::user()->allow('member-region', 'member-manager'))
    <button wire:click="setVerified" class="px-4 py-1 text-white bg-green-600 rounded hover:bg-green-400 focus:bg-green-400 focus:outline-none" >Aktivasi</button>
    @else
    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
        Non-Aktif
    </span>
    @endif
    @endif
</span>
@else
<span class="inline-flex px-2 text-sm font-semibold leading-5 text-yellow-800 bg-yellow-300 rounded-full">
    Non-Verifikasi
</span>
@endif

