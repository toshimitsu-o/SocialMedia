
    <form method="post" action="{{url("add_comment_action")}}">
        @csrf
        <input type="hidden" name="postId" value="{{$postId}}">
        <input type="hidden" name="replyTo" value="{{$replyTo}}">
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center	justify-between	 bg-gray-50 h-11 border rounded-2xl	 overflow-hidden px-4">
                <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your name" name="author" value={{$uname}}>
            </div>
            <div class="flex items-center	justify-between	 bg-gray-50 h-11 border rounded-2xl	 overflow-hidden px-4 ">
                <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your comment" name="message">
            </div>
            <input type="submit" value="Add">
        </div>
    </form>
