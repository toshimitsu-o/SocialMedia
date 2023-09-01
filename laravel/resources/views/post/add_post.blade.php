<!-- Start: Post Form -->
@if (count($errors) !== 0)
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        @foreach ($errors as $error)
            <span class="block sm:inline">{{ $error }}</span>
        @endforeach
    </div>
@endif
<form method="post" action="{{ url('add_post_action') }}">
    @csrf
    <div class="max-w-screen-md m-auto flex items-center justify-between mt-4">
        <div class="flex items-center justify-between bg-gray-50 h-11 w-11/12 border rounded-2xl overflow-hidden px-4">
            <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Author" name="author"
                value="{{ $uname }}">
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
