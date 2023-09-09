<section class="sticky top-0 z-30 p-3">
    <!-- navbar -->
    <nav
        class="m-auto flex w-full max-w-4xl justify-between rounded-full bg-white bg-opacity-50 text-gray-500 drop-shadow-xl backdrop-blur-md">
        <div class="flex w-full items-center px-12 py-5">
            <a class="font-heading text-xl font-bold" href="{{ url('/') }}">
                <img class="h-9" src="{{ url('/images') }}/logo.png" alt="Social Media">
            </a>
            <!-- Nav Links -->
            <ul class="font-heading mx-auto flex space-x-12 px-4 font-semibold">
                <li><a class="hover:text-gray-700" href="{{ url('/') }}">Home</a></li>
                <li><a class="hover:text-gray-700" href="{{ url('users') }}">Users</a></li>
            </ul>
            <!-- Header Icons -->
            <div class="flex items-center space-x-5">
                <!-- Sign In / Register      -->
                <a class="flex items-center hover:text-gray-700" href="{{ url('userprofile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>

            </div>
        </div>
    </nav>
</section>
