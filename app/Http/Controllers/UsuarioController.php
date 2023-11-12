<?php

namespace App\Http\Controllers;

use App\bitacora;
use App\User as Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( auth()->user()->id_rol == 2 ){
            return redirect()->route('home')->withErrors('No tienes permiso para acceder.');
        }

        $users = Usuario::where('estado', 1)
            ->orderBy('id_rol', 'ASC')
            ->orderBy('name', 'ASC')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( auth()->user()->id_rol == 2 ){
            return redirect()->route('home')->withErrors('No tienes permiso para acceder.');
        }

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( auth()->user()->id_rol == 2 ){
            return redirect()->route('home')->withErrors('No tienes permiso para acceder.');
        }

        $this->validate($request, [
            'id_rol' => 'required',
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users,email',
            'password' => 'required|min:4',
        ]);

        $request['password'] = Hash::make($request['password']);
        $request['estado'] = 1;

        Usuario::create($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha registrado al usuario " . $request['name'];
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        if ( auth()->user()->id_rol == 2 ){
            return redirect()->route('home')->withErrors('No tienes permiso para acceder.');
        }

        return view('users.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        if ( auth()->user()->id_rol == 2 ){
            return redirect()->route('home')->withErrors('No tienes permiso para acceder.');
        }

        $this->validate($request, [
            'id_rol' => 'required',
            'name' => 'required|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($usuario->id, 'id')
            ],
            'password' => 'nullable|min:4',
        ]);

        if ( !empty($request->get('password')) ){
            $request['password'] = Hash::make($request['password']);
        }

        $usuario->id_rol = $request->get('id_rol');
        $usuario->name = $request->get('name');
        $usuario->email =$request->get('email');
        if ( !empty($request->get('password')) ){
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->update();

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha actualizado al usuario " . $request['name'];
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        if ( auth()->user()->id_rol == 2 ){
            return redirect()->route('home')->withErrors('No tienes permiso para acceder.');
        }

        $usuario->estado = 0;
        $usuario->email = $usuario->email . '_' . now();
        $usuario->update();

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha eliminado al usuario" . $usuario->name;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario eliminado correctamente.');
    }
}
