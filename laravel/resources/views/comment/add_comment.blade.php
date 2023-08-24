
<form method="post" action="{{url("add_comment_action")}}">
    @csrf
    <input type="hidden" name="postId" value="{{$post->id}}">
    <div class="flex items-center justify-between mt-4">
    <img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"  class="bg-yellow-500 rounded-full w-10 h-10 object-cover border">
    <div class="flex items-center	justify-between	 bg-gray-50 h-11 w-11/12 border rounded-2xl	 overflow-hidden px-4 ">
        <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your name" name="author" value={{$uname}}>
    </div>
    <div class="flex items-center	justify-between	 bg-gray-50 h-11 w-11/12 border rounded-2xl	 overflow-hidden px-4 ">
        <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your comment" name="message">
    </div>
    <input type="submit" value="Add">
</div>
</form>
