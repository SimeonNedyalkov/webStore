<x-layout>
    <section class="bg-gray-100 flex items-center justify-center min-h-screen h-dvh width: 100vw">

        <div class="bg-white p-8 rounded-lg shadow-lg w-400 max-w-md">
            <h1 class="text-2xl font-semibold text-center text-gray-700 mb-6">Login</h1>

            <form action="login" method="post">
                @csrf  
                

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required
                        class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 @error('email') border-red-500 @enderror">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required
                        class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 @error('password') border-red-500 @enderror">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                

                <!-- Submit Button -->
                <button type="submit" class="w-full p-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-200">
                    Login
                </button>
            </form>
@if($errors->any())
        <ul class="px-4 py-2 bg-red-100">
        @foreach($errors->all() as $error)
            <li class="my-2 text-red-500">{{$error}}</li>
        @endforeach
        </ul>
        @endif
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Don't have an account? <a href="register" class="text-blue-500 hover:underline">Register</a></p>
            </div>
        </div>
        

    </section>
    
</x-layout>
