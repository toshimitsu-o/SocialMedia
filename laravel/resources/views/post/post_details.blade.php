@extends('layouts.master')

@section('title')
    Post
@endsection

@section('content')
    @if ($post)
        <div class="m-auto mt-6 max-w-screen-md rounded-2xl bg-white bg-opacity-70 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3.5">
                    @include('user.user_icon', ['userId' => $post->authorId])
                    <div class="flex flex-col">
                        <b class="mb-2">{{ $post->author }}</b>
                        <time datetime="06-08-21" class="text-xs text-gray-400">{{ $post->date }}
                        </time>
                    </div>
                </div>
                <!-- tool menu -->
                <style>
                    #toolmenu:checked~#toolmenumenu {
                        opacity: 1;
                    }
                </style>
                <div class="relative">
                    <input type="checkbox" id="toolmenu" class="absolute hidden">
                    <label for="toolmenu" class="flex cursor-pointer items-center space-x-1">
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="34px"
                                fill="#92929D">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                            </svg>
                        </div>
                    </label>

                    <div for="toolmenu" id="toolmenumenu"
                        class="absolute right-1 top-full mt-1 min-w-max rounded-lg bg-white opacity-0 shadow-lg ring-1 ring-black ring-opacity-5 transition ease-in-out">
                        <ul class="block p-2 text-right text-gray-900">
                            <li><label class="flex cursor-pointer items-start gap-2 rounded-lg p-3 hover:bg-gray-50"
                                    for="modal-toggle"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    <span>Edit</span></label></li>
                            <li><a href="{{ url("delete_post/$post->id") }}"
                                    class="flex items-start gap-2 rounded-lg p-3 hover:bg-gray-50"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                    <span>Delete</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- tool menu -->

            </div>
            <div class="mt-5 whitespace-pre-wrap text-lg italic">&ldquo;{{ $post->title }}&rdquo;</div>
            <div class="mt-5 whitespace-pre-wrap">{{ $post->message }}</div>
            <div class="mt-5 flex flex-wrap justify-center gap-2 border-b pb-4">
            </div>
            <div class="flex h-16 items-center justify-around border-b text-gray-600">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                    </svg>

                    <div class="text-sm">{{ $post->commentsCount }} Comments</div>
                </div>
                <!-- Like Button -->
                <form method="post" action="{{ url('like_action') }}">
                    @csrf
                    <input type="hidden" name="postId" value="{{ $post->id }}">
                    <div class="flex items-center gap-3">
                        <button type="submit">
                            @if ($like)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6 text-red-500">
                                    <path
                                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            @endif

                        </button>
                        <div class="text-sm">{{ $post->likesCount }} Likes</div>
                    </div>
                </form>
                <!-- Like Button -->
            </div>
            @include('comment.comments')
        </div>
    @else
        <p>Post Not Found.</p>
    @endif
@endsection
@section('endOfBody')
    <!-- Modal -->
    <style>
        body:has(input[form="modal-form-my-modal"]:checked) #modal-container-my-modal {
            display: block;
        }
    </style>
    <input type="checkbox" id="modal-toggle" role="button" form="modal-form-my-modal"
        class="absolute h-1 w-1 overflow-hidden opacity-0" {{ count($errors) === 0 ? '' : 'checked' }} />
    <div id="modal-container-my-modal" class="fixed bottom-0 left-0 right-0 top-0 z-50 hidden h-screen w-screen">
        <label class="fixed bottom-0 left-0 right-0 top-0 block h-screen w-screen bg-black opacity-60" tabindex="-1"
            for="modal-toggle"></label>

        <div class="fixed left-1/2 top-1/2 w-full max-w-screen-md -translate-x-1/2 -translate-y-1/2 rounded-3xl bg-white p-6 pt-3"
            role="dialog">
            <div class="flex flex-row items-center">
                <div class="grow"></div>
                <label for="modal-toggle">
                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </div>
                </label>
            </div>

            @if (count($errors) !== 0)
                <div class="relative rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
                    <strong class="font-bold">Error!</strong>
                    @foreach ($errors as $error)
                        <span class="block sm:inline">{{ $error }}</span>
                    @endforeach
                </div>
            @endif

            <form method="post" action="{{ url('edit_post_action') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <input type="hidden" name="author" value="{{ $post->id }}">
                <div class="m-auto mt-4 flex max-w-screen-md flex-col items-center justify-between gap-2">
                    <div
                        class="flex h-11 w-full items-center justify-between overflow-hidden rounded-full border bg-gray-50 px-4">
                        <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Title"
                            name="title" value="{{ old('title') ?? $post->title }}">
                    </div>
                    <div
                        class="flex h-44 w-full items-center justify-between overflow-hidden rounded-3xl border bg-gray-50 p-4">
                        <textarea class="h-full w-full bg-gray-50 outline-none" placeholder="What's your news?" name="message">{{ old('message') ?? $post->message }}</textarea>
                    </div>
                    <button type="submit"
                        class="flex items-center gap-1 rounded-full bg-gray-300 px-4 pb-2 pt-2.5 text-sm font-medium uppercase leading-normal text-white hover:bg-gray-400 focus:bg-gray-500 active:bg-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
    <form id="modal-form-my-modal"></form>
    <!-- Modal -->
@endsection
