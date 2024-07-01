<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Delivery;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        if (str($request->commentable_type)->contains('App\\Models')) {
            $commentableType = $request->commentable_type;
        } else {
            $modelName = Str::contains($request->commentable_type, '\\') ? explode('\\', $request->commentable_type) : [$request->commentable_type];
            $modelName = array_pop($modelName);
            $commentableType = 'App\\Models\\'.Str::studly($modelName);
        }

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'body' => $request->comment,
            'commentable_type' => $commentableType,
            'commentable_id' => $request->commentable_id,
        ]);
        if ($commentableType == Delivery::class) {
            $comment->status = 'pending';
            $comment->update();
        }
        [$users, $initiator, $feature] = getNotificationData($comment->commentable, productId());
        Notification::send($users, new CommentNotification($initiator, $feature));
        notify()->success(__('notify/success.create'));

        return back();
    }

    public function delete(Comment $comment)
    {

    }

    public function toggleStatus(Comment $comment, string $status)
    {
        if (! str($status)->contains(['pending', 'agreed', 'disagreed'])) {
            notify()->warning('Invalid Status!');

            return back();
        }
        $comment->update([
            'status' => $status,
        ]);
        $status = str($status)->title();
        notify()->success(__("$status to this comment!"));

        return back();

    }
}
