@section('title', 'Transaksi Keuangan IK2T - KP Tanjuang')
@section('description', 'Transaksi Keuangan IK2T Kampuang tanjuang, IV koto Aur Malintang. kab Padang pariaman.')

<x-website-layout>
    <div class="max-w-screen-xl px-2 pt-2 m-auto md:pt-8">
        <div class="flex flex-col flex-auto w-full overflow-hidden bg-white rounded shadow-md">
            <div class="flex p-4 md:p-6 flex-nowrap">
                <div class="flex-grow">
                    <div class="font-bold tracking-wider uppercase text-md">Transaksi Keuangan</div>
                    <div class="text-sm font-medium text-hint">
                        {{-- TODO:FILTER RECORD --}}
                    </div>
                </div>
                <div class="flex flex-nowrap">
                    @if (auth()->user() && auth()->user()->allow('finance-user', 'finance-manager'))
                    <button onclick="Livewire.emit('transaction.form.dialog', { mode: 'create' })" class="flex items-center px-4 py-1 text-white bg-blue-500 rounded-full md:rounded flex-nowrap">
                        {{-- <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg> --}}
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                          </svg>
                        <span class="hidden ml-2 uppercase md:inline-block">Buat Baru</span>
                    </button>
                    @endif
                </div>
            </div>
            <div class="mx-2 overflow-auto">
                <table class="w-full" role="grid">
                    <thead role="rowgroup">
                        <tr role="row" mat-header-row="" class="h-12 border-b">
                            <th width="20px" class="px-2"></th>
                            <th width="10%" class="hidden px-2 text-left sm:table-cell md:px-4">Tanggal</th>
                            <th width="10%" class="hidden px-2 text-left md:table-cell md:px-4">#ID</th>
                            <th width="70%" class="px-2 text-left md:px-4" style="max-width: 50%">Transaksi</th>
                            <th width="15%" class="px-2 text-right md:px-4">Jumlah</th>
                            <th width="15%" class="hidden px-2 md:table-cell md:px-4">status</th>
                        </tr>
                        <!---->
                    </thead>
                    <tbody role="rowgroup" class="divide-y divide-gray-200 ">
                        @foreach($transactions as $trx)
                        <tr role="row" class="h-8 text-sm font-medium text-gray-900 md:h-11">
                            <td class="px-2">

                                @if (auth()->user() && auth()->user()->allow('finance-user', 'finance-manager'))
                                <button onclick="Livewire.emit('transaction.form.dialog', { mode: 'update', id : '{{$trx->id}}' })" class="focus:outline-none">
                                    <svg class="w-6 h6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                @endif
                            </td>
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
                                <x-pagination :paginator="$transactions"></x-pagination>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @push('modals')
    <livewire:transaction-form />
    @endpush
</x-website-layout>
