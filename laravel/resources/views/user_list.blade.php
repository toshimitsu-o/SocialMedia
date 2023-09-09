@extends('layouts.master')

@section('title')
    User List
@endsection

@section('content')
    @if (count($users) > 0)
        <h1 class="my-3 text-2xl font-medium text-gray-500">{{ count($users) }} Users</h1>
        @foreach ($users as $user)
            <a href="{{ url("user/$user->id") }}">
                <div class="my-5 w-full rounded-2xl bg-white bg-opacity-70 p-5">
                    <div class="flex items-center gap-3.5">

                        @include('user.user_icon', ['userId' => $user->id])
                        <span class="font-semibold">{{ $user->name }}</span>
                        <span>({{ $user->postCount }} posts)</span>
                    </div>
                </div>
            </a>
        @endforeach
    @else
        <p>No users.</p>
    @endif
@endsection
