@extends('layouts.master')
@section('title')
    Posts by {{ $user->name }}
@endsection

@section('content')
    <main class="m-auto h-full w-full bg-gray-50">
        <h1>Posts by {{ $user->name }}</h1>
        @include('post.post_list')
    </main>
@endsection
