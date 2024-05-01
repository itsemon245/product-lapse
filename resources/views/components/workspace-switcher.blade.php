@auth
    @if (auth()->user()->type != 'admin')
        @php
            $mainAccount = auth()->user()->main_account_id != null ? auth()->user()->mainAccount : auth()->user();
            $workspaces = $mainAccount?->workspaces;
        @endphp
        @if ($workspaces?->count() > 0)
            <div class="inline-flex">
                <div role="button" id="states-button" data-dropdown-toggle="dropdown-states"
                    class="flex-shrink-0 z-10 inline-flex gap-2 items-center py-2.5 text-sm font-medium " type="button">
                    <div class="!text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5 21q-.825 0-1.412-.587T3 19v-6.25h7V21zm7 0v-8.25h9V19q0 .825-.587 1.413T19 21zM3 10.75V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v5.75z" />
                        </svg>
                    </div>
                    <div class="text-start leading-tight">
                        <div>@lang('Workspace')</div>
                        {{-- <div>
                            <small class="!text-green-500 font-bold">{{ auth()->user()->getRole()->name }}</small>
                        </div> --}}
                        <small class="!text-primary font-bold">{{ auth()->user()->activeWorkspaceName() }}</small>
                    </div>
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </div>
                <div id="dropdown-states"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-max dark:bg-gray-700">
                    <ul class=" mb-0 py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="states-button">
                        <li>
                            <form method="POST" action="{{ route('workspace.change', ['user' => $mainAccount]) }}">
                                @csrf
                                <button type="submit"
                                    class="inline-flex w-full px-4 py-2 text-sm text-gray-700 {{ auth()->id() == $mainAccount->id ? 'bg-gray-100' : '' }} hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <div class="inline-flex items-center gap-2">
                                        <img class="w-6 h-6 rounded-full"
                                            src="{{ $mainAccount?->image->url ?? avatar($mainAccount->name) }}"
                                            alt="{{ $mainAccount->first_name . "'s avatar" }}">
                                        <div class="text-start leading-tight">
                                            <div>
                                                <span>{{ $mainAccount->first_name }}</span>
                                                <span class="max-sm:hidden">{{ $mainAccount->last_name }}</span>
                                            </div>
                                            <small
                                                class="!text-primary font-bold">{{ $mainAccount->activeWorkspaceName() }}</small>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </li>
                        @forelse ($workspaces as $workspace)
                            <li>
                                <form method="POST" action="{{ route('workspace.change', ['user' => $workspace]) }}">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex w-full px-4 py-2 text-sm text-gray-700 {{ auth()->id() == $workspace->id ? 'bg-gray-100' : '' }} hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <div class="inline-flex items-center gap-2">
                                            <img class="w-6 h-6 rounded-full"
                                                src="{{ $workspace?->image->url ?? avatar($workspace?->name) }}"
                                                alt="{{ $workspace?->first_name . "'s avatar" }}">
                                            <div class="text-start leading-tight">
                                                <div>{{ $workspace->name }}</div>
                                                <small
                                                    class="!text-primary font-bold">{{ $workspace->activeWorkspaceName() }}</small>
                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        @endif
    @endif
@endauth
