@extends('user.layouts.index')

@section('content')
    <div class="grid grid-cols-1 place-items-center space-y-10 w-full mr-50">
        @foreach ($foto as $f)
            <div class="border-4 rounded-lg">
                <div class="flex mb-5 text-sm mx-2 my-2">
                    @if ($f->user->pp_user)
                        <img class="w-10 mr-1 h-10 rounded-full" src="{{ asset('storage/' . $f->user->pp_user) }}"
                            alt="user photo">
                    @else
                        <img class="w-10 mr-1 h-10 rounded-full"
                            src="https://th.bing.com/th/id/OIP.WObojLGEnOeoiPB6Y1bfJwAAAA?w=269&h=196&c=7&r=0&o=5&pid=1.7"
                            alt="user photo">
                    @endif
                    <p class="font-semibold mt-2">
                        <b>{{ $f->user->username }}</b>
                    </p>
                    <p class="mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 20" fill="currentColor"
                            class="w-6 h-6 mr-2">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </p>
                    <p class="font-light mt-2">
                        <b class="mr-2">•</b>{{ $f->created_at->diffForHumans() }}
                    </p>
                </div>
                <div class="">
                    <img class="w-[500px] h-[500px] object-cover" src="{{ asset('storage/' . $f->path_foto) }}"
                        alt="{{ $f->judul_foto }}">
                </div>
                <div class="ml-2 mt-2 flex">
                    <form method="POST" enctype="multipart/form-data" action="/like/{{ $galeri->id_foto }}" class="">
                        @csrf
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $like ? 'red' : 'none' }}" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </button>
                    </form>
                    <a href="/detailFoto/{{ $f->id_foto }}"
                        class="text-xl pb-px grid place-content-center rounded-full h-6 w-6 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>
                </div>
                <div class="text-lg ml-2 inline-flex gap-2 mb-2">
                    <div class="flex">
                        <p class="text-base font-semibold">{{ $f->user->username }}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 20" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-base">{{ $f->judul_foto }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
