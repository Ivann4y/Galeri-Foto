<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Http\Requests\StoreGaleriRequest;
use App\Http\Requests\UpdateGaleriRequest;
use App\Models\User;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Profile';
        $user = User::where('id_user', auth()->id())->first();
        return view('galeri.index', compact('title', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create new post';
        return view('galeri.create', compact('title'));
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
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGaleriRequest $request, Galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        //
    }
}
