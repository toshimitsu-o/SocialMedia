@extends('layouts.master')

@section('title')
    Like
@endsection

@section('content')
    <div class="m-auto mt-6 max-w-screen-sm rounded-2xl border bg-white bg-opacity-70 p-4">
        @if ($post)
            <h1>Like &ldquo;{{ $post->title }}&rdquo;</h1>
            <form method="post" action="{{ url('like_action') }}">
                @csrf
                <input type="hidden" name="postId" value="{{ $post->id }}">
                <div class="flex flex-row items-center gap-2">
                    <div class="m-auto mt-4 flex max-w-screen-md grow items-center justify-between">
                        <div
                            class="flex h-11 w-full items-center justify-between overflow-hidden rounded-full border bg-gray-50 px-4">
                            <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Your name"
                                name="author" value="{{ $uname }}">
                        </div>
                    </div>
                    <button type="submit" class="flex h-11 w-11 items-center justify-center rounded-full bg-gray-100"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    <button>
                </div>
            </form>
        @else
            <p>Error: No post to like.</p>
        @endif
    </div>
@endsection
