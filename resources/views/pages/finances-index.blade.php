@section('title', 'Keuangan IK2T - KP Tanjuang')
@section('description', 'Keuangan IK2T Kampuang tanjuang, IV koto Aur Malintang. kab Padang pariaman.')

<x-website-layout>
    <div class="max-w-screen-xl px-2 mx-auto mt-5 md:mt-10">
        <div class="flex flex-col flex-auto">
            <div class="flex flex-wrap w-full mb-2">
                <div class="flex flex-wrap w-full mb-2 lg:w-1/2 xl:w-full">
                    <div class="w-full mb-2 xl:w-1/2 xl:pr-1">
                        <livewire:finance-general-income-expense />
                    </div>
                    <div class="w-full mb-2 xl:w-1/2 xl:pl-1">
                        <livewire:finance-social-income-expense />
                    </div>
                </div>

                <div class="w-full mb-2 lg:pl-4 xl:pl-0 lg:h-max lg:w-1/2 xl:w-full lg h-90">
                    <livewire:finance-general-grafic />
                </div>

            </div>

            {{-- trxs --}}
            <div class="">
                <div class="flex flex-col flex-auto w-full overflow-hidden bg-white rounded shadow-md">
                    <div class="p-4 md:p-6">
                        <div class="font-bold tracking-wider uppercase text-md">Transaksi keuangan</div>
                        <div class="text-sm font-medium text-gray-500">Beberapa alur transaksi terakhir</div>
                    </div>
                    <div class="mx-2 overflow-auto">
                        <table class="w-full" role="grid">
                            <thead role="rowgroup">
                                <tr role="row" mat-header-row="" class="h-12 text-sm uppercase border-b">
                                    <th width="15%" class="hidden px-2 font-semibold text-left sm:table-cell md:px-4">Tanggal</th>
                                    <th width="10%" class="hidden px-2 font-semibold text-left md:table-cell md:px-4">#ID</th>
                                    <th width="50%" class="px-2 font-semibold text-left md:px-4" style="max-width: 50%">Transaksi</th>
                                    <th width="15%" class="px-2 font-semibold text-right md:px-4">Jumlah</th>
                                    <th width="15%" class="hidden px-2 font-semibold md:table-cell md:px-4">status</th>
                                </tr>
                                <!---->
                            </thead>
                            <tbody role="rowgroup" class="divide-y">
                                @foreach(App\Models\Transaction::latest()->limit(5)->get() as $trx)
                                <tr role="row" class="h-12 text-sm">
                                    <td class="hidden px-2 text-left sm:table-cell md:px-4">{{$trx->date->isoFormat('DD/MM/YYYY')}}</td>
                                    <td class="hidden px-2 text-left truncate md:table-cell md:px-4">{{$trx->number}}</td>
                                    <td class="px-2 text-left md:px-4">
                                        <div class="truncate md:w-full xl:max-w-screen-sm" style="max-width: 50vw" title="{{$trx->label}}">
                                            {{$trx->label}}
                                        </div>
                                        <div class="text-sm text-gray-500 sm:hidden ">
                                            {{$trx->date->isoFormat('DD/MM/YYYY')}}
                                        </div>
                                    </td>
                                    <td class="px-2 text-right md:px-4">{{number_format($trx->amount, 0)}}</td>
                                    <td class="hidden px-2 text-center md:table-cell md:px-4">
                                        <span class="inline-flex items-center px-2 text-xs font-bold tracking-wide uppercase bg-green-200 rounded-full py-2px">
                                            <span class="w-2 h-2 mr-2 bg-green-600 rounded-full"></span>
                                            <span class="leading-relaxed whitespace-no-wrap pr-2px">completed</span>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot role="rowgroup">
                                <tr role="row" class="h-16">
                                    <td colspan="100%" class="px-4">
                                        <a href="{{ route('finances.transactions.index') }}" class="text-blue-500">
                                            Lihat semua transaksi
                                        </a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-website-layout>
