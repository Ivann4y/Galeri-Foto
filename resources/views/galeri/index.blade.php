@extends('user.layouts.index')
@section('content')
    <h1 align="center">{{ $user->fullname }}</h1>
    <h1 align="center">{{ $user->username }}</h1>
    <h1 align="center">{{ $user->email }}</h1>
    <h1 align="center">{{ $user->alamat }}</h1>
    <a class="bg-gray-700 rounded-full fixed text-white grid place-items-center text-4xl w-16 h-16 bottom-5 right-5" href="/newImage">
        <p class="mb-1">+</p>
    </a>
@endsection