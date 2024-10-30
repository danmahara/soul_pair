<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to SoulPair</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('website/index.css') }}">
</head>

<body class="bg-gray-100 font-poppins text-gray-800">
    <header class="bg-[#ff6b6b] p-4 shadow-md">
        <nav class="flex justify-between items-center container mx-auto">
            <div class="text-white text-2xl font-bold"><a href="/" class=" no-underline " >SoulPair</a></div>
            <ul class="flex space-x-6">
                <li><a href="/" class="text-white hover:underline">Home</a></li>
                <li><a href="#hero" class="text-white hover:underline">Features</a></li>
                <li><a href="#" class="text-white hover:underline">About</a></li>
                <li><a href="#" class="text-white hover:underline">Contact</a></li>
            </ul>
            <a href="{{route('users.create')}}"
                class="bg-white bg-[#ff6b6b]py-2 px-4 rounded-full font-semibold transition hover:bg-red-100">Join
                Now</a>
        </nav>
    </header>

    <section class="hero bg-cover bg-center h-screen" style="background-image: url('/images/dating.avif');" >
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="text-center text-white max-w-lg">
                <h1 class="text-5xl font-bold mb-4">Find Your Perfect Match</h1>
                <p class="text-lg mb-6">Discover connections that matter with SoulPair. Join today and start your
                    journey to love.</p>
                <a href="#"
                    class="bg-[#ff6b6b] py-2 px-6 rounded-full text-white font-semibold transition hover:bg-red-600">Get
                    Started</a>
            </div>
        </div>
    </section>

    <section class="features py-16 text-center" id="hero">
        <h2 class="text-4xl font-bold text-[#ff6b6b] mb-8">Why Choose SoulPair?</h2>
        <div class="container mx-auto flex justify-center space-x-8">
            <div class="feature-item bg-white p-6 rounded-lg shadow-md w-72">
                <img src="{{asset('images/algo_match.png')}}" alt="Match Algorithm" class="w-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">Smart Match Algorithm</h3>
                <p>Our advanced AI matches you with compatible people based on your preferences and interests.</p>
            </div>
            <div class="feature-item bg-white p-6 rounded-lg shadow-md w-72">
                <img src="{{asset('images/privacy_control.webp')}}" alt="Privacy Control" class="w-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">Complete Privacy Control</h3>
                <p>You decide who can view your profile and photos, ensuring a secure dating experience.</p>
            </div>
            <div class="feature-item bg-white p-6 rounded-lg shadow-md w-72">
                <img src="{{asset('images/verified_profile.avif')}}" alt="Verified Profiles" class="w-32 mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">Verified Profiles</h3>
                <p>All profiles are verified to ensure authenticity, helping you find genuine connections.</p>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-4 text-center">
        <p>&copy; 2024 SoulPair. All rights reserved.</p>
    </footer>
</body>

</html>
