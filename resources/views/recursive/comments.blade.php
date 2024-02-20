@foreach ($comments as $comment)
    <li class="post_comment">
        <div x-data="{ show: false }">
            <div class="media post_author mt_60 pb-2">
                <div class="media-left">
                    <img class="rounded-circle" src="{{ $comment->user->image->url ?? favicon() }}" style="object-fit: cover;" alt="">
                    <button class="replay" @click="show=!show"><i class="ti-share"></i></button>
                </div>

                <div class="media-body !border-b-0 pb-0">
                    <h5 class=" t_color3 f_size_18 f_500">{{ $comment->user->name }}</h5>
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
@endforeach
