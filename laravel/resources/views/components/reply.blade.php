
<div class="ml-5">
    <div class="flex flex-row">
        <div>{{$reply->author}}: {{$reply->message}} {{$reply->date}}</div>
            <div><x-add_reply postId="{{$reply->postId}}" replyTo="{{$reply->id}}" :$uname /></div>
        </div>
        @if(count($reply->replies) > 0)
        <x-list_reply :replies="$reply->replies" :$uname />
        @endif
</div>
