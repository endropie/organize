<div class="fixed inset-0 z-40 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            @if ($prop['persistent'])
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            @else
            <div class="absolute inset-0 bg-gray-500 opacity-75" wire:click='offsetClick'></div>
            @endif

            {{-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span> --}}
            <div role="dialog" aria-modal="true" aria-labelledby="modal-headline"

            @if($prop['fullscreen'])
            class="w-full h-full overflow-hidden text-left transition-all transform bg-white"
            @else
            class="w-full h-full mx-auto my-auto overflow-auto text-left align-bottom transition-all transform bg-white shadow-xl md:my-10 lg:my-12 md:h-5/6 md:align-middle sm:max-w-screen-md md:rounded-lg md:max-w-screen-sm lg:max-w-screen-md xl:max-w-sceen-lg"
            @endif
                >
                <div class="flex flex-col w-full h-full">
                    @if (!empty($header))
                    <div class="sticky top-0 py-1 bg-white border-b">{{$header}}</div>
                    @endif
                    <div class="flex-grow">
                        <div class="h-full overflow-auto">
                            {{ $slot }}
                        </div>
                    </div>
                    @if (!empty($footer))
                    <div class="sticky bottom-0 py-1 bg-white">{{$footer}}</div>
                    @endif
                </div>
            </div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        {{-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span> --}}
    </div>
</div>
