<div class="flex items-center justify-center min-h-screen px-5 pt-16 pb-10 min-w-screen">
    <div class="w-full p-5 mx-auto text-gray-900 bg-gray-300 rounded-lg shadow-lg" style="max-width: 600px">
        <div class="w-full pt-1 pb-5">
            <div class="flex items-center justify-center w-20 h-20 mx-auto -mt-16 overflow-hidden text-white bg-red-500 rounded-full shadow-lg">
                <i class="text-3xl mdi mdi-credit-card-outline"></i>
            </div>
        </div>
        <div class="mb-10">
            <h1 class="text-xl font-bold text-center uppercase">Pendaftaran Anggota</h1>
        </div>
        {{-- NO KK & REGION --}}
        <div class="flex flex-col gap-2 mb-3 md:flex-row">
            <div class="flex-grow">
                <label class="mb-2 ml-1 text-sm font-bold">
                    No. KK
                    @if($premium) <span class="text-green-700">[Terdaftar]</span> @endif
                </label>
                <div>
                    @if($additional)
                    <input value="{{ $premium->number_view }}"
                        disabled style="color:#777"
                        placeholder="00000-000000-0000" type="number"
                        class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md focus:outline-none focus:border-blue-500"
                    />
                    @else
                    <input wire:model="record.premium.number" wire:change="changedPremium"
                        placeholder="00000-000000-0000" type="number"
                        class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md no-spin focus:outline-none focus:border-blue-500"
                    />
                    @endif
                </div>
                @error('record.premium.number')
                <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                    {{$errors->first('record.premium.number')}}
                </div>
                @enderror
            </div>
            <div class="flex-grow">
                <label class="mb-2 ml-1 text-sm font-bold">Regional</label>
                <div>
                    <select wire:model="record.premium.region_id"
                        @if($this->premium) disabled @endif
                        class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md cursor-pointer form-select focus:outline-none focus:border-blue-500"
                    >
                        <option class="hidden"></option>
                        @foreach($region_options as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('record.premium.region_id')
                <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                    {{$errors->first('record.premium.region_id')}}
                </div>
                @enderror
            </div>
        </div>
        {{-- NO NIK --}}
        <div class="mb-3">
            <label class="mb-2 ml-1 text-sm font-bold">No. NIK</label>
            <div>
                <input wire:model="record.number" title="NIK"
                    placeholder="00000-000000-0000" type="number"
                    class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md no-spin focus:outline-none focus:border-blue-500"
                />
            </div>
            @error('record.number')
            <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                {{$errors->first('record.number')}}
            </div>
            @enderror
        </div>
        {{-- NAMA --}}
        <div class="mb-3">
            <label class="mb-2 ml-1 text-sm font-bold">Nama Anda</label>
            <div>
                <input wire:model="record.name" class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md focus:outline-none focus:border-blue-500" placeholder="Nama Anda" type="text"/>
            </div>
            @error('record.name')
            <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                {{$errors->first('record.name')}}
            </div>
            @enderror
        </div>
        {{-- GENDER --}}
        <div class="mb-3">
            <div class="flex flex-row gap-2 ml-1">
                <div class="flex-non">
                    <label for="type1" class="flex items-center cursor-pointer">
                        <input type="radio"
                            wire:click="$set('record.gender', 'MALE')" class="w-5 h-5 text-indigo-500 form-radio" name="gender"
                            @if($record['gender'] == 'MALE') checked @endif
                            >
                        <span class="ml-1.5">Pria</span>
                    </label>
                </div>
                <div class="flex-non">
                    <label for="type2" class="flex items-center cursor-pointer">
                        <input type="radio"
                            wire:click="$set('record.gender', 'FEMALE')" class="w-5 h-5 text-indigo-500 form-radio" name="gender"
                            @if($record['gender'] == 'FEMALE') checked @endif
                        >
                        <span class="ml-1.5">Wanita</span>
                    </label>
                </div>
            </div>
            <div>
            @error('record.gender')
            <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                {{$errors->first('record.gender')}}
            </div>
            @enderror
            </div>
        </div>
        {{-- BIRTH --}}
        <div class="flex flex-col gap-2 mb-3 md:flex-row">
            <div class="flex-grow">
                <label class="mb-2 ml-1 text-sm font-bold">Kelahiran</label>
                <div>
                    <input wire:model="record.birth_place" class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md focus:outline-none focus:border-blue-500" placeholder="Tempat lahir" type="text"/>
                </div>
                @error('record.birth_place')
                <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                    {{$errors->first('record.birth_place')}}
                </div>
                @enderror
            </div>
            <div class="flex-grow">
                <label class="mb-2 ml-1 text-sm font-bold">Tanggal Lahir</label>
                <div>
                    <input wire:model="record.birth_date" class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md focus:outline-none focus:border-blue-500" type="date"/>
                </div>
                @error('record.birth_date')
                <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                    {{$errors->first('record.birth_date')}}
                </div>
                @enderror
            </div>
        </div>
        {{-- PHONE --}}
        <div class="mb-3">
            <label class="mb-2 ml-1 text-sm font-bold">No. Kontak (WA)</label>
            <div class="flex flex-row">
                <select wire:model="record.contact_code" class="flex-none px-2 py-2 pr-4 mb-1 text-sm transition-colors border-2 border-gray-200 rounded-md rounded-r-none cursor-pointer form-select focus:outline-none focus:border-blue-500">
                    <option class="hidden"></option>
                    @foreach($phone_codes as $code)
                    <option value="{{$code->phonecode}}">{{$code->phonecode}} <span class="hidden md:block"></span> </option>
                    @endforeach
                </select>
                <input wire:model="record.contact" class="flex-grow px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md rounded-l-none no-spin focus:outline-none focus:border-blue-500" placeholder="08XX XXXX XXXX" type="number"/>
            </div>
            @if($errors->first('record.contact') || $errors->first('record.contact_code'))
            <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                {{$errors->first('record.contact') ?? $errors->first('record.contact_code') }}
            </div>
            @endif
        </div>

        {{-- ADDRESS --}}
        <div class="mb-3">
            <label class="mb-2 ml-1 text-sm font-bold">Alamat Lengkap</label>
            <div>
                <textarea wire:model="record.address" class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md focus:outline-none focus:border-blue-500" placeholder="Alamat legkap"></textarea>
            </div>
            @error('record.address')
            <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                {{$errors->first('record.address')}}
            </div>
            @enderror
        </div>

        {{-- RELATE  --}}
        <div class="mb-3">
            <label class="mb-2 ml-1 text-sm font-bold">Keanggotaan</label>
            <div>
                <select wire:model="record.relate" class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md cursor-pointer form-select focus:outline-none focus:border-blue-500">

                    <option class="hidden"></option>
                    @foreach($relate_options as $relate)
                    <option value="{{$relate}}">{{ucfirst(strtolower($relate))}}</option>
                    @endforeach
                </select>
                @error('record.relate')
                <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                    {{$errors->first('record.relate')}}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="mb-2 ml-1 text-sm font-bold">Gambar KTP</label>
            @error('photo_member')
            <div class="ml-1 -mt-1 text-sm font-thin text-red-500">
                {{$errors->first('photo_member')}}
            </div>
            @enderror
            <div class="relative">

                <div onclick="document.getElementById('photo_member').click()"
                    class="flex justify-center px-6 pt-5 pb-6 mt-2 border-2 border-gray-100 border-dashed rounded-md cursor-pointer focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 focus-within:border-transparent"
                >

                    @if ($photo_member)
                    <img src="{{$photo_member->temporaryUrl()}}" class="cover" />
                    @endif
                    <div class="space-y-1 text-center" @if ($photo_member) style="display:none" @endif>
                        <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="photo_member" class="relative font-medium cursor-pointer focus-within:outline-none">
                                <span>AMBIL GAMBAR KK</span>
                                <input type="file" id="photo_member" wire:model="photo_member" class="sr-only" accept="image/*;capture=camera">
                            </label>
                            {{-- <p class="pl-1">or drag and drop</p> --}}
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                <div class="absolute top-0 items-center w-full h-full p-1 " wire:loading wire:target="photo_member">
                    <div class="flex flex-col items-center justify-center w-full h-full text-gray-600 bg-gray-400 rounded bg-opacity-90">
                        <span class="uppercase text-bold">loading..</span>
                        <svg class="w-12 h-12 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-10"></div>
        <div>
            <button
                wire:click="save"
                class="block w-full max-w-xs px-3 py-3 mx-auto font-semibold text-white bg-green-600 rounded-lg hover:bg-green-500 focus:bg-green-500 focus:outline-none"><i class="mr-1 mdi mdi-lock-outline"
            ></i> DAFTARKAN </button>
        </div>
    </div>
</div>
