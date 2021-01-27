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
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
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
                                    Regional
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Anggota
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
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
                                <tr member-id="{{$member->id}}" class="table-row sm:hidden">
                                    <td colspan="100%">
                                        <a href="{{route('members.show', ['member' => $member->id])}}" class="border-t border-gray-200">
                                            <dl>
                                                <div class="px-4 py-3 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        NIK
                                                    </dt>
                                                    <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$member->number_view}}
                                                    </dd>
                                                </div>
                                                <div class="px-4 py-3 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        No KK
                                                    </dt>
                                                    <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$member->premium->number_view}}
                                                    </dd>
                                                </div>
                                                <div class="px-4 py-3 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Nama Lengkap
                                                    </dt>
                                                    <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$member->name}}
                                                    </dd>
                                                </div>
                                                <div class="px-4 py-3 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Kelahiran
                                                    </dt>
                                                    <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$member->birth_place}} {{$member->birth_date}}
                                                    </dd>
                                                </div>
                                                <div class="px-4 py-3 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Kontak
                                                    </dt>
                                                    <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$member->contact_view}}
                                                    </dd>
                                                </div>
                                                <div class="px-4 py-3 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                    <dt class="text-sm font-medium text-gray-500">
                                                        Regional
                                                    </dt>
                                                    <dd class="-mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                        {{$member->premium->region->name}}
                                                    </dd>
                                                </div>
                                            </dl>
                                        </a>
                                    </td>
                                </tr>
                                <tr member-id="{{$member->id}}" class="hidden sm:table-row">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{route('members.show', ['member' => $member->id])}}" class="flex items-center">
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
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{route('members.premium', ['id' => $member->premium->id])}}" class="">
                                            <div class="text-sm text-gray-900">{{$member->premium->number_view}}</div>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$member->contact_view}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{strtoupper($member->premium->region->name)}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$member->relate}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">

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
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="100%">
                                        <x-pagination :paginator="$members"></x-pagination>
                                    </td>
                                </tr>
                            <!-- More items... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

</x-website-layout>
