@extends('user.layouts.index')
@section('content')
    <div class="flex gap-5">
        <div
            class="max-w-md">
            <img class="object-cover w-[500px] h-[500px]"
                src="{{ asset('storage/' . $foto->path_foto) }}" alt="">
        </div>
        <div>
            <h5 class="text-3xl font-bold">{{ $foto->judul_foto }}</h5>
            <small>{{ $foto->user->username }}</small>
            <p class="mt-5 font-normal text-gray-700 dark:text-gray-400">
                {{ $foto->deskripsi_foto ?? 'Tidak Ada Deskripsi' }}</p>
        </div>
    </div>
    </div>
@endsection
