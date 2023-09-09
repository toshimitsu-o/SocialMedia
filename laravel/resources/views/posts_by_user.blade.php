@extends('layouts.master')
@section('title')
    Posts by {{ $user->name }}
@endsection

@section('content')
    <h1 class="my-3 text-2xl font-medium text-gray-500">Posts by {{ $user->name }}</h1>
    @include('post.post_list')
@endsection
