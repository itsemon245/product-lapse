@props(['comments' => []])
<x-slot:comments>
    <ul class="comment-box list-unstyled mb-0">
        @if ($comments)
            @include('recursive.comments', ['comments' => $comments, 'model' => $model])
        @else
            <li>@__('comment.comment-not-found')</li>
        @endif
    </ul>
    {{-- @endif --}}
</x-slot:comments>
@can('create comment')
    <x-slot:writeComment>
        <form class="get_quote_form row" action="{{ route('comment.store') }}" method="post">
            @csrf
            <div class="col-md-12 form-group">
                <input type="hidden" name="commentable_type" value="{{ get_class($model) }}">
                <input type="hidden" name="commentable_id" value="{{ $model->id }}">
                <textarea class="form-control message" name="comment" placeholder="{{ __('comment.placeholder') }}"></textarea>
            </div>
            <div class="col-md-12">
                <button class="btn_hover agency_banner_btn btn-bg" type="submit">@__('comment.send')</button>
            </div>
        </form>
    </x-slot:writeComment>
@endcan
