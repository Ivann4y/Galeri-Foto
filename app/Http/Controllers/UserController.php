<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Galeri;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Home';
        $foto = Galeri::latest()->get();
        $profil = User::where('id_user', auth()->id())->get();
        $user = User::where('id_user', auth()->id())->first();
        return view('user.index', compact('title', 'foto', 'profil', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id_user)
    {
        $pp = $id_user;
        $title = 'Add Profil';
        $profil = User::where('id_user', auth()->id())->get();
        $user = User::where('id_user', auth()->id())->first();
        return view('user.editProfil', compact('title', 'pp', 'profil', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $id_user)
    {
        $profil = request()->file('profil');
        $data = [
            'pp_user' => $profil->store(auth()->id())
        ];

        $id_user->update($data);
        session()->flash('Berhasil', 'Edit Profil Success');
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
