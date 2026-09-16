<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rut' => 'required|string|max:20|unique:users,rut',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', 'ends_with:@ventasfix.cl'],
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'rut' => $request->rut,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }
}
