<?php
namespace App\Traits;

use App\Models\Comment;

trait HasComments
{
    public function loadComments($nested = 3)
    {
        $comments = [ 'comments', 'comments.user' ];
        $replies  = 'comments';
        for ($i = 0; $i < $nested; $i++) {
            $replies      = $replies . '.replies';
            $user         = $replies . '.user';
            $comments[  ] = $user;
            $comments[  ] = $replies;
        }
        return $this->load($comments);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
