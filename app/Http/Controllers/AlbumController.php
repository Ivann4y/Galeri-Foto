<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Galeri;
use App\Models\User;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Album';
        $profil = User::where('id_user', auth()->id())->get();
        $user = User::where('id_user', auth()->id())->first();
        $album = Album::where('id_user', auth()->id())->get();
        return view('Album.index', compact('title', 'profil', 'user', 'album'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Album';
        $foto = Galeri::where('id_user', auth()->id())->get();
        $profil = User::where('id_user', auth()->id())->get();
        $user = User::where('id_user', auth()->id())->first();
        return view('album.create', compact('title', 'foto', 'profil', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        $data = [
            'nama_album' => request('nama'),
            'deskripsi' => request('deskripsi'),
            'id_user' => auth()->id()
        ];

        Album::create($data);
        session()->flash('Berhasil', 'Add album success');
        return redirect('/albums');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_album)
    {
        $title = 'Detaill Album';
        $album = Album::with(['user', 'galeri'])->find($id_album);
        $foto = Galeri::with('user')->get();
        $user = User::where('id_user', auth()->id())->first();
        $profil = User::where('id_user', auth()->id())->get();
        // dd($album);
        return view('album.detail', compact('title', 'album', 'user', 'profil', 'foto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
    }
}
