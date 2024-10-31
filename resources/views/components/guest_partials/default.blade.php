<!DOCTYPE html>
<html lang="en">

@include('components.guest_partials.head')

<body class="bg-gray-100 font-poppins text-gray-800">

    <div class="min-h-screen flex flex-col"> {{-- Ensure this div takes full height --}}

        {{-- header --}}
        @include('components.guest_partials.header')

        <div class="flex-grow"> {{-- Make main content flexible to push footer down --}}
            {{-- start main content --}}
            @yield('content')
        </div>

        @include('components.guest_partials.footer')

    </div>

</body>

</html>
