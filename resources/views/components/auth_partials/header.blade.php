<nav class="bg-white shadow p-3 flex justify-between items-center">
    <!-- Left Section -->
    <div class="flex items-center space-x-2">
        <a href="/dashboard">
        <img src="{{asset('images/soul_logo.jpg')}}" alt="Logo" class="w-12 h-12 rounded-full  ">

        </a>
        <div class="hidden sm:flex items-center bg-gray-100 p-2 rounded-full">
            <svg class="w-4 h-4 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M10 2a8 8 0 106.32 3.16l4.09 4.1a1 1 0 01-1.42 1.42l-4.09-4.1A8 8 0 0010 2zM4 10a6 6 0 1112 0A6 6 0 014 10z" />
            </svg>
            <input type="text" placeholder="Search Soul Pair" class="bg-gray-100 outline-none text-sm">
        </div>
    </div>

    <!-- Middle Section -->
    <div class="hidden sm:flex space-x-16 md:space-x-16  justify-evenly ">
        <button class="text-blue-600">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
            </svg>
        </button>

        <button class="text-gray-500  hover:text-blue-600">
            <i class="fas fa-user-friends text-xl "></i>
        </button>

        <button class="text-gray-500 hover:text-blue-600">
            <i class="fas fa-heart text-2xl "></i>
        </button>

        <button class="text-gray-500 hover:text-blue-600">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2 2 0 0018 14V10a6 6 0 00-12 0v4a2 2 0 00-.595 1.595L5 17h10z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 20h0a2 2 0 002-2h-4a2 2 0 002 2z" />
            </svg>


        </button>
    </div>

    <!-- Right Section -->
    <div class="flex items-center space-x-4">
        <button class="text-gray-500 hover:text-blue-600">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M20 5.41L18.59 4 12 10.59 5.41 4 4 5.41 10.59 12 4 18.59 5.41 20 12 13.41 18.59 20 20 18.59 13.41 12z" />
            </svg>
        </button>
        <button class="text-gray-500 hover:text-blue-600">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-5l4 2.5-4 2.5z" />
            </svg>
        </button>
        <button class="text-gray-500 hover:text-blue-600">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 22c5.52 0 10-4.48 10-10S17.52 2 12 2 2 6.48 2 12s4.48 10 10 10zm-1-9h2V7h-2v6zm0 4h2v-2h-2v2z" />
            </svg>
        </button>

        <div class="relative  ">
            <!-- Profile Image (Toggle Button) -->
            <img src="{{asset('images/couple.png')}}" alt="Profile" class="w-10 h-10 rounded-full cursor-pointer  "
                onclick="toggleDropdown()">

            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="absolute right-0 mt-2 w-32 bg-white border rounded shadow-lg hidden">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="block w-auto px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>

    </div>
</nav>

<script>
    function toggleDropdown() {
    const dropdownMenu = document.getElementById('dropdownMenu');
    dropdownMenu.classList.toggle('hidden'); // Toggle the visibility of the dropdown
}

// Close the dropdown when clicking outside of it
document.addEventListener('click', function(event) {
    const dropdownMenu = document.getElementById('dropdownMenu');
    const profileImage = document.querySelector('.cursor-pointer');

    // Check if the click is outside of the dropdown or profile image
    if (!dropdownMenu.contains(event.target) && !profileImage.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
    }
});

</script>
