@extends('layouts.master')
@section('title')
    Home
@endsection

@section('content')
    @include('post.add_post')
    @include('post.post_list')
@endsection
