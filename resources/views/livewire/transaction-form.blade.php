<div x-data="{ setting: false }">
    @if ($show)
    <x-modal xfullscreen style="z-index: 1">
        {{-- HEADER --}}
        <x-slot name="header">
            <div class="flex flex-row px-4 py-2">
                <span class="font-bold tracking-wider uppercase truncate text-md">
                    FORM TRANSAKSI
                </span>
                <span class="flex-grow"></span>
                <span class="items-center self-center flex-none">
                    @if ($record && in_array($record['type'], ['INCOME', 'EXPENSE', 'PREMIUM']))
                    <button class="mt-1 focus:outline-none" x-on:click="setting = !setting">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                    @endif
                </span>
            </div>
        </x-slot>
        {{-- ACTION --}}
        <x-slot name="footer">
            <div class="px-2 py-2 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button"
                    wire:click="save()"
                    class="inline-flex justify-center w-full px-2 py-1 text-sm text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm md:px-4 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-md">
                    Simpan
                </button>
                <button wire:click="setClose"
                    class="inline-flex justify-center w-full px-2 py-1 mt-1 text-sm text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm md:px-4 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-md">
                    Batal
                </button>
                <span class="flex-grow"></span>
                @if ($record && !empty($record['id']))
                <button type="button"
                    wire:click="delete()"
                    tabindex="-1"
                    class="inline-flex justify-center w-full px-2 py-1 mt-1 text-sm text-base font-medium text-red-500 border border-red-500 rounded-md shadow-sm md:px-4 hover:text-red-700 hover:border-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-md">
                    Hapus
                </button>
                @endif
            </div>
        </x-slot>
        <!-- BODY -->
        <div class="px-2 mt-5 md:px-6 md:mt-3 md:col-span-2">
            @if ($record)
            <div class="grid grid-cols-6 gap-4">
                {{-- RECORD TYPE --}}
                <div class="col-span-6 sm:col-span-3">
                    <label for="type" class="block text-xs -mb-0.5 ml-1 font-medium text-gray-700">Jenis transaksi</label>
                    <select name="type" name="record.type" wire:model='record.type'
                        @if(!empty($record['id']))
                        disabled
                        @endif
                        class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 sm:text-sm">
                        <option hidden></option>
                        @foreach ($types as $typeKey => $type)
                        <option value="{{$typeKey}}"> {{$type}}</option>
                        @endforeach
                    </select>
                    @error("record.type")
                    <div class="absolute text-xs text-red-500">{{ $errors->first('record.type') }}</div>
                    @enderror
                </div>
                {{-- RECORD DATE --}}
                <div class="col-span-6 sm:col-span-3">
                    <label for="date" class="block text-xs -mb-0.5 ml-1 font-medium text-gray-700">Tanggal</label>
                    <input type="date" name="record.date" wire:model="record.date"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 sm:text-sm"
                    >
                    @error("record.date")
                    <div class="absolute text-xs text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                {{-- RECORD ITEMS --}}
                <div class="col-span-6">
                    @if ($record['type'] == 'PREMIUM' && !empty($record['variability']['items']))
                    <table class="text-sm text-gray-500">
                        <thead>
                            <tr class="font-semibold">
                                <th width="5px" key="prefix" class=""></th>
                                <th width="60%" key="name" class="">Premi #ID</th>
                                <th width="10%" key="quantity" class="">Qty</th>
                                <th width="10%" key="price" class="">Harga</th>
                                <th width="15%" key="total" class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($record['variability']['items'] as $key => $item)
                            <tr class="">
                                <td key="prefix" class="align-middle">
                                    <button wire:click="deleteItemPremium({{$key}})"
                                        class="p-1 mt-0.5 text-sm text-gray-300 border border-gray-300 rounded focus:outline-none focus:bg-gray-100 hover:bg-gray-100">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M20 12H4" />
                                        </svg>
                                    </button>
                                </td>
                                <td key="premium_code">
                                    <div
                                        @if($errors->has("record.variability.items.$key.premium_code"))
                                        class="mt-0.5 border border-red-500 rounded shadow-sm focus:outline-none focus:border-red-500 focus:ring-red-500 sm:text-sm"
                                        @else
                                        class="mt-0.5 border border-gray-300 rounded shadow-sm focus:outline-none focus:border-blue-500 sm:text-sm"
                                        @endif
                                    >
                                        <livewire:app-select-premium :key="$key"
                                            model="record.variability.items.{{$key}}.premium_code"
                                            :define="$item['premium_code']"
                                            option-value="code"
                                            option-label="option_member_names"
                                            emit-up="transaction.form.setItemPremium"
                                            class="block w-full border-0 focus:ring-transparent focus:outline-none sm:text-sm"
                                            hide-error-message
                                        />
                                        @error("record.amount")
                                        <div class="absolute text-xs text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                                <td key="quantity">
                                    <input type="number"
                                        wire:model='record.variability.items.{{$key}}.quantity'
                                        style="min-width:100px"
                                        @if($errors->has("record.variability.items.$key.quantity"))
                                        class="block w-full mt-0.5 border-red-500 rounded shadow-sm focus:outline-none focus:border-red-500 focus:ring-red-500 sm:text-sm"
                                        @else
                                        class="block w-full mt-0.5 border-gray-300 rounded shadow-sm focus:outline-none focus:border-blue-500 sm:text-sm"
                                        @endif
                                    >
                                </td>
                                <td key="price">
                                    <select
                                        wire:model='record.variability.items.{{$key}}.price'
                                        style="min-width:100px" tabindex="100"
                                        @if($errors->has("record.variability.items.$key.price"))
                                        class="block w-full mt-0.5 border-red-500 rounded shadow-sm focus:outline-none focus:border-red-300 sm:text-sm"
                                        @else
                                        class="block w-full mt-0.5 border-gray-300 rounded shadow-sm focus:outline-none focus:border-blue-500 sm:text-sm"
                                        @endif
                                    >
                                        <option hidden></option>
                                        <option value="0" hidden></option>
                                        @foreach (App\Models\Premium::COSTS as $cost)
                                        <option value="{{$cost}}">{{ number_format($cost) }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td key="subtotal">
                                    <input readonly tabindex="-1"
                                        value="{{ number_format(intval($record['variability']['items'][$key]['quantity']) * intval($record['variability']['items'][$key]['price'])) }}"
                                        name="record.variability.items.{{$key}}.subtotal"
                                        style="min-width:100px;text-align:right"
                                        class="block w-full mt-0.5 shadow-sm sm:text-sm focus:outline-none"
                                    >
                                </td>
                            </tr>
                            @endforeach
                            <tr class="">
                                <td></td>
                                <td width="40%" class="">
                                    <button
                                        wire:click="addItemPremium"
                                        class="flex px-4 py-1 text-sm text-green-500 border border-green-500 rounded focus:outline-none focus:border-opacity-50 hover:border-opacity-50">
                                        {{-- <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg> --}}
                                        <span class="">Tambahkan</span>
                                    </button>
                                </td>
                                <td width="40%" colspan="2" class="text-right">Jumlah</td>
                                <td class="20%">
                                    <input readonly tabindex="-1"
                                        value="{{
                                        number_format(collect($this->record['variability']['items'])->sum(function ($item) { return (double) intval($item['quantity']) * intval($item['price']); }))
                                        }}"
                                        style="min-width:100px;text-align:right" tabindex="100"
                                        class="block w-full mt-1 shadow-sm sm:text-sm focus:outline-none"
                                    >
                                    @error("record.amount")
                                    <div class="absolute text-xs text-red-500">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
                {{-- RECORD LABEL --}}
                <div class="col-span-6">
                    <label for="label" class="block text-xs -mb-0.5 ml-1 font-medium text-gray-700">Uraian</label>
                    <input type="text" wire:model="record.variability.label"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 sm:text-sm"
                    >
                </div>

                @if(in_array($record['type'], ['INCOME', 'EXPENSE']))
                {{-- RECORD AMOUNT --}}
                <div class="col-span-6 sm:col-span-3 sm:col-start-4">
                    <label for="label" class="block text-xs -mb-0.5 ml-1 font-medium text-gray-700">Jumlah</label>
                    <input type="text" wire:model="record.amount"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 sm:text-sm"
                    >
                </div>
                @endif
            </div>
            @endif
            <div class="mt-20 mb-10">
                @include('livewire.transaction-form-setting')
            </div>
            {{-- <code class="text-red-500">ERROR => {{json_encode($errors->toArray())}}</code> --}}
            {{-- <code>RECORD => {{json_encode($record)}}</code> --}}
        </div>
    </x-modal>
    @endif
</div>
