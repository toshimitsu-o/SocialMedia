
<div class="ml-5">
    <div class="flex flex-row">
        <div>{{$reply->author}}: {{$reply->message}} {{$reply->date}}</div>
            <div>
                @include('comment.add_reply', ['postId' => $reply->postId, 'replyTo' => $reply->id])
            </div>
        </div>
        @if(count($reply->replies) > 0)
            @include('comment.list_reply', ['replies' => $reply->replies])
        @endif
</div>
