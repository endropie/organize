<x-website-layout>
  <div class="max-w-screen-lg px-2 pt-2 m-auto md:pt-8">
      <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="flex flex-col px-4 py-3 sm:py-5 sm:px-6 md:flex-row">
            <div class="flex-grow">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Data Informasi Anggota
                </h3>
                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    NIK {{$member->number_view}}
                </p>
            </div>
            <div class="self-center flex-none">
                @if (!$member->verified_at)
                <span class="inline-flex px-4 py-2 text-sm font-semibold leading-5 text-yellow-600 bg-yellow-100 rounded-2">
                    Menunggu verifikasi
                </span>
                @else
                <span class="inline-flex px-4 py-2 text-sm font-semibold leading-5 text-green-700 bg-green-100 rounded-2">
                    Terverikasi
                </span>
                @endif
            </div>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="px-4 py-3 bg-white sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        NIK
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$member->number_view}}
                    </dd>
                </div>
                <div class="px-4 py-3 bg-white sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        No KK
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$member->premium->number_view}}
                    </dd>
                </div>
                <div class="px-4 py-3 sm:py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Nama Lengkap
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$member->name}}
                    </dd>
                </div>
                <div class="px-4 py-3 bg-white sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Kelahiran
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$member->birth_place}} {{$member->birth_date}}
                    </dd>
                </div>
                <div class="px-4 py-3 sm:py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Kelamin
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$member->gender_view}}
                    </dd>
                </div>
                <div class="px-4 py-3 bg-white sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Kontak
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$member->contact_view}}
                    </dd>
                </div>
                <div class="px-4 py-3 sm:py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Alamat
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span style="white-space: pre-wrap">{{$member->address}}</span>
                    </dd>
                </div>
                <div class="px-4 py-3 bg-white sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Regional
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$member->premium->region->name}}
                    </dd>
                </div>
                @auth()
                @if(auth()->user()->allow('member-manager'))
                <div class="px-4 py-3 bg-white sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Gambar
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <ul class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                            <div class="flex items-center flex-1 w-0">
                                @if($member->capture_name)
                                <img  alt="" class="cover" src="{{ url('storage/register/members/'. $member->capture_name) }}">
                                @else
                                NO -IMAGE
                                @endif
                            </div>
                        </li>
                        <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                            <div class="flex items-center flex-1 w-0">
                                @if($member->premium->capture_name)
                                <img  alt="" class="cover" src="{{ url('storage/register/premiums/'. $member->premium->capture_name) }}">
                                @else
                                NO -IMAGE
                                @endif
                            </div>
                        </li>
                        </ul>
                    </dd>
                </div>
                @endif
                @endauth
            </dl>
        </div>
    </div>

  </div>

</x-website-layout>
