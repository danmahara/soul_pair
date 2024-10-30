@extends('components.guest_partials.default')
@section('content')

@include('components.alerts')
<section class="hero bg-cover bg-center h-[50vh] md:h-screen" style="background-image: url('/images/dating.avif');">
    <div class="flex items-center justify-center h-full bg-black bg-opacity-50 px-4">
        <div class="text-center text-white max-w-xs md:max-w-lg">
            <h1 class="text-3xl md:text-5xl font-bold mb-2 md:mb-4">Find Your Perfect Match</h1>
            <p class="text-sm md:text-lg mb-4 md:mb-6">Discover connections that matter with SoulPair. Join today
                and start your journey to love.</p>
            <a href="#"
                class="bg-[#ff6b6b] py-2 px-4 md:px-6 rounded-full text-white font-semibold transition hover:bg-red-600">Get
                Started</a>
        </div>
    </div>
</section>

<section class="features py-8 md:py-16 text-center" id="hero">
    <h2 class="text-2xl md:text-4xl font-bold text-[#ff6b6b] mb-4 md:mb-8">Why Choose SoulPair?</h2>
    <div class="max-w-[1320px] grid mx-auto lg:grid-cols-4 gap-5 md:grid-cols-2 sm:grid-cols-1 px-[20px]">

        <div class="feature-item bg-white p-4 md:p-6 rounded-lg shadow-md">
            <img class="w-24 md:w-32 mx-auto mb-4  object-contain " src="{{asset('images/couple.png')}}" alt="couple" />
            <h2 class="text-lg md:text-xl font-semibold mb-2">Discover New Connections</h2>
            <p class="text-gray-700">Explore profiles of like-minded
                individuals and start chatting instantly.</p>
        </div>

        <div class="feature-item bg-white p-4 md:p-6 rounded-lg shadow-md">
            <img src="https://openui.fly.dev/openui/400x300.svg?text=💘" alt="heart"
                class="w-24 md:w-32 mx-auto mb-4" />
            <h3 class="text-lg md:text-xl font-semibold mb-2">Find True Love</h3>
            <p class="text-gray-700">Let love find its way to you. Our platform helps you find your soulmate.</p>
        </div>
        <!-- Repeat for other feature items -->

        <div class="feature-item bg-white p-4 md:p-6 rounded-lg shadow-md">
            <img src="{{asset('images/algo_match.png')}}" alt="Match Algorithm" class="w-32 mx-auto mb-4">
            <h3 class="text-xl font-semibold mb-2">Smart Match Algorithm</h3>
            <p>Our advanced AI matches you with compatible people based on your preferences and interests.</p>
        </div>
        <div class="feature-item bg-white p-4 md:p-6 rounded-lg shadow-md">
            <img src="{{asset('images/privacy_control.webp')}}" alt="Privacy Control" class="w-32 mx-auto mb-4">
            <h3 class="text-xl font-semibold mb-2">Complete Privacy Control</h3>
            <p>You decide who can view your profile and photos, ensuring a secure dating experience.</p>
        </div>
        <div class="feature-item bg-white p-4 md:p-6 rounded-lg shadow-md">
            <img src="{{asset('images/verified_profile.avif')}}" alt="Verified Profiles" class="w-32 mx-auto mb-4">
            <h3 class="text-xl font-semibold mb-2">Verified Profiles</h3>
            <p>All profiles are verified to ensure authenticity, helping you find genuine connections.</p>
        </div>
    </div>
</section>

@endsection