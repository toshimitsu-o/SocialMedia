<div>
    <details class="group m-2 flex flex-row items-end rounded-xl duration-300 open:bg-gray-100">
        <summary class="cursor-pointer list-none bg-inherit px-5 py-3">
            <div class="flex flex-row items-center">
                <div class="flex grow flex-col gap-3">
                    <div>{{ $reply->author }} <span class="pl-4 text-xs font-light">{{ $reply->date }}</span></div>
                    <div>{{ $reply->message }}</div>
                </div>
                <div class="flex flex-row gap-3 opacity-40 group-hover:opacity-100">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-reply" viewBox="0 0 16 16">
                            <path
                                d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
                        </svg>
                    </div>
                    <span>Reply</span>
                </div>
            </div>
        </summary>
        <div class="px-5 py-3">
            @include('comment.add_reply', ['postId' => $reply->postId, 'replyTo' => $reply->id])
        </div>
    </details>
    @if (count($reply->replies) > 0)
        @include('comment.list_reply', ['replies' => $reply->replies])
    @endif
</div>
