@extends('layouts.master')

@section('title')
    Item list
@endsection

@section('content')

    <main>
        @if ($post)
            <div class="border max-w-screen-md m-auto bg-white mt-6 rounded-2xl p-4">
                <div class="flex items-center	justify-between">
                    <div class="gap-3.5	flex items-center ">
                        <img src="https://images.unsplash.com/photo-1617077644557-64be144aa306?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
                            class="object-cover bg-yellow-500 rounded-full w-10 h-10" />
                        <div class="flex flex-col">
                            <b class="mb-2 capitalize">{{ $post->author }}</b>
                            <time datetime="06-08-21" class="text-gray-400 text-xs">{{ $post->date }}
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
                        <input type="checkbox" id="toolmenu" class="hidden absolute">
                        <label for="toolmenu" class="flex items-center space-x-1 cursor-pointer">
                            <div class="bg-gray-100	rounded-full w-9 h-9 flex	items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="34px"
                                    fill="#92929D">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                            </div>
                        </label>

                        <div for="toolmenu" id="toolmenumenu"
                            class="absolute mt-1 right-1 top-full min-w-max rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 opacity-0 transition ease-in-out z-10">
                            <ul class="block p-2 text-right text-gray-900">
                                <li><a href="#" class="flex items-start rounded-lg p-3 hover:bg-gray-50"
                                        onclick="my_modal_1.showModal()">Edit</a></li>
                                <li><a href="{{ url("delete_post/$post->id") }}"
                                        class="flex items-start rounded-lg p-3 hover:bg-gray-50">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- tool menu -->


                    <dialog id="my_modal_1" class="rounded-lg bg-white text-left shadow-xl p-5">
                        <h3 class="font-bold text-lg">Edit Post</h3>
                        <form method="post" action="{{ url('edit_post_action') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <div class="max-w-screen-md m-auto flex items-center justify-between mt-4">
                                <div
                                    class="flex items-center justify-between bg-gray-50 h-11 w-11/12 border rounded-2xl overflow-hidden px-4">
                                    <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Title"
                                        name="title" value="{{ $post->title }}">
                                </div>
                                <div
                                    class="flex items-center justify-between bg-gray-50 h-11 w-11/12 border rounded-2xl overflow-hidden px-4">
                                    <input type="text" class="h-full w-full bg-gray-50 outline-none"
                                        placeholder="Message" name="message" value="{{ $post->message }}">
                                </div>
                                <input type="submit" value="Edit">
                            </div>
                        </form>
                        <div class="modal-action">
                            <!-- if there is a button in form, it will close the modal -->
                            <form method="dialog" class="modal-box">
                                <button class="btn">Close</button>
                            </form>
                        </div>
                    </dialog>

                </div>
                <div class="whitespace-pre-wrap mt-5 italic">&ldquo;{{ $post->title }}&rdquo;</div>
                <div class="whitespace-pre-wrap mt-5">{{ $post->message }}</div>
                <div class="mt-5 flex gap-2	 justify-center border-b pb-4 flex-wrap	">
                </div>
                <div class=" h-16 border-b  flex items-center justify-around">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                        </svg>

                        <div class="text-sm	">{{ $post->commentsCount }} Comments</div>
                    </div>
                    <!-- Like Button -->
                    <form method="post" action="{{ url('like_action') }}">
                        @csrf
                        <input type="hidden" name="postId" value="{{ $post->id }}">
                        <div class="flex items-center gap-3">
                            <button type="submit">
                                @if ($like)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 text-red-500">
                                        <path
                                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
    </main>
@endsection
