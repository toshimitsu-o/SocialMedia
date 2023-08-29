<div class="ml-5">
@forelse($replies as $reply)
    @include('comment.reply', ['reply' => $reply])
@empty
@endforelse
</div>