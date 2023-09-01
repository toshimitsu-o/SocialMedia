@extends('layouts.master')
@section('title')
    Home
@endsection

@section('content')
    <main class="h-full w-full m-auto bg-gray-50">
        @include('post.add_post')
        @include('post.post_list')
    </main>
    <!-- Open the modal using ID.showModal() method -->

    <button type="button"
        class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
        onclick="my_modal_1.showModal()">open modal</button>
    <dialog id="my_modal_1" class="rounded-lg bg-white text-left shadow-xl p-5">
        <form method="dialog" class="modal-box">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </div>
        </form>
    </dialog>
@endsection
