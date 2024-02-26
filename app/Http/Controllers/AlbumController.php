<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Galeri;
use App\Models\Like;
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
        $title = 'Detail Album';
        $album = Album::with(['user', 'galeri'])->find($id_album);
        $editAlbum = Album::where('id_user', auth()->id())->first();
        $foto = Galeri::with('user')->get();
        $user = User::where('id_user', auth()->id())->first();
        $profil = User::where('id_user', auth()->id())->get();
        // dd($album);
        return view('album.detail', compact('title', 'album', 'user', 'profil', 'foto', 'editAlbum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $id_album)
    {
        $title = 'Edit Album';
        $profil = User::where('id_user', auth()->id())->get();
        $user = User::where('id_user', auth()->id())->first();
        $album = $id_album;
        return view('Album.edit', compact('title', 'profil', 'user', 'album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $id_album)
    {
        $data = [
            'nama_album' => request('nama'),
            'deskripsi' => request('deskripsi'),

        ];

        $id_album->update($data);
        session()->flash('Berhasil', 'Album berhasil di edit');
        return redirect('/albums');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Album $id_album)
    {

        // Ambil semua galeri yang terkait dengan album
        $galeris = Galeri::where('id_album', $id_album->id_album)->get();

        // Hapus semua likes yang terkait dengan galeri yang terkait dengan album
        foreach ($galeris as $galeri) {
            Like::where('id_foto', $galeri->id_foto)->delete();
        }
        // Hapus semua galeri terkait dengan album
        Galeri::where('id_album', $id_album->id_album)->delete();

        // Hapus album setelah semua galeri terkait telah dihapus
        $id_album->delete();

        session()->flash('Berhasil', 'Album berhasil dihapus');

        return redirect('/albums');
    }
}
