<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
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

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
