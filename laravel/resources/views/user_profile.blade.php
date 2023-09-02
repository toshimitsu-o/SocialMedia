@extends('layouts.master')
@section('title')
    User Profile
@endsection

@section('content')
    <h1>Profile</h1>
    <p>Username: {{ $uname ?? "No username." }}</p>
    <p>Userid: {{ $uid ?? "No user id." }}</p>
    <a href="{{url('logout')}}">Logout</a>
@endsection
