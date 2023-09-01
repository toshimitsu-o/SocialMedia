<div>
    @forelse($comments as $comment)
        <div class="flex flex-row">
            <div>{{ $comment->author }}: {{ $comment->message }} {{ $comment->date }}</div>
            <div>
                @include('comment.add_reply', ['postId' => $comment->postId, 'replyTo' => $comment->id])
            </div>
        </div>
        @include('comment.list_reply', ['replies' => $comment->replies])
    @empty
        <p>No comments.</p>
    @endforelse
</div>
@include('comment.add_reply', ['postId' => $post->id, 'replyTo' => ''])
