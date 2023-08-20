@extends('layouts.master')
@section('title')
Home
@endsection

@section('content')
<main class="h-full w-full bg-gray-50 flex items-center justify-center">
    @if ($posts)
            @foreach($posts as $post)
                <div class="border max-w-screen-md bg-white mt-6 rounded-2xl p-4">
                    <div class="flex items-center	justify-between">
                        <div class="gap-3.5	flex items-center ">
                            <img src="https://images.unsplash.com/photo-1617077644557-64be144aa306?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="object-cover bg-yellow-500 rounded-full w-10 h-10" />
                            <div class="flex flex-col">
                                <b class="mb-2 capitalize">{{$post->author}}</b>
                                <time datetime="06-08-21" class="text-gray-400 text-xs">{{$post->date}}
                                </time>
                            </div>
                        </div>
                        <div class="bg-gray-100	rounded-full h-3.5 flex	items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="34px" fill="#92929D">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                            </svg>
                        </div>
                    </div>
                    <div>{{$post->title}}</div>
                    <div class="whitespace-pre-wrap mt-7">{{$post->message}}</div>
                    <div class="mt-5 flex gap-2	 justify-center border-b pb-4 flex-wrap	">
                      </div>
                        <div class=" h-16 border-b  flex items-center justify-around	">
                            <div class="flex items-center	gap-3	">
                                <svg width="20px" height="19px" viewBox="0 0 20 19" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="?-Social-Media" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Square_Timeline" transform="translate(-312.000000, -746.000000)">
                                            <g id="Post-1" transform="translate(280.000000, 227.000000)">
                                                <g id="Post-Action" transform="translate(0.000000, 495.000000)">
                                                    <g transform="translate(30.000000, 21.000000)" id="Comment">
                                                        <g>
                                                            <g id="ic_comment-Component/icon/ic_comment">
                                                                <g id="Comments">
                                                                    <polygon id="Path" points="0 0 24 0 24 25 0 25"></polygon>
                                                                    <g id="iconspace_Chat-3_25px"
                                                                        transform="translate(2.000000, 3.000000)" fill="#92929D">
                                                                        <path
                                                                            d="M10.5139395,15.2840977 L6.06545155,18.6848361 C5.05870104,19.4544672 3.61004168,18.735539 3.60795568,17.4701239 L3.60413773,15.1540669 C1.53288019,14.6559967 0,12.7858138 0,10.5640427 L0,4.72005508 C0,2.11409332 2.10603901,0 4.70588235,0 L15.2941176,0 C17.893961,0 20,2.11409332 20,4.72005508 L20,10.5640427 C20,13.1700044 17.893961,15.2840977 15.2941176,15.2840977 L10.5139395,15.2840977 Z M5.60638935,16.5183044 L9.56815664,13.4896497 C9.74255213,13.3563295 9.955971,13.2840977 10.1754888,13.2840977 L15.2941176,13.2840977 C16.7876789,13.2840977 18,12.0671403 18,10.5640427 L18,4.72005508 C18,3.21695746 16.7876789,2 15.2941176,2 L4.70588235,2 C3.21232108,2 2,3.21695746 2,4.72005508 L2,10.5640427 C2,12.0388485 3.1690612,13.2429664 4.6301335,13.28306 C5.17089106,13.297899 5.60180952,13.7400748 5.60270128,14.2810352 L5.60638935,16.5183044 Z"
                                                                            id="Path"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <div class="text-sm	">10 Comments</div>
                            </div>
                            <div class="flex items-center	gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="text-sm">5 Likes</div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"  class="bg-yellow-500 rounded-full w-10 h-10 object-cover border">
                            <div class="flex items-center	justify-between	 bg-gray-50 h-11 w-11/12 border rounded-2xl	 overflow-hidden px-4 ">
                                <input type="text" class="h-full w-full bg-gray-50 outline-none" placeholder="Write your comment..." name="comment">
                            </div>
                        </div>
                </div>
            @endforeach
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