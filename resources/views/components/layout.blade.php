<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg sticky top-0">
        <nav>
            <a href="{{ route('posts.index') }}" class="nav-link">Home</a>
            @auth
                <div x-data="{ open: false }" class="relative grid place-items-center">
                    {{-- Dropdown menu button --}}
                    <button @click="open = !open" type="button" class="round-btn">
                        <img src="https://picsum.photos/100" alt="user">
                    </button>
                    {{-- Dropdown menu --}}
                    <div x-show="open" @click.outside="open = false"
                        class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light">
                        <p class="px-4 py-2 text-sm text-slate-500 border-b">{{ auth()->user()->username }}</p>

                        <a href="{{ route('dashboard') }}" class="block hover:bg-slate-100 px-3 py-2 mb-1">Dashboard</a>

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="block hover:bg-slate-100 py-2 w-full">Logout</button>
                        </form>
                    </div>

                </div>
            @endauth
            @guest

                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </div>
            @endguest
        </nav>
    </header>
    <main class="py-8 px-4 mx-auto max-w-screen-lg">
        {{ $slot }}
    </main>
</body>

</html>
