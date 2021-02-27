<div class="flex flex-auto h-full">
    <div class="flex flex-col flex-auto overflow-hidden bg-white rounded shadow-md bg-card">
        <div class="flex flex-col p-6 pb-6 pr-4">
            <div class="flex flex-col justify-between items-between md:flex-row">
                <div class="flex flex-col">
                    <div class="mr-4 font-bold tracking-wider uppercase text-md ">
                        Iuaran Wajib Anggota
                    </div>
                    <div class="text-sm font-medium text-hint">
                        Persentase Pembayaran Iuran dalam kategori
                    </div>
                </div>
                <div>
                    <button aria-haspopup="true" class="h-8 mat-focus-indicator mat-menu-trigger min-h-8 mat-button mat-button-base">
                        {{now()->isoFormat('MMMM Y') }}
                    </button>
                </div>
            </div>
            <div class="flex flex-col w-full gap-2 mt-6 mr-2 text-center md:text-left md:gap-5 md:flex-row">
                <div class="flex flex-col flex-auto mb-6">
                    <div class="mb-1 text-5xl tracking-tighter md:text-5xl">
                        {{ number_format($persentase[1]) }}%
                    </div>
                    <div class="text-sm font-medium leading-none ">
                        Persentase (Kategori I)
                    </div>
                    <div class="mt-5 text-3xl font-semibold leading-none xl:text-4xl lg:text-xl">
                        IDR {{number_format($summary[1])}}
                    </div>
                </div>
                <div class="flex flex-col flex-auto mb-6">
                    <div class="mb-1 text-5xl tracking-tighter md:text-5xl">
                        {{ number_format($persentase[2]) }}%
                    </div>
                    <div class="text-sm font-medium leading-none ">
                        Persentase (Kategori II)
                    </div>
                    <div class="mt-5 text-3xl font-semibold leading-none xl:text-4xl lg:text-xl">
                        IDR {{number_format($summary[2])}}
                    </div>
                </div>
                <div class="flex flex-col flex-auto mb-6">
                    <div class="mb-1 text-5xl tracking-tighter md:text-5xl">
                        {{ number_format($persentase[3]) }}%
                    </div>
                    <div class="text-sm font-medium leading-none ">
                        Persentase (Kategori III)
                    </div>
                    <div class="mt-5 text-3xl font-semibold leading-none xl:text-4xl lg:text-xl">
                        IDR {{number_format($summary[3])}}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-auto">
            {{-- [GRAFIK] --}}
        </div>
    </div>
</div>
