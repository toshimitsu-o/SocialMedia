
<!-- Start: Post Form -->
<form method="post" action="{{url("add_post_action")}}">
    @csrf
    <div class="max-w-screen-md m-auto flex items-center justify-between mt-4">
    <div class="flex items-center justify-between bg-gray-50 h-11 w-11/12 border rounded-2xl overflow-hidden px-4">
        <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your name" name="author" value="{{$uname}}">
    </div>
    <div class="flex items-center justify-between bg-gray-50 h-11 w-11/12 border rounded-2xl overflow-hidden px-4">
        <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Title" name="title">
    </div>
    <div class="flex items-center justify-between bg-gray-50 h-11 w-11/12 border rounded-2xl overflow-hidden px-4">
        <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Message" name="message">
    </div>
    <input type="submit" value="Add">
</div>
</form>
<!-- End: Post Form -->