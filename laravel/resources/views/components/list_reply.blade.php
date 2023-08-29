<div class="ml-5">
@forelse($replies as $reply)
<x-reply :$reply :$uname />
@empty
@endforelse
</div>