@extends('user.layouts.index')
@section('content')
    <div class="flex gap-5">
        <div class="max-w-md">
            <img class="object-cover w-[400px] h-[400px]" src="{{ asset('storage/' . $foto->path_foto) }}" alt="">
        </div>
        <div>
            <div class="flex">
                <a href="/" class="border-2 rounded-lg inline-block hover:bg-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mt-1 w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <h5 class="ml-5 text-3xl font-bold">{{ $foto->judul_foto }}</h5>
            </div>

            <small>{{ $foto->user->username }}</small>
            <p class="mt-5 font-normal text-gray-700 dark:text-gray-400">
                {{ $foto->deskripsi_foto ?? 'Tidak Ada Deskripsi' }}</p>
        </div>
    </div>
    </div>
@endsection
