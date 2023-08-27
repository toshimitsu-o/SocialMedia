@extends('layouts.master')

@section('title')
    Like to {{$post->title}}
@endsection

@section('content')
<main>
    @if($post)
    <h1>Like to {{$post->title}}</h1>
    <form method="post" action="{{url("like_action")}}">
        @csrf
        <input type="hidden" name="postId" value="{{$post->id}}">
        <div class="max-w-screen-md m-auto flex items-center justify-between mt-4">
            <div class="flex items-center justify-between bg-gray-50 h-11 w-11/12 border rounded-2xl overflow-hidden px-4">
                <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Name" name="author" value="{{$uname}}">
            </div>
        </div>
        <button type="submit">Like<button>
    </form>
    @else
    <p>Error: No post to like.</p>
    @endif
</main>
@endsection