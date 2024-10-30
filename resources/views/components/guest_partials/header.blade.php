<header class="bg-[#ff6b6b] p-4 shadow-md">
    <nav class="flex flex-wrap items-center justify-between container mx-auto">
        <div class="text-white text-2xl font-bold">
            <a href="/" class="no-underline">SoulPair</a>
        </div>
        <ul class="hidden md:flex space-x-6">
            <li><a href="/" class="text-white hover:underline">Home</a></li>
            <li><a href="#hero" class="text-white hover:underline">Features</a></li>
            <li><a href="#" class="text-white hover:underline">About</a></li>
            <li><a href="#" class="text-white hover:underline">Contact</a></li>
        </ul>
        <a href="{{ route('register.submit') }}"
            class="hidden md:inline-block bg-white py-2 px-4 rounded-full font-semibold transition hover:bg-red-100 text-[#ff6b6b]">Join
            Now</a>

        <!-- Mobile Menu -->
        <div class="block md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <!-- Hamburger icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <ul id="mobile-menu" class="hidden flex-col space-y-4 mt-4 text-center bg-[#ff6b6b] p-4 rounded shadow-md">
                <li><a href="/" class="text-white block">Home</a></li>
                <li><a href="#hero" class="text-white block">Features</a></li>
                <li><a href="#" class="text-white block">About</a></li>
                <li><a href="#" class="text-white block">Contact</a></li>
                <li><a href="{{ route('register.submit') }}"
                        class="bg-white py-2 px-4 rounded-full font-semibold text-[#ff6b6b] block">Join Now</a></li>
            </ul>
        </div>
    </nav>
</header>


<script>
    document.getElementById("menu-toggle").onclick = function() {
            var menu = document.getElementById("mobile-menu");
            menu.classList.toggle("hidden");
        };
</script>
