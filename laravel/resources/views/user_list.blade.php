@extends('layouts.master')

@section('title')
    User List
@endsection

@section('content')
    @if (count($users) > 0)
        <p>{{ count($users) }} Users</p>
        @foreach ($users as $user)
            <a href="{{ url("user/$user->id") }}">
                <div class="my-5 w-full rounded-2xl border bg-white bg-opacity-70 p-5">
                    <div class="flex items-center gap-3.5">

                        @include('user.user_icon', ['userId' => $user->id])
                        <div class="flex flex-col">
                            <b class="mb-2 capitalize">{{ $user->name }}</b>
                        </div>
                        <p>({{ $user->postCount }} posts)</p>
                    </div>
                </div>
            </a>
        @endforeach
    @else
        <p>No users.</p>
    @endif
@endsection
