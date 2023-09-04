<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Social Media | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <style>
        body {
            height: 100vh;
            background: linear-gradient(90deg, #e52e71, #ff8a00);

        }

        .slider-thumb::before {
            position: fixed;
            content: "";
            right: 10%;
            bottom: 5%;
            width: 550px;
            height: 550px;
            background: PaleTurquoise;
            border-radius: 62% 47% 82% 35% / 45% 45% 80% 66%;
            will-change: border-radius, transform, opacity;
            animation: sliderShape 5s linear infinite;
            display: block;
            z-index: -1;
            -webkit-animation: sliderShape 5s linear infinite;
        }

        @keyframes sliderShape {

            0%,
            100% {
                border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
                transform: translate3d(0, 0, 0) rotateZ(0.01deg);
            }

            34% {
                border-radius: 70% 30% 46% 54% / 30% 29% 71% 70%;
                transform: translate3d(0, 5px, 0) rotateZ(0.01deg);
            }

            50% {
                transform: translate3d(0, 0, 0) rotateZ(0.01deg);
            }

            67% {
                border-radius: 100% 60% 60% 100% / 100% 100% 60% 60%;
                transform: translate3d(0, -3px, 0) rotateZ(0.01deg);
            }
        }

        .bg {
            height: 100%;
            background-size: 300% 300%;
            background-image: linear-gradient(-45deg, #bbfff9 0%, white 25%, white 51%, darkcyan 100%);
            -webkit-animation: AnimateBG 20s ease infinite;
            animation: AnimateBG 20s ease infinite;
        }

        @-webkit-keyframes AnimateBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes AnimateBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        details > summary::-webkit-details-marker {
    display: none;
}
    </style>
</head>

<body class="bg slider-thumb">
    <div class="flex h-full min-h-screen flex-col backdrop-blur-md">
        @include('layouts.nav')

        <main class="m-auto w-full max-w-screen-md grow">
            @yield('content')
        </main>
        @include('layouts.footer')

    </div>
    @yield('endOfBody')
</body>

</html>
