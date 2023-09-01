@extends('layouts.master')

@section('title')
    User List
@endsection

@section('content')
    @if (count($users) > 0)
        <p>{{ count($users) }} Users</p>
        @foreach ($users as $user)
            <p><a href="{{ url("user/$user->id") }}">{{ $user->name }} ({{ $user->postCount }} posts)</a></p>
        @endforeach
    @else
        <p>No users.</p>
    @endif
@endsection
