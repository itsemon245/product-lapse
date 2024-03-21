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
        @include('layouts.admin.sidebar')

    </div>
</aside>
