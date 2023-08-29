<div>
    @forelse($comments as $comment)
    <div class="flex flex-row">
        <div>{{$comment->author}}: {{$comment->message}} {{$comment->date}}</div>
        <div>
            <x-add_reply postId="{{$comment->postId}}" replyTo="{{$comment->id}}" :$uname />
        </div>
    </div>
    <x-list_reply :replies="$comment->replies" :$uname />
    @empty
    <p>No comments.</p>
    @endforelse
</div>
<x-add_reply postId="{{$post->id}}" replyTo="" :$uname />