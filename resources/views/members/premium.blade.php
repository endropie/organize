@section('title', 'Data Anggota IK2T - KP Tanjuang')
@section('description', 'Data anggota IK2T Kampuang tanjuang, IV koto Aur Malintang. kab Padang pariaman.')

<x-website-layout>
  <div class="max-w-screen-lg px-2 pt-2 m-auto md:pt-8"
    x-data="{ tab: 'members' }"
  >
    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="flex flex-col px-4 py-5 sm:px-6 md:flex-row">
            <div class="flex-grow">
                <h3 class="text-lg font-medium leading-6 text-gray-900 uppercase">
                    Kartu Keluarga
                </h3>
                <p class="max-w-2xl mt-1 text-sm text-gray-500 uppercase">
                    ID: {{$premium->code}}<br/>
                    No: {{$premium->number_view}}<br/>
                    {{$premium->region->name}}
                </p>
            </div>
            <div class="self-center flex-none mt-1">
                <livewire:premium-verified :premium="$premium" />
            </div>
        </div>
        <div class="flex flex-row text-gray-600 uppercase">
            <button
                x-bind:class="{'bg-gray-400 text-white': tab !== 'members', 'cursor-default': tab === 'members'}"
                x-on:click="tab = 'members'"
                class="flex-grow py-2 font-light text-center uppercase border-2 border-gray-400 focus:outline-none">
                Anggota
            </button>
            <button
                x-bind:class="{'bg-gray-400 text-white': tab !== 'premiables', 'cursor-default': tab === 'premiables'}"
                x-on:click="tab = 'premiables'"
                class="flex-grow py-2 font-light text-center uppercase border-2 border-gray-400 focus:outline-none">
                Iuran Wajib
            </button>
        </div>
        <div class="flex flex-col">
            <table x-show="tab === 'members'" class="divide-y divide-gray-200 sm:divide-none">
                <thead class="bg-gray-50">
                    <tr class="hidden sm:table-row">
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Nama
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Kontak
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Keanggotaan
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                        Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($premium->members as $member)
                    <tr member-id="{{$member->id}}" class="table-row border-none sm:hidden"
                        onclick="window.location.href ='{{ route('members.premium', ['premium' => $member->premium->id]) }}' "
                    >
                        <td colspan="100%" style="border: none">
                            <div class="my-1 border-gray-200 rounded shadow-md">
                                <dl>
                                    <div class="px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            NIK
                                        </dt>
                                        <dd class="-mt-1 text-gray-900 text-md sm:mt-0 sm:col-span-2">
                                            {{$member->number_view}}
                                        </dd>
                                    </div>
                                    <div class="px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Nama Lengkap
                                        </dt>
                                        <dd class="-mt-1 text-gray-900 text-md sm:mt-0 sm:col-span-2">
                                            {{$member->name}} ({{$member->age}})
                                        </dd>
                                    </div>
                                    <div class="px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Kontak
                                        </dt>
                                        <dd class="-mt-1 text-gray-900 text-md sm:mt-0 sm:col-span-2">
                                            {{$member->contact_view}}
                                        </dd>
                                    </div>
                                    <div class="px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Keanggotaan
                                        </dt>
                                        <dd class="-mt-1 text-gray-900 text-md sm:mt-0 sm:col-span-2">
                                            {{$member->relate}}
                                        </dd>
                                    </div>
                                    <div class="px-4 py-1 text-center">
                                        <livewire:member-verified :member="$member" />
                                    </div>
                                </dl>
                            </div>
                        </td>
                    </tr>
                    <tr member-id="{{$member->id}}" class="hidden h-10 sm:table-row md:h-12">
                        <td class="px-3 md:px-6 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 hidden w-10 h-10 mr-4">
                                <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                            </div>
                            <div class="">
                                <div class="text-sm font-medium text-gray-900">
                                    {{strtoupper($member->name)}} ({{$member->age}})
                                </div>
                                <div class="-mt-1 text-xs text-gray-500">
                                    NIK {{$member->number_view}}
                                </div>
                            </div>
                        </div>
                        </td>
                        <td class="px-3 md:px-6 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$member->contact_view}}</div>
                        </td>
                        <td class="px-3 md:px-6 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{strtoupper($member->gender_view)}}</div>
                        </td>
                        <td class="px-3 md:px-6 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$member->relate}}</div>
                        </td>
                        <td class="px-3 text-sm font-medium text-center md:px-6 whitespace-nowrap">
                            {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                            <livewire:member-verified :member="$member" />
                        </td>
                    </tr>
                    @endforeach

                <!-- More items... -->
                    <tr class="h-10 md:h-12">
                        <td colspan="100%" class="px-3 md:px-6 whitespace-nowrap">
                            <a href="{{route('members.register')}}?premium={{$premium->id}}" class="w-full px-4 py-2 text-sm text-blue-100 bg-blue-700 rounded focus:outline-none focus:bg-blue-400 hover:bg-blue-400">
                                Tambahkan Anggota
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div x-show="tab === 'premiables'">
                <livewire:premiables :premium="$premium">
            </div>
            <div x-show="tab === 'others'" class="h-40">

            </div>
        </div>
    </div>
</div>

</x-website-layout>
