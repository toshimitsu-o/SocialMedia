<div>
    <details
        class="group m-auto flex w-fit flex-row items-end rounded-full bg-gray-100 bg-opacity-70 p-2 duration-300 open:w-full open:rounded-3xl open:bg-gray-100 drop-shadow-xl" {{count($errors) === 0 ? '' : 'open'}}>
        <summary class="flex cursor-pointer list-none flex-row bg-inherit p-1">
            <div class="h-0 w-0 grow overflow-hidden duration-300 ease-in-out group-open:h-full group-open:w-96"></div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                      </svg>
                      
        </summary>
        <div class="p-2">
            <!-- Start: Post Form -->
            @if (count($errors) !== 0)
                <div class="relative rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
                    <strong class="font-bold">Error!</strong>
                    @foreach ($errors as $error)
                        <span class="block sm:inline">{{ $error }}</span>
                    @endforeach
                </div>
            @endif
            @if (!empty($title))
                <p>{{$title}}</p>
            @endif
            <form method="post" action="{{ url('add_post_action') }}">
                @csrf
                <div class="m-auto mt-4 flex max-w-screen-md flex-col items-center justify-between gap-2">
                    <div
                        class="flex h-11 w-full items-center justify-between overflow-hidden rounded-full border bg-gray-50 px-4">
                        <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your name"
                            name="author" value="{{ $uname ?? old('author') }}">
                    </div>
                    <div
                        class="flex h-11 w-full items-center justify-between overflow-hidden rounded-full border bg-gray-50 px-4">
                        <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Title"
                            name="title" value="{{ old('title') }}">
                    </div>
                    <div
                        class="flex h-24 w-full items-center justify-between overflow-hidden rounded-3xl border bg-gray-50 p-4">
                        <textarea class="h-full w-full bg-gray-50 outline-none" placeholder="What's your news?" name="message">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit"
                        class="flex items-center gap-1 rounded-full bg-gray-300 px-4 pb-2 pt-2.5 text-sm font-medium uppercase leading-normal text-white hover:bg-gray-400 focus:bg-gray-500 active:bg-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                        Post
                    </button>
                </div>
            </form>
            <!-- End: Post Form -->
        </div>
    </details>
</div>
