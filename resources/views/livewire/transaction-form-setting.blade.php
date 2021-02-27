
@if (in_array($record['type'], ['PREMIUM', 'INCOME', 'EXPENSE']))
<div x-show="setting" class="flex flex-col gap-1 pt-1 pb-4 border divide-y rounded">
    <div class="px-4">Pengaturan Akun</div>
    <div class="flex flex-col gap-2 px-4">
        <div class="flex-auto">
            <label class="text-xs">{{$record['type'] == 'EXPENSE' ? 'Akun Pengeluaran' : 'Akun Pemasukan'}}</label>
            <select wire:model.lazy="setup.{{$record['type']}}.CREDIT"
                class="block w-full -ml-1 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @foreach (($record['type'] == 'EXPENSE' ? $asset_ledgers : $income_ledgers) as $ledger)
                <option value="{{$ledger->code}}">{{$ledger->code}} - {{$ledger->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-auto">
            <label class="text-xs ">Terhadap </label>
            <select wire:model.lazy="setup.{{$record['type']}}.DEBIT"
                class="block w-full -ml-1 border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @foreach (($record['type'] == 'EXPENSE' ? $expense_ledgers : $asset_ledgers) as $ledger)
                <option value="{{$ledger->code}}">{{$ledger->code}} - {{$ledger->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@endif
