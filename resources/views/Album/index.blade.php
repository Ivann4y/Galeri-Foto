@extends('user.layouts.index')
@section('content')
    <div class="grid grid-cols-4 gap-4">
        <a href="/addAlbum" class="block pt-5 rounded-lg border-2 h-56 place-content-center hover:cursor-pointer bg-gray-100 hover:bg-gray-200">
            <p class="text-9xl text-center">+</p>
        </a>

        @foreach ($album as $item)
        <a href="/detailAlbum/{{ $item->id_album }}" class="block pt-5 rounded-lg border-2 h-56 place-content-center hover:cursor-pointer bg-gray-100 hover:bg-gray-200">
            <div class="flex text-2xl ml-5">
                <p class="font-semibold">{{ $item->nama_album }}</p>
                <p class="font-light ml-2">• {{ $item->created_at->format('j M Y') }}</p>
            </div>
            <div class="ml-5 mt-auto">
                <small>{{ $item->user->username }}</small>
            </div>
            <div class="mt-20 ml-5">
                <p>{{ $item->deskripsi }}</p>
            </div>
        </a>
        @endforeach
    </div>
@endsection
