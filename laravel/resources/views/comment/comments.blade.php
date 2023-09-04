<div>
    @forelse($comments as $comment)
    <div class="my-2">
        @include('comment.comment', ['comment' => $comment])
        @include('comment.list_reply', ['replies' => $comment->replies, 'replyingto' => $comment->author])
    </div>
    @empty
        <p>No comments.</p>
    @endforelse
</div>
@include('comment.add_reply', ['postId' => $post->id, 'replyTo' => ''])
