<aside
    class="fixed h-screen inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-scroll bg-white dark:bg-gray-800 md:hidden"
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
                <li class="relative px-6 py-3">
                    @if (request()->routeIs($route->name))
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                            aria-hidden="true"></span>
                    @endif
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150  {{ request()->routeIs($route->name) ? 'hover:text-primary-dark text-primary dark:hover:text-gray-200 dark:text-gray-100' : ' hover:text-gray-800 text-gray-600 dark:hover:text-gray-200 dark:text-gray-100' }}"
                        href="{{ route($route->name) }}">
                        {!! Blade::render($route->icon) !!}
                        <span class="ml-4">{{ $item }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
