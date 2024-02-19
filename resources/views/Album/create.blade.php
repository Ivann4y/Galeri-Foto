@extends('user.layouts.index')
@section('content')
<div class="text-4xl font-semibold">
    <h1>New Album</h1>
    <form class="max-w-sm">
        <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
            option</label>
            <select multiple id="countries_multiple" name="album"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose countries</option>
            @foreach ($foto as $f)
            <option value="{{ $f->id_foto }}">{{ $f->judul_foto }}</option>
            @endforeach
        </select>
    </form>
</div>
@endsection
