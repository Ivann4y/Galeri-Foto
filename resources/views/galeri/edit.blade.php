@extends('user.layouts.index')
@section('content')
    <div class="grid grig-cols-4 place-items-center gap-2">
        <img src="{{ asset('storage/' . $foto->path_foto) }}" alt="{{ $foto->judul_foto }}" class="h-96 object-cover">
    </div>
    <form action="/edit/{{ $foto->id_foto }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mt-6">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title Post</label>
            <input value="{{ $foto->judul_foto }}" name="title" type="text" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="my-6">
            <label for="describe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Describe</label>
            <textarea name="describe" id="describe" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >{{ $foto->deskripsi_foto }}</textarea>
        </div>
        <button type="submit"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
        </form>
        <form action="/delete/{{ $foto->id_foto }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('delete')
            <button type="submit"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
        </form>
@endsection
