<x-layout>
    <section class="bg-gray-100 flex items-center justify-center min-h-screen h-dvh width: 100vw">

        <div class="bg-white p-8 rounded-lg shadow-lg w-400 max-w-md">
            <h1 class="text-2xl font-semibold text-center text-gray-700 mb-6">Register</h1>

            <form action="register" method="post">
                @csrf  <!-- Laravel CSRF token for security -->

                <!-- Username Field -->
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                    <input type="text" id="name" name="name" placeholder="Enter your username" value="{{ old('username') }}" required
                        class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 @error('username') border-red-500 @enderror">
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

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

                <!-- Confirm Password Field -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required
                        class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 @error('confirm-password') border-red-500 @enderror">
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full p-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-200">
                    Register
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Already have an account? <a href="login" class="text-blue-500 hover:underline">Login</a></p>
            </div>
        </div>

    </section>
</x-layout>
