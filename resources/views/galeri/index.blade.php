@extends('user.layouts.index')
@section('content')
    <div
        class="object-left ml-5 mb-14 bg-white rounded-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-2">
        <div class="py-8 px-8 max-auto">
            @foreach ($profil as $item)
                @if ($item->pp_user)
                    <img class="block h-28 w-28 rounded-full" src="{{ asset('storage/' . $item->pp_user) }}" alt="user photo">
                @else
                    <img class="block h-28 w-28 rounded-full"
                        src="https://th.bing.com/th/id/OIP.WObojLGEnOeoiPB6Y1bfJwAAAA?w=269&h=196&c=7&r=0&o=5&pid=1.7"
                        alt="user photo">
                @endif
            @endforeach
        </div>
        <div class="flex items-center sm:text-left">
            <div class="space-y-0.5">
                <div class="inline-flex">
                    <p class="text-2xl font-semibold">@</p>
                    <p class="text-2xl text-black font-semibold">
                        {{ $user->username }}
                    </p>
                    <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 20" fill="currentColor"
                            class="ml-1 mt-1 w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </p>
                </div>
                <p class="text-slate-500 font-medium">
                    {{ $user->fullname }}
                </p>
                <p>
                    {{ $countlike }} Likes  |   {{ $countfoto }} Photos
                </p>
                <a href="/editProfil/{{ $user->id_user }}/{{ $user->username }}">
                    <button type="submit"
                        class="mt-2 text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-blue-800">Edit
                        Profil</button>
                </a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 ml-5">
        @foreach ($foto as $f)
            <div>
                <div>
                    <a href="/edit/{{ $f->id_foto }}/{{ $f->user->username }}" class="bg-gray-300">
                        <img src="{{ asset('storage/' . $f->path_foto) }}" alt="{{ $f->judul_foto }}"
                            class="h-full object-cover">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-6">
        <a class="bg-gray-700 rounded-full fixed text-white grid place-items-center text-4xl w-16 h-16 bottom-5 right-5"
            href="/newImage">
            <p class="mb-2">+</p>
        </a>
    </div>
@endsection
