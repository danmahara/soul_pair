@extends('components.guest_partials.default')
@section('content')

@include('components.alerts')
<div class="bg-gradient-to-r  flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Welcome Back!</h2>
        <p class="text-center text-gray-600 mb-4">Login to connect with your matches.</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200"
                    placeholder="Enter your email" >
                @error('email')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200"
                    placeholder="Enter your password" >
                @error('password')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center mb-6">
                <input type="checkbox" id="remember" name="remember"
                    class="text-pink-600 focus:ring-pink-500 h-4 w-4 border border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-gray-700 text-sm">Remember Me</label>
            </div>
            <button type="submit"
                class="w-full bg-pink-600 text-white font-bold py-2 rounded-lg hover:bg-pink-700 transition duration-200">Login</button>
            <p class="mt-4 text-center text-gray-600 text-sm">
                Don't have an account? <a href="{{ route('register') }}" class="text-pink-600 hover:underline">Sign up</a>
            </p>
        </form>
    </div>
</div>

@endsection
