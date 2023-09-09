@if (count($posts) > 0)
    
    @forelse($posts as $post)
        <a href="{{ url("post/$post->id") }}">
            <div class="my-6 w-full rounded-2xl bg-white bg-opacity-70 p-5">
                <div class="flex items-center gap-3.5">

                    @include('user.user_icon', ['userId' => $post->authorId])
                    <div class="flex flex-col">
                        <b class="mb-2">{{ $post->author }}</b>
                        <time datetime="06-08-21" class="text-xs text-gray-400">{{ $post->date }}
                        </time>
                    </div>
                </div>
                <div class="my-5 whitespace-pre-wrap text-lg">{{ $post->title }}</div>

                <div class="flex items-center justify-around text-gray-500">
                    <!-- Comments -->
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                        </svg>
                        <div class="text-sm">{{ $post->commentsCount }} Comments</div>
                    </div>
                    <!-- Comments -->
                    <!-- Likes -->
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        <div class="text-sm">{{ $post->likesCount }} Likes</div>
                    </div>
                    <!-- Likes -->
                </div>
            </div>
        </a>
    @endforeach
    <p>{{ count($posts) }} posts</p>
@else
    <p>No items.</p>
@endif
