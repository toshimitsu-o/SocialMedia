@extends('layouts.master')
@section('title')
    Posts by {{ $user->name }}
@endsection

@section('content')
    <h1>Posts by {{ $user->name }}</h1>
    @include('post.post_list')
@endsection
