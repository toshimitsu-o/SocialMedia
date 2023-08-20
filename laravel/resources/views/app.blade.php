@extends('layouts.master')
@section('title')
Home
@endsection

@section('content')
<main class="h-full w-full m-auto bg-gray-50">
    @if ($posts)
    <div class="max-w-screen-md m-auto">
            @foreach($posts as $post)
            <a href="{{url("post/$post->id")}}">
                <div class="w-full border bg-white rounded-2xl m-5 p-5">
                    <div class="flex items-center justify-between">
                        <div class="gap-3.5	flex items-center">
                            <img src="https://images.unsplash.com/photo-1617077644557-64be144aa306?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="object-cover bg-yellow-500 rounded-full w-10 h-10" />
                            <div class="flex flex-col">
                                <b class="mb-2 capitalize">{{$post->author}}</b>
                            </div>
                        </div>
                    </div>
                    <div class="whitespace-pre-wrap mt-5">{{$post->title}}</div>
                </div>
            </a>
            @endforeach
        </div>
    @else
        <p>No items.</p>
    @endif

	
</main>
<!-- Open the modal using ID.showModal() method -->

<button type="button" class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline" onclick="my_modal_1.showModal()">open modal</button>
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