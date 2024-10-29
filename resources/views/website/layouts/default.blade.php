<!DOCTYPE html>
<html lang="en">

@include('website.layouts.partials.head')

<body class="bg-gray-100 font-poppins text-gray-800">

    <div class="page">

        {{-- header --}}
        @include('website.layouts.partials.header')

        <div>

            {{-- start main content --}}
            @yield('content')
        </div>

        @include('website.layouts.partials.footer')

    </div>

</body>

</html>