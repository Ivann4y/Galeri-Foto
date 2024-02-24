@extends('user.layouts.index')
@section('content')
    @foreach ($album->galeri as $item)
    
        <div class="grid grid-cols-4 gap-4">
            <img class="h-full object-cover" src="{{ asset('storage/' . $item->path_foto) }}" alt="">
        </div>
    @endforeach 
@endsection
