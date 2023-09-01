<form method="post" action="{{ url('add_comment_action') }}">
    @csrf
    <input type="hidden" name="postId" value="{{ $postId }}">
    <input type="hidden" name="replyTo" value="{{ $replyTo }}">
    <div class="mt-4 flex items-center justify-between">
        <div class="flex h-11 items-center justify-between overflow-hidden rounded-2xl border bg-gray-50 px-4">
            <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your name" name="author"
                value={{ $uname }}>
        </div>
        <div class="flex h-11 items-center justify-between overflow-hidden rounded-2xl border bg-gray-50 px-4">
            <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your comment"
                name="message">
        </div>
        <input type="submit" value="Add">
    </div>
</form>
