@section('title', 'Daftar Anggota IK2T - KP Tanjuang')
@section('description', 'Daftar anggota IK2T Kampuang tanjuang, IV koto Aur Malintang. kab Padang pariaman.')

<x-website-layout>
    <div class="max-w-screen-lg px-2 pt-2 m-auto md:pt-8">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="flex flex-row px-4 py-5 sm:px-6">
                <div class="flex-grow">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 uppercase">
                        IK2T Anggota
                    </h3>
                    <p class="max-w-2xl text-sm text-gray-500">
                        Data Personal anggota.
                    </p>
                </div>
                <div>
                    <a href="{{route('members.register')}}" class="px-4 py-2 text-blue-100 bg-blue-700 rounded focus:outline-none focus:bg-blue-400 hover:bg-blue-400">
                        Daftar
                    </a>
                </div>
            </div>
            <div class="flex flex-col">
                <table class="divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr class="hidden sm:table-row">
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Nama
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            No KK
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Kontak
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Anggota
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                            Status
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                            {{-- <span class="sr-only">Edit</span> --}}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if(!$members->count())
                            <tr>
                                <td colspan="100%" class="p-4 italic font-light text-center text-gray-500">
                                    Data tidak ditemukan!
                                </td>
                            </tr>
                        @endif
                        @foreach ($members as $member)
                        <tr member-id="{{$member->id}}" class="table-row border-none cursor-pointer sm:hidden"
                            onclick="window.location.href ='{{ route('members.premium', ['premium' => $member->premium->id]) }}' "
                        >
                            <td colspan="100%" style="border: none">
                                <div class="my-1 border-gray-200 rounded shadow-md">
                                    <dl>
                                        <div class="px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="flex flex-row text-sm font-medium text-gray-900">
                                                NIK {{$member->number_view}}
                                                <span class="flex-grow"></span>
                                                @if ($member->verified_at)
                                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                    Active
                                                </span>
                                                @else
                                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                    Non-Active
                                                </span>
                                                @endif
                                            </dt>
                                            <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                ID {{$member->premium->code}}
                                            </dd>
                                        </div>
                                        <div class="px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Nama Lengkap
                                            </dt>
                                            <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$member->name}} ({{$member->age}})
                                            </dd>
                                        </div>
                                        <div class="px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Kontak
                                            </dt>
                                            <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$member->contact_view}}
                                            </dd>
                                        </div>
                                        <div class="px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Regional
                                            </dt>
                                            <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{$member->premium->region->name}}
                                            </dd>
                                        </div>
                                        <div class="px-4 py-1 text-center">

                                        </div>
                                    </dl>
                                </div>
                            </td>
                        </tr>
                        <tr member-id="{{$member->id}}" class="hidden h-10 cursor-pointer sm:table-row md:h-12"
                            onclick="window.location.href ='{{ route('members.premium', ['premium' => $member->premium->id]) }}' "
                        >
                            <td class="px-3 md:px-6 whitespace-nowrap">
                                <div href="{{route('members.show', ['member' => $member->id])}}" class="flex items-center">
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
                                <div href="{{route('members.premium', ['premium' => $member->premium->id])}}" class="flex items-center">
                                    <div class="flex-shrink-0 hidden w-10 h-10 mr-4">
                                        <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                    </div>
                                    <div class="">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{strtoupper($member->premium->code)}}
                                        </div>
                                        <div class="-mt-1 text-xs text-gray-500">
                                            Regional {{$member->premium->region->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 md:px-6 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$member->contact_view}}</div>
                            </td>
                            <td class="px-3 md:px-6 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$member->relate}}</div>
                            </td>
                            <td class="px-3 text-center md:px-6 whitespace-nowrap">

                                @if ($member->verified_at)
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                    Active
                                </span>
                                @else
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                    Non-Active
                                </span>
                                @endif

                            </td>
                            <td class="px-3 text-sm font-medium text-right md:px-6 whitespace-nowrap">
                                {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                            </td>
                        </tr>
                        @endforeach
                        <!-- More items... -->
                    </tbody>
                    <tfoot class="">
                        <tr>
                            <td colspan="100%">
                                <x-pagination :paginator="$members"></x-pagination>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</x-website-layout>
