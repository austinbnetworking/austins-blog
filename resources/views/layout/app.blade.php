<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Austin's Blog</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
    <nav class="bg-white">
        <div class="flex justify-start items-center mx-auto max-w-7xl px-6 py-8">
            <p><a href="/" class="text-2xl"><strong>Austin's Blog</strong></a></p>
            <ul class="flex ml-auto">
                <li><a href="{{ route('home') }}" class="px-3 hover:underline">Home</a></li>
                <li><a href="" class="px-3 hover:underline pointer-events-none opacity-50">About</a></li>
                <li><a href="{{ route('posts') }}" class="px-3 hover:underline">Posts</a></li>
            </ul>
            <div class="px-3">|</div>
            <ul class="flex">
                @guest
                    <li><a href="{{ route('login') }}" class="px-3 hover:underline">Log In</a></li>
                    <li><a href="{{ route('register') }}" class="px-3 hover:underline">Register</a></li>
                @endguest
                @auth
                    <li><a href="/user" class="px-3 hover:underline">{{ auth()->user()->name }}</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="px-3 hover:underline">Log Out</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <main class="mx-auto my-8 max-w-7xl bg-white px-6 py-8 rounded">
        {{-- 'Yield' a place in content that other templates extend --}}
        @include('components.page-title')
        @include('components.page-content')
    </main>
</body>
</html>
