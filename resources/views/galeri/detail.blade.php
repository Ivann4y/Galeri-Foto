@extends('user.layouts.index')
@section('content')
    <div class="grid grid-cols-2">
        <div
            class="max-w-md">
            <img class="object-cover w-[500px] h-[500px]"
                src="{{ asset('storage/' . $foto->path_foto) }}" alt="">
        </div>
        <div>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $foto->judul_foto }}
            </h5>
            <small>{{ $foto->user->username }}</small>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $foto->deskripsi_foto ?? 'Tidak Ada Deskripsi' }}</p>
        </div>
    </div>
    </div>
@endsection
