<div class="flex flex-col">
    <div class="px-4 text-center">
        <button wire:click="previousPivot" class="w-full px-4 py-1 my-1 text-green-500 border border-green-500 rounded focus:outline-none">Sebelumnya</button>
    </div>
    <div class="flex flex-col overflow-auto text-gray-500 divide-y divide-gray-300">
        @foreach ($pivot as $year => $months)
        <div class="flex flex-row ">
            <div class="flex-none px-4 py-2 font-bold bg-gray-200">{{ $year }}</div>
            <div class="flex flex-row flex-grow font-bold uppercase divide-x">
                @foreach ($months as $month)
                @if ($premium->premiables()->whereYear('period', $year)->whereMonth('period', $month)->count())
                <div class="flex items-center justify-center w-1/12 px-2 text-sm text-green-700 bg-green-300">
                    {{ Carbon\Carbon::create($year, $month, 1)->shortMonthName }}
                </div>
                @elseif($premium->verified_at && now() > Carbon\Carbon::create($year, $month, 1) && $premium->getPremiPeriodstart() <= Carbon\Carbon::create($year, $month, 0))
                <div class="flex items-center justify-center w-1/12 px-2 text-sm text-center text-red-700 bg-red-300">
                    {{ Carbon\Carbon::create($year, $month, 1)->shortMonthName }}
                </div>
                @else
                <div class="flex items-center justify-center w-1/12 px-2 text-sm text-center ">
                    {{ Carbon\Carbon::create($year, $month, 1)->shortMonthName }}
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    <div class="px-4 pt-2 pb-5 text-center">
        <button wire:click="nextPivot" class="w-full px-4 py-1 my-1 text-green-500 border border-green-500 rounded focus:outline-none">Selanjutnya</button>
    </div>
</div>
