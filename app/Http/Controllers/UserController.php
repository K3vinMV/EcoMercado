<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Mostrar el formulario para editar el usuario
    public function edit(User $user)
    {
        if ($user->id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'No tienes permiso para editar esta información.');
        }

        return view('users.edit', compact('user'));
    }

    // Actualizar la información del usuario
    public function update(Request $request, User $user)
    {
        if ($user->id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'No tienes permiso para actualizar esta información.');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'contacto' => 'nullable|string|max:255',
        ]);

        $user->update($data);

        return redirect()->route('dashboard')->with('success', 'Tu información ha sido actualizada.');
    }
}

