<aside class="z-20 !h-[calc(100vh-74px)] w-64 overflow-y-auto  bg-white dark:bg-gray-800 flex-shrink-0 md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu" style="display: none;">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <div class="flex justify-center">
            @include('components.application-logo')
        </div>
        <ul class="mt-6">
            @foreach (config('sidebar') as $item => $route)
                @if ($route->hasSubMenu)
                    <li class="relative px-6 py-3" x-data="{ open: false }">
                        <button
                            class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            @click="open = !open" aria-haspopup="true">
                            <span class="inline-flex items-center">
                                {!! $route->icon !!}
                                <span class="mx-4">@__($item)</span>
                            </span>
                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul x-show="open"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu">
                            @foreach ($route->submenu as $name => $route)
                                <li
                                    class="pl-10 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full text-gray-500 transition-colors duration-150 hover:text-gray-800 font-bold"
                                        href="
                                        @php

                                        if(isset($route->params)){
                                                echo route($route->name, [$route->params['key'] => \App\Models\Page::find($route->params['value'])]);
                                            }else{
                                                echo route($route->name);
                                            } 
                                        @endphp
                                ">
                                        <span class="inline-flex items-center">
                                            {!! $route->icon !!}
                                            <span class="mx-4">@__($name)</span>
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="relative px-6 py-3">
                        @if (request()->routeIs($route->name))
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"></span>
                        @endif
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150  {{ request()->routeIs($route->name) ? 'hover:text-primary-dark text-primary dark:hover:text-gray-200 dark:text-gray-100' : ' hover:text-gray-800 text-gray-600 dark:hover:text-gray-200 dark:text-gray-100' }}"
                            href="{{ route($route->name) }}">
                            {!! Blade::render($route->icon) !!}
                            <span class="mx-4">{{ $item }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</aside>
