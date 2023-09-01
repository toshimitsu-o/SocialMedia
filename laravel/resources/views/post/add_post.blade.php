<!-- Start: Post Form -->
@if (count($errors) !== 0)
    <div class="relative rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
        <strong class="font-bold">Error!</strong>
        @foreach ($errors as $error)
            <span class="block sm:inline">{{ $error }}</span>
        @endforeach
    </div>
@endif
<form method="post" action="{{ url('add_post_action') }}">
    @csrf
    <div class="m-auto mt-4 flex max-w-screen-md items-center justify-between">
        <div class="flex h-11 w-11/12 items-center justify-between overflow-hidden rounded-2xl border bg-gray-50 px-4">
            <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Author" name="author"
                value="{{ $uname }}">
        </div>
        <div class="flex h-11 w-11/12 items-center justify-between overflow-hidden rounded-2xl border bg-gray-50 px-4">
            <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Title" name="title">
        </div>
        <div class="flex h-11 w-11/12 items-center justify-between overflow-hidden rounded-2xl border bg-gray-50 px-4">
            <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Message" name="message">
        </div>
        <input type="submit" value="Add">
    </div>
</form>
<!-- End: Post Form -->
