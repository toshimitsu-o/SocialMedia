@extends('layouts.master')
@section('title')
    Home
@endsection

@section('content')
    @include('post.add_post')
    @include('post.post_list')
    <!-- Open the modal using ID.showModal() method -->

    <button type="button"
        class="ease focus:shadow-outline m-2 select-none rounded-md border border-indigo-500 bg-indigo-500 px-4 py-2 text-white transition duration-500 hover:bg-indigo-600 focus:outline-none"
        onclick="my_modal_1.showModal()">open modal</button>
    <dialog id="my_modal_1" class="rounded-lg bg-white p-5 text-left shadow-xl">
        <form method="dialog" class="modal-box">
            <h3 class="text-lg font-bold">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </div>
        </form>
    </dialog>
@endsection
