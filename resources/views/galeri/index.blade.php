@extends('user.layouts.index')
@section('content')
    <h1 align="center">{{ $user->fullname }}</h1>
    <h1 align="center">{{ $user->username }}</h1>
    <h1 align="center">{{ $user->email }}</h1>
    <h1 align="center">{{ $user->alamat }}</h1>
    <div class="my-6">
        <a class="bg-gray-700 rounded-full fixed text-white grid place-items-center text-4xl w-16 h-16 bottom-5 right-5"
            href="/newImage">
            <p class="mb-2">+</p>
        </a>
    </div>
    <div class="grid grid-cols-4 gap-2">
        @foreach ($foto as $f)
            <a href="/edit/{{ $f->id_foto }}/{{ $f->user->username }}" class="bg-gray-300">
                <img src="{{ asset('storage/' . $f->path_foto) }}" alt="{{ $f->judul_foto }}" class="h-full object-cover">
            </a>
        @endforeach
    </div>
@endsection
