<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        //Metodos para validar campos
        $validated = $request->validate([
            'name'       => 'required|min:2|max:255',
            'telefone'   => 'nullable|min:9',
            'gender'     => 'nullable|min:1|max:1',
            'address'    => 'nullable|min:1|max:150',
        ]);

        //Metodos para atuzalizar o user
        $user = User::find (auth()->id());

        $user->name       = $request->name;
        $user->telefone   = $request->telefone;
        $user->gender     = $request->gender;
        $user->address    = $request->address;

        $user->save();

        return redirect()->back()->with(['message' => 'Perfil Actualizado com sucesso.']);
    }

}
