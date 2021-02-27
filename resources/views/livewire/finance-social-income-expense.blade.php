
<div class="flex flex-auto">
    <div
        class="relative flex flex-col flex-auto p-6 pb-3 pr-3 overflow-hidden bg-white border-l-4 rounded shadow-md bg-card border-green">
        <div class="absolute bottom-0 right-0 md:top-0 w-28 h-28">
            {{-- PERSENTATION BAR --}}
            {{-- <svg class="w-24 h-24 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
            </svg> --}}
            {{-- BAR --}}
            <svg class="w-24 h-24 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
        </div>
        <div class="flex items-center">
            <div class="flex flex-col">
                <div class="font-bold tracking-wider uppercase text-md text-secondary">Kalkulasi Dana Sosial</div>
                <div class="text-sm font-medium text-green"> {{ now()->isoFormat('dddd, D MMMM Y') }} </div>
            </div>
        </div>
        <div class="flex flex-row flex-wrap mt-4 -mx-6">
            <div class="flex flex-col pl-4 my-3 ml-4 border-l-4 border-green-600 xs:w-full">
                <div class="text-xs font-semibold leading-none tracking-wider uppercase text-hint">
                    Dana Masuk</div>
                <div class="w-40 mt-2 text-xl font-medium leading-none">
                    <span class="@if($income < 0) text-red-600 @endif">IDR {{ number_format($income, 0) }}</span>
                </div>
            </div>
            <div class="flex flex-col pl-4 my-3 ml-4 border-l-4 border-red-600 xs:w-full">
                <div class="text-xs font-semibold leading-none tracking-wider uppercase text-hint">
                    Biaya Sosial</div>
                <div class="w-40 mt-2 text-xl font-medium leading-none">
                    <span class="@if($expense < 0) text-red-600 @endif">IDR {{ number_format($expense, 0) }}</span>
                </div>
            </div>
            <div class="flex flex-col pl-4 my-3 ml-4 border-l-4 border-gray-900 xs:w-full">
                <div class="text-xs font-semibold leading-none tracking-wider uppercase text-hint">
                    Sisa Dana Sosial
                </div>
                <div class="w-40 mt-2 text-xl font-medium leading-none">
                    <span class="@if($summary < 0) text-red-600  @endif">IDR {{ number_format($summary, 0) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
