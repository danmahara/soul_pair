@extends('components.auth_partials.default')

@section('content')

@include('components.alerts')

<h1>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>

<form action="{{ route('logout') }}" method="post">
    @csrf
    <button class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 ">Logout</button>
</form>


@endsection
