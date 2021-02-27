
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="sticky top-0 z-20"
    x-data="{
        usermenu: false,
        mainmenu: false
    }"
>
    <nav class="bg-gray-800">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center flex-grow">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                    </div>
                    {{-- WEB MENUS --}}
                    <div class="hidden md:block">
                        <div class="flex items-baseline ml-10 space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            @foreach($menus as  $menu)
                            @if (!$menu['hidden'])
                            <a
                                @if($menu['link']) href="{{$menu['link']}}" @endif
                                x-bind:class="{ 'bg-gray-900 text-white': {{($menu["visited"] ?? null) ? "true" : "false"}} }"
                                class="px-3 py-2 text-sm font-medium text-gray-100 rounded-md">
                                {{ strtoupper($menu['name']) }}
                            </a>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- SHARE --}}
                <div class="flex items-baseline px-4 space-x-4">
                    <a class="block text-base font-medium text-white rounded-md hover:text-blue-400"  data-tippy-content="@twitter_handle" href="https://twitter.com/intent/tweet?url=#">
                        <svg class="h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path d="M30.063 7.313c-.813 1.125-1.75 2.125-2.875 2.938v.75c0 1.563-.188 3.125-.688 4.625a15.088 15.088 0 0 1-2.063 4.438c-.875 1.438-2 2.688-3.25 3.813a15.015 15.015 0 0 1-4.625 2.563c-1.813.688-3.75 1-5.75 1-3.25 0-6.188-.875-8.875-2.625.438.063.875.125 1.375.125 2.688 0 5.063-.875 7.188-2.5-1.25 0-2.375-.375-3.375-1.125s-1.688-1.688-2.063-2.875c.438.063.813.125 1.125.125.5 0 1-.063 1.5-.25-1.313-.25-2.438-.938-3.313-1.938a5.673 5.673 0 0 1-1.313-3.688v-.063c.813.438 1.688.688 2.625.688a5.228 5.228 0 0 1-1.875-2c-.5-.875-.688-1.813-.688-2.75 0-1.063.25-2.063.75-2.938 1.438 1.75 3.188 3.188 5.25 4.25s4.313 1.688 6.688 1.813a5.579 5.579 0 0 1 1.5-5.438c1.125-1.125 2.5-1.688 4.125-1.688s3.063.625 4.188 1.813a11.48 11.48 0 0 0 3.688-1.375c-.438 1.375-1.313 2.438-2.563 3.188 1.125-.125 2.188-.438 3.313-.875z"></path>
                        </svg>
                    </a>

                    <a class="block text-base font-medium text-white rounded-md hover:text-blue-600"   data-tippy-content="#facebook_id" href="https://www.facebook.com/sharer/sharer.php?u=#">
                        <svg class="h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            <path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z"></path>
                        </svg>
                    </a>
                </div>
                @auth
                <div class="hidden md:block">
                    <div class="flex items-center ml-4 md:ml-6">
                    {{-- <button class="p-1 text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: bell -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button> --}}

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                        <button class="flex items-center max-w-xs text-sm bg-gray-800 rounded-full focus:outline-none ring-2 ring-offset-2 ring-offset-gray-800 ring-white" id="user-menu" aria-haspopup="true"
                            x-on:click="usermenu = !usermenu"
                        >
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->avatar }}" alt="">
                        </button>
                        </div>
                        <div x-show="usermenu" style="display:none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu"
                            class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                        >
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>

                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                                href="{{route('logout')}}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                @else
                <a class="hidden p-1 px-2 text-base font-medium text-white border-2 border-white rounded-md outline-none md:block hover:border-gray-500 hover:text-gray-500" href="{{route('login')}}">
                    SIGN IN
                </a>
                @endauth
                <div class="flex -mr-2 md:hidden">
                    <!-- Mobile menu button -->
                    <button
                        x-on:click="mainmenu = !mainmenu"
                        class="inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                    >
                    <span class="sr-only">Open main menu</span>
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, toggle classes based on menu state. -->
        <!-- Open: "block", closed: "hidden" -->
        <div x-show="mainmenu" style="display: none" class="md:hidden"
            x-transition:enter="transition origin-top-right ease-out duration-500"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition origin-top-right duration-500"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
        >
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                @foreach($menus as  $menu)
                @if (!($menu['hidden'] ?: null))

                <a
                    @if($menu["visited"] ?? null)
                    class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md"
                    @else
                    @if($menu['link']) href="{{ $menu['link'] }}" @endif
                    class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                    @endif
                    >
                    {{ $menu['name'] }}

                </a>
                @endif
                @endforeach
            </div>

            <div class="pt-4 pb-3 border-t border-gray-700">
                @auth
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->avatar }}" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                    <button class="flex-shrink-0 p-1 ml-auto text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: bell -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                </div>
                <div class="px-2 mt-3 space-y-1">
                    <a href="#" class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700">Your Profile</a>

                    <a href="#" class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700">Settings</a>

                    <a href="#" class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:text-white hover:bg-gray-700">Sign out</a>
                </div>
                @else

                <div class="flex items-center px-5">
                    <a href="{{ route('login') }}" class="flex flex-row flex-shrink-0 p-1 ml-auto text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <!-- Heroicon name: login -->
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            {{-- <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /> --}}
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span class="pl-2">SIGN IN</span>
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <header class="hidden bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">
            Dashboard
            </h1>
        </div>
    </header>
</div>
