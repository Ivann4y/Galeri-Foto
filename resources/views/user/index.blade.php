@extends('user.layouts.index')

@section('content')
    <div class="grid grid-cols-1 place-items-center w-full space-y-5">
        @foreach ($foto as $f)
            <a href="/detailFoto/{{ $f->id_foto }}"
                class="hover:scale-105 ease-in-out duration-300 hover:cursor-pointer h-auto w-auto">
                <img class="h-[500px] w-[500px] object-cover" src="{{ asset('storage/' . $f->path_foto) }}"
                    alt="{{ $f->judul_foto }}">
                <div>
                    <b>{{ $f->user->username }}</b> | {{ $f->judul_foto }}  
                </div>
            </a>
        @endforeach
    </div>
@endsection
