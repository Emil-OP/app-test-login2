<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Client;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::with('client')->get();
        //
        return view('profiles.index', compact('profiles'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $profile = $client->profile;
        //
        return view('profiles.show', compact('client','profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $profile = $client->profile;
        //
        return view('profiles.edit', compact('client', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'phone' => 'required',
            'biography' => 'nullable'
        ]);

        // updateOrCreate asegura que si no existe el perfil, lo crea; si existe, lo actualiza.
        $client->profile()->updateOrCreate(
            ['client_id' => $client->id],
            $data
        );
        //
        return back()->with('success', 'Perfil actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        //
        return redirect()->route('profiles.index')->with('success', 'Perfil eliminado.');
    }
}
