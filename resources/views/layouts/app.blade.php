<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{ asset('img/k-icon.png') }}">
        <title>Knowing - @yield('titulo')</title>
        @stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{route('home')}}" class="text-3xl font-black flex justify-start">
                    <img src="{{asset('img/Knowing-Logo.png')}}" alt="" class="flex w-10 h-10">
                    nowing
                </a>
                <!--Nav alineado a la izquierda gracias al justify-between del div dentro del header-->
                @auth
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('posts.create') }}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg> 
                            Crear
                        </a>
                        <a class="font-bold text-gray-600 text-sm" href="{{route('posts.index', auth()->user()->username)}}">
                            Hola: <span class="font-normal">{{auth()->user()->username}}</span>
                        </a>
                        <!--Por seguridad, se cierra la sesion usando metodo post -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm" href="{{ route('logout') }}">
                                Cerrar Sesión
                            </button>
                        </form>
                    </nav> 
                @endauth

                @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                    </nav> 
                @endguest
                
            </div>
        </header>
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
            @yield('contenido')
        </main>
        <footer class="text-center mt-10 p-5 text-gray-500 font-bold uppercase">
            Knowing - Todos los derechos reservados {{ now()->year }}<!-- <--this is a helpers-->
        </footer>

        @livewireScripts
    </body>
</html>
