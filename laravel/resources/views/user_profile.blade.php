@extends('layouts.master')
@section('title')
    User Profile
@endsection

@section('content')
    <h1 class="my-3 text-2xl font-medium text-gray-500">Profile</h1>
    <div class="my-5 w-full rounded-2xl bg-white bg-opacity-70 p-5">
        <p>Username: {{ $uname ?? 'No username' }}</p>
        <p>Userid: {{ $uid ?? 'No user id' }}</p>
        <div class="mt-5">
            @if ($uid)
                <a href="{{ url('logout') }}">Logout</a>
            @endif
        </div>
    </div>
@endsection
