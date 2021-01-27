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
                <div class="px-4 py-3 bg-white sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Gambar
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <ul class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                        <div class="flex items-center flex-1 w-0">
                        <!-- Heroicon name: paper-clip -->
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                        </svg>
                        <span class="flex-1 w-0 ml-2 truncate">
                            resume_back_end_developer.pdf
                        </span>
                        </div>
                        <div class="flex-shrink-0 ml-4">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Download
                        </a>
                        </div>
                    </li>
                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                        <div class="flex items-center flex-1 w-0">
                        <!-- Heroicon name: paper-clip -->
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                        </svg>
                        <span class="flex-1 w-0 ml-2 truncate">
                            coverletter_back_end_developer.pdf
                        </span>
                        </div>
                        <div class="flex-shrink-0 ml-4">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Download
                        </a>
                        </div>
                    </li>
                    </ul>
                </dd>
                </div>
            </dl>
        </div>
    </div>

  </div>

</x-website-layout>
