<div>
    @include('comment.comment', ['comment' => $reply])
    @if (count($reply->replies) > 0)
        @include('comment.list_reply', ['replies' => $reply->replies, 'replyingto' => $reply->author])
    @endif
</div>
