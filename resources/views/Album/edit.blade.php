@extends('user.layouts.index')
@section('content')
    <div class="text-4xl font-semibold">
        <h1><u>Edit Album</u></h1>

        <form action="/editAlbum/{{ $album->id_album }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-2 mt-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Album</label>
                <input type="nama" id="nama" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $album->nama_album }}" required />
            </div>
            <div class="mb-2">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                    Album</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $album->deskripsi }}</textarea>
            </div>
            <div class="flex">
                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>
        </form>
        <button data-modal-target="modal-album" data-modal-toggle="modal-album"
            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
            type="button">
            Delete
        </button>
    </div>
    </div>
    @include('Album.modalDelete')
@endsection
