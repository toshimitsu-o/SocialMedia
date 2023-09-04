<form method="post" action="{{ url('add_comment_action') }}">
    @csrf
    <input type="hidden" name="postId" value="{{ $postId }}">
    <input type="hidden" name="replyTo" value="{{ $replyTo }}">
    <div class="mt-4 flex items-center justify-between">
        <div class="flex h-11 items-center justify-between overflow-hidden rounded-full border bg-gray-50 px-4">
            <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your name" name="author"
                value={{ $uname }}>
        </div>
        <div class="flex h-11 grow items-center justify-between overflow-hidden rounded-full border bg-gray-50 px-4">
            <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your comment"
                name="message">
        </div>
        <button type="submit" class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
          </svg>
        </button>
    </div>
</form>
