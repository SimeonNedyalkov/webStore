<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>API</title>
</head>
<body>
<nav class="bg-blue-600 text-white shadow-md w-full">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold">webStore</a>
            
            <div class="hidden md:flex space-x-6">
                @guest
                <a href="/api/login" class="hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Login</a>
                <a href="/api/register" class="hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Register</a>
                @endguest
                @auth
                <span class="block hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Hello, {{Auth::user()->name}}</span>
                @endauth
                <form action="{{route('logout')}}" method="POST" >
                @csrf
            
                <button class="block hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Logout</button>
            </form>
                <a href="#contact" class="hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Contact</a>
            </div>

            <div class="md:hidden">
                <button id="navbarToggle" class="text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
        </div>

        <div id="mobileMenu" class="md:hidden bg-blue-700 text-white space-y-4 py-4 px-6 hidden">
            <a href="login" class="block hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Login</a>
            <a href="register" class="block hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Register</a>
            <form action="{{route('logout')}}" method="POST" >
                @csrf
                <button class="block hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Logout</button>
            </form>
            <!-- <a href="logout" class="block hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Logout</a> -->
            <a href="#contact" class="block hover:bg-blue-500 px-4 py-2 rounded-lg transition duration-200">Contact</a>
        </div>
        
    </nav>
    <main>
        {{$slot}}
    </main>
</body>
</html>