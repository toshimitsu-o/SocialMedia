@if (count($posts) > 0)
    <div class="max-w-screen-md m-auto">
        <p>{{ count($posts) }} posts</p>
        @forelse($posts as $post)
            <a href="{{ url("post/$post->id") }}">
                <div class="w-full border bg-white rounded-2xl m-5 p-5">
                    <div class="flex items-center justify-between">
                        <div class="gap-3.5	flex items-center">
                            <img src="https://images.unsplash.com/photo-1617077644557-64be144aa306?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
                                class="object-cover bg-yellow-500 rounded-full w-10 h-10" />
                            <div class="flex flex-col">
                                <b class="mb-2 capitalize">{{ $post->author }}</b>
                            </div>
                        </div>
                        <div class="italic">{{ $post->date }}</div>
                    </div>
                    <div class="whitespace-pre-wrap mt-5">{{ $post->title }}</div>
                    <!-- Comments -->
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                        </svg>
                        <div class="text-sm	">{{ $post->commentsCount }} Comments</div>
                    </div>
                    <!-- Comments -->
                    <!-- Likes -->
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        <div class="text-sm	">{{ $post->likesCount }} Likes</div>
                    </div>
                    <!-- Likes -->

                </div>
            </a>
        @endforeach
    </div>
@else
    <p>No items.</p>
@endif
