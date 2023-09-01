<div class="m-2 ml-2 mr-0 p-2">
    @forelse($replies as $reply)
        @include('comment.reply', ['reply' => $reply])
    @empty
    @endforelse
</div>
