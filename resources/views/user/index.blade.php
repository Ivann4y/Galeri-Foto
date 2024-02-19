@extends('user.layouts.index')

@section('content')
    <div class="grid grid-cols-1 place-items-center w-full space-y-10">
        @foreach ($foto as $f)
            <a href="/detailFoto/{{ $f->id_foto }}"
                class="hover:scale-105 ease-in-out duration-300 hover:cursor-pointer h-auto w-auto">
                <div class="inline-flex mb-5 text-xl">
                    <p class="font-semibold">
                        <b>{{ $f->user->username }}</b>
                    </p>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 20" fill="currentColor" class="w-6 h-6 mr-2">
                            <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                        </svg>
                    </p>
                    <p class="font-light">
                        {{ $f->created_at->diffForHumans() }}
                    </p>
                </div>
                <img class="h-[500px] w-[500px] object-cover" src="{{ asset('storage/' . $f->path_foto) }}"
                    alt="{{ $f->judul_foto }}">
                <div class="text-lg inline-flex gap-3">
                    <div class="flex text-lg">
                        <p class="font-semibold">{{ $f->user->username }}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 20"
                            fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p>{{ $f->judul_foto }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
