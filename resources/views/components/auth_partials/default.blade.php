<!DOCTYPE html>
<html lang="en">

@include('components.guest_partials.head')

<body class="bg-gray-100 font-poppins text-gray-800">

    <div class="page">

        {{-- header --}}
        @include('components.auth_partials.header')

        <div>
            {{-- start main content --}}
            @yield('content')
        </div>

        @include('components.guest_partials.footer')

    </div>

</body>

</html>
