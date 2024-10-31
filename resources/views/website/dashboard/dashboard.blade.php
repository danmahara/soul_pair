@extends('components.auth_partials.default')
@section('content')


<!-- Main Content -->
<div class="flex flex-col md:flex-row h-screen">
    <!-- Toggle Button for Sidebar (Visible only on small screens) -->
    <button id="sidebarToggle" class="md:hidden w-1/12 p-2 m-4 bg-blue-500 text-white rounded-md focus:outline-none"
        onclick="toggleSidebar()">
        ☰
    </button>

    <!-- Left Sidebar -->
    <aside id="sidebar"
        class="w-full md:w-1/4 p-4 shadow-lg transform md:transform-none -translate-x-full md:translate-x-0 transition-transform duration-300 fixed md:relative z-20 ">
        <nav class="flex flex-col space-y-4">
            <a href="" class="text-gray-700 w-full hover:text-blue-600">Profile</a>
            <a href="" class="text-gray-700 hover:text-blue-600">Friends</a>
            <a href="#" class="text-gray-700 hover:text-blue-600">Activity</a>
            <a href="#" class="text-gray-700 hover:text-blue-600">Settings</a>
        </nav>
    </aside>

    <!-- Overlay for Sidebar (Visible only when sidebar is open on small screens) -->
    <div id="sidebarOverlay" class="hidden md:hidden  fixed inset-0 bg-black opacity-50 z-10" onclick="toggleSidebar()">
    </div>

    <!-- Middle Content -->
    <main class="flex-1 w-full md:w-2/3 p-8 pt-0  ml-0 md:ml-1/4">
        <div class="mb-4">
            <h2 class="text-2xl font-semibold">Welcome, {{ Auth::user()->first_name }} !</h2>
        </div>

        <div id="userContainer" class="bg-white p-6 rounded-lg shadow-lg mb-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <img id="userImage" src="{{ asset('images/couple.png') }}" class="w-full h-auto object-contain rounded-lg"
                alt="Profile image">
            <div class="flex flex-col justify-between">
                <div>
                    <p id="userName" class="text-2xl font-semibold mb-2"></p>
                    <p id="userAddress" class="text-gray-600 mb-4"></p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="flex space-x-4">
                        <button onclick="showPreviousUser()"
                            class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">Previous</button>
                        <button onclick="showNextUser()"
                            class="bg-[#bf8d76] text-white px-4 py-2 rounded-lg hover:bg-[#a66b5d] transition duration-200">Pass</button>
                        <button onclick="showNextUser()"
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Like</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Friends List on Right Side -->
    <aside class="hidden md:block w-1/4 p-4 shadow-lg">
        <h2 class="text-xl font-bold mb-4">Friends</h2>
        <ul class="space-y-2">
            <li class="flex items-center space-x-3">
                <span class="w-8 h-8 bg-gray-300 rounded-full"></span>
                <p>User</p>
            </li>
            <li class="flex items-center space-x-3">
                <span class="w-8 h-8 bg-gray-300 rounded-full"></span>
                <p>User</p>
            </li>
            <li class="flex items-center space-x-3">
                <span class="w-8 h-8 bg-gray-300 rounded-full"></span>
                <p>User</p>
            </li>
            <li class="flex items-center space-x-3">
                <span class="w-8 h-8 bg-gray-300 rounded-full"></span>
                <p>User</p>
            </li>
        </ul>
    </aside>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.toggle('bg-white');  // Ensures the sidebar has a white background when opened
        overlay.classList.toggle('hidden');
        document.getElementById("sidebar").style.width = "300px";
    }

</script>
{{-- Pass users to JavaScript --}}
<script>
    const users = @json($users); // Laravel's way to pass PHP data to JS
    let currentIndex = 0;

    // Function to display the current user
    function displayUser(index) {
        if (index < 0 || index >= users.length) {
            console.log("Index out of bounds:", index);
            document.getElementById('userContainer').innerHTML = "<p>No more users to display.</p>";
            return;
        }

        const user = users[index];
        console.log("Displaying user at index:", index, user);
        document.getElementById('userImage').src = "{{ asset('images/couple.png') }}"; // Update to user-specific image if needed
        document.getElementById('userName').textContent = `${user.first_name} ${user.last_name} (${user.age} years)`;
        document.getElementById('userAddress').textContent = `${user.address} (X miles away)`; // Calculate "miles away" if needed
    }

    // Show the next user
    function showNextUser() {
        if (currentIndex < users.length - 1) {
            currentIndex++;
            console.log("Next user index:", currentIndex);
            displayUser(currentIndex);
        } else {
            currentIndex=0
            displayUser(currentIndex)
        }
    }

    // Show the previous user
    function showPreviousUser() {
        if (currentIndex > 0) {
            currentIndex--;
            console.log("Previous user index:", currentIndex);
            displayUser(currentIndex);
        } else {
            // alert("This is the first user.");
            currentIndex=users.length-1;
            displayUser(currentIndex);
        }
    }

    // Initial display of the first user
    displayUser(currentIndex);
</script>
@endsection
