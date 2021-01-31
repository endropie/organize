<div class="flex flex-col gap-1">
    @if(!$premium->verified_at)
    <span class="inline-flex px-4 py-1 text-sm font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
        Menunggu verifikasi KK
    </span>
    @if(Auth::user() && (Auth::user()->allow('member-manager') || Auth::user()->allowRegion('member-region',$premium->region)))
    <button wire:click="setVerified" class="px-4 py-1 text-white bg-green-600 rounded hover:bg-green-400 focus:bg-green-400 focus:outline-none" >Verifikasi</button>
    @endif
    @elseif ($premium->unverified)
    <span class="inline-flex px-4 py-1 text-sm font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
        Menunggu ({{$premium->unverified}}) verifikasi anggota
    </span>
    @else
    <span class="inline-flex px-4 py-1 text-sm font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
        Terverikasi
    </span>
    @endif
</div>
