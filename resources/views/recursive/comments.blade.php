@foreach ($comments as $comment)
    @can('update delivery')
        <li class="post_comment">
            <div x-data="{ show: false }">
                <div class="media post_author mt_60 pb-2">
                    <div class="media-left">
                        <img class="rounded-circle" src="{{ $comment->user->image->url ?? favicon() }}"
                            style="object-fit: cover;" alt="">
                        <button class="replay" @click="show=!show"><i class="ti-share"></i></button>
                    </div>

                    <div class="media-body !border-b-0 pb-0">
                        <div class="flex items-center gap-3">
                            <h5 class=" t_color3 f_size_18 f_500">{{ $comment->user->name }}</h5>
                            @if ($comment->status == 'pending')
                                <div class="btn_hover agency_banner_btn btn-bg px-3 max-sm:p-2 btn-table !flex items-center gap-1"
                                    title="@__('feature/delivery.pending')" type="submit">
                                    <span class="ti-timer"></span>
                                    <div class="max-sm:hidden">@__('feature/delivery.pending')</div>
                                </div>
                            @endif
                            @if (str(get_class($model))->contains('Delivery'))
                                @can('update delivery')
                                    <div class="flex items-center gap-2">
                                        <form
                                            action="{{ route('comment.status', ['comment' => $comment, 'status' => 'agreed']) }}"
                                            method="post">
                                            @csrf
                                            <button
                                                class="btn_hover agency_banner_btn btn-bg max-sm:p-2 btn-table btn-done !flex items-center"
                                                type="submit" @disabled($comment->status == 'agreed')>
                                                <img class="btn-img" src="/img/done.png">
                                                <div class="max-sm:hidden">@__('feature/delivery.agree')</div>
                                            </button>
                                        </form>
                                        <form
                                            action="{{ route('comment.status', ['comment' => $comment, 'status' => 'disagreed']) }}"
                                            method="post">
                                            @csrf
                                            <button
                                                class="btn_hover agency_banner_btn btn-bg max-sm:p-2 btn-table btn-cancel !flex items-center"
                                                type="submit" @disabled($comment->status == 'disagreed')>
                                                <img class="btn-img" src="/img/cancel.png">
                                                <div class="max-sm:hidden">@__('feature/delivery.disagree')</div>
                                            </button>
                                        </form>
                                    </div>
                                @endcan
                            @endif
                        </div>
                        <h6 class=" f_size_15 f_400 mb_20">{{ $comment->created_at->format('d F, Y') }}</h6>
                        <p>
                            {{ $comment->body }}
                        </p>
                    </div>
                </div>
                <div class="border-b mb-4 py-2 ml-10">
                    <form class="flex gap-4 items-center" x-show="show" x-transition action="{{ route('comment.store') }}"
                        method="post">
                        @csrf
                        <div class="flex-grow">
                            <input type="hidden" name="commentable_type" value="{{ get_class($model) }}">
                            <input type="hidden" name="commentable_id" value="{{ $model->id }}">
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                            <textarea
                                class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                id="reply" placeholder="{{ __('comment.reply') }}" name="comment" rows="2"></textarea>
                        </div>
                        <div class="">
                            <button class="btn_hover agency_banner_btn btn-bg flex items-center gap-2" type="submit">
                                <span class="ti-location-arrow "></span> @__('comment.reply-btn')
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($comment->replies)
                <ul class="reply-comment list-unstyled">
                    @include('recursive.comments', ['comments' => $comment->replies, 'model' => $model])
                </ul>
            @endif
        </li>
    @else
        @if ($comment->status == 'agreed')
            <li class="post_comment {{ $comment->status == 'pending' ? 'opacity-70' : '' }}">
                <div x-data="{ show: false }">
                    <div class="media post_author mt_60 pb-2">
                        <div class="media-left">
                            <img class="rounded-circle" src="{{ $comment->user->image->url ?? favicon() }}"
                                style="object-fit: cover;" alt="">
                            <button class="replay" @click="show=!show"><i class="ti-share"></i></button>
                        </div>

                        <div class="media-body !border-b-0 pb-0">
                            <div class="flex items-center gap-3">
                                <h5 class=" t_color3 f_size_18 f_500">{{ $comment->user->name }}</h5>
                                @if ($comment->status == 'pending')
                                    <div class="btn_hover agency_banner_btn btn-bg px-3 max-sm:p-2 btn-table !flex items-center gap-1"
                                        title="@__('feature/delivery.pending')" type="submit">
                                        <span class="ti-timer"></span>
                                        <div class="max-sm:hidden">@__('feature/delivery.pending')</div>
                                    </div>
                                @endif
                                @if (str(get_class($model))->contains('Delivery'))
                                    @can('update delivery')
                                        <div class="flex items-center gap-2">
                                            <form
                                                action="{{ route('comment.status', ['comment' => $comment, 'status' => 'agreed']) }}"
                                                method="post">
                                                @csrf
                                                <button
                                                    class="btn_hover agency_banner_btn btn-bg max-sm:p-2 btn-table btn-done !flex items-center"
                                                    type="submit" @disabled($comment->status == 'agreed')>
                                                    <img class="btn-img" src="/img/done.png">
                                                    <div class="max-sm:hidden">@__('feature/delivery.agree')</div>
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('comment.status', ['comment' => $comment, 'status' => 'disagreed']) }}"
                                                method="post">
                                                @csrf
                                                <button
                                                    class="btn_hover agency_banner_btn btn-bg max-sm:p-2 btn-table btn-cancel !flex items-center"
                                                    type="submit" @disabled($comment->status == 'disagreed')>
                                                    <img class="btn-img" src="/img/cancel.png">
                                                    <div class="max-sm:hidden">@__('feature/delivery.disagree')</div>
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                @endif
                            </div>
                            <h6 class=" f_size_15 f_400 mb_20">{{ $comment->created_at->format('d F, Y') }}</h6>
                            <p>
                                {{ $comment->body }}
                            </p>
                        </div>
                    </div>
                    <div class="border-b mb-4 py-2 ml-10">
                        <form class="flex gap-4 items-center" x-show="show" x-transition
                            action="{{ route('comment.store') }}" method="post">
                            @csrf
                            <div class="flex-grow">
                                <input type="hidden" name="commentable_type" value="{{ get_class($model) }}">
                                <input type="hidden" name="commentable_id" value="{{ $model->id }}">
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                                <textarea
                                    class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    id="reply" placeholder="{{ __('comment.reply') }}" name="comment" rows="2"></textarea>
                            </div>
                            <div class="">
                                <button class="btn_hover agency_banner_btn btn-bg flex items-center gap-2" type="submit">
                                    <span class="ti-location-arrow "></span> @__('comment.reply-btn')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($comment->replies)
                    <ul class="reply-comment list-unstyled">
                        @include('recursive.comments', [
                            'comments' => $comment->replies,
                            'model' => $model,
                        ])
                    </ul>
                @endif
            </li>
        @endif
    @endcan
@endforeach
