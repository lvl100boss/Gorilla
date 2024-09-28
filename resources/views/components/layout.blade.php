<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    {{-- <link rel="icon" href="C:/Codes/Laravel/Gorilla/storage/app/public/web-images/Gorilla.png"> --}}
    @vite(['resources/css/app.css', 'resources/css/Icons/uicons-regular-rounded/css/uicons-regular-rounded.css', 'resources/css/Icons/uicons-regular-straight/css/uicons-regular-straight.css','resources/js/app.js'])
</head>
<body>
    <header>
        <nav>
            {{-- left nav --}}
            <div>
                {{-- logo --}}
                <a href="{{ route('home') }}">
                    <h1 class="logo">
                        GO<span class="text-accent">RILLA</span>
                    </h1>
                </a>
            </div>

            {{-- right nav --}}
            <div>
                <ul class="flex justify-between items-center gap-6 text-sm">
                    <li class="links"><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-accent' : 'text-white' }}">HOME</a></li>
                    <li class="links"><a href="{{ route('products') }}" class="{{ request()->routeIs('products') ? 'text-accent' : 'text-white' }}">PRODUCTS</a></li>
                    <li class="links"><a href="{{ route('aboutus') }}" class="{{ request()->routeIs('aboutus') ? 'text-accent' : 'text-white' }}">ABOUT US</a></li>
                    <li class="links"><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-accent' : 'text-white' }}">CONTACT</a></li>
                    @guest
                    <li class="links"><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'text-accent' : 'text-white' }}">LOG IN</a></li>
                    <li class="links ">
                        <a href="{{ route('register') }}" class="">
                            <button class="btn outline outline-accent outline-offset-4 outline-1" >SIGN UP</button>
                        </a>
                    </li>
                    @endguest
                    @auth 
                    <li class="links"><a href="{{ route('admin_products') }}" >- HI, {{ Str::upper(auth()->user()->username) }} -</a></li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <li class="links">
                            
                            <button type="submit" class="btn outline outline-accent outline-offset-4 outline-1" >LOG OUT</button>
                            
                        </li>
                    </form>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>
    <main>
        {{ $slot }}
    </main>
    {{-- Footer Section --}}
    <footer class="py-14 bg-footer flex justify-start">
        <div class="flex flex-col items-start w-full     justify-center gap-2 max-w-screen-xl mx-auto">
            <h1 class="email font-bold text-accent">EH202201066@WMSU.EDU.PH - SUAREZ</h1>
            <h1 class="email font-bold text-accent">QB202100175@WMSU.EDU.PH - CADIZ</h1>
            <p>Advance Database System (CS135)</p>
            <p class="">Copyright 2024 Gorilla</p>
            <p class="">@GORILLA.INC</p>
            <p>Project Gorilla</p>
        </div>
    </footer>
</body>
</html>