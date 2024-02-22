<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Http\Requests\StoreGaleriRequest;
use App\Http\Requests\UpdateGaleriRequest;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Profile';
        $user = User::where('id_user', auth()->id())->first(); 
        $foto = Galeri::where('id_user', auth()->id())->get();
        $profil = User::where('id_user', auth()->id())->get();
        // dd($profil);
        return view('galeri.index', compact('title', 'user', 'foto', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create new post';
        $user = User::where('id_user', auth()->id())->first(); 
        $profil = User::where('id_user', auth()->id())->get();
        return view('galeri.create', compact('title', 'user', 'profil'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGaleriRequest $request)
    {
        // dd($request);
        $foto = request()->file('foto');
        // dd(request()->file('foto'));
        $data = [
            'judul_foto' => request('title'),
            'deskripsi_foto' => request('describe'),
            'path_foto' => $foto->store(auth()->id()),
            'id_user' => auth()->id()
        ];
        // dd(Galeri::create($data));
        Galeri::create($data);
        session()->flash('berhasil', 'Upload berhasil');
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $id_foto)
    {
        $title = 'Detail foto';
        $foto = $id_foto;
        $user = User::where('id_user', auth()->id())->first(); 
        $profil = User::where('id_user', auth()->id())->get();
        return view('galeri.detail', compact('title', 'foto', 'user','profil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $id_foto)
    {
        $foto = $id_foto;
        $title = 'Edit Foto';
        $user = User::where('id_user', auth()->id())->first(); 
        $profil = User::where('id_user', auth()->id())->get();
        return view('galeri.edit', compact('foto', 'title', 'user', 'profil'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGaleriRequest $request, Galeri $id_foto)
    {
        // dd($id_foto);
        $data = [
            'judul_foto' => request('title'),
            'deskripsi_foto' => request('describe')
        ];

        $id_foto->update($data);
        session()->flash('berhasil', 'Update Success');
        return redirect('/profile');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $id_foto)
    {
        Storage::delete($id_foto->path_foto);
        $id_foto->destroy($id_foto->id_foto);

        session()->flash('Berhasil', 'Delete foto success');
        return redirect('/profile');
    }
}
