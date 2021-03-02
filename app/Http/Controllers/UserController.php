<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);

        return view('user.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('user.edit')->with('users', $users);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages=[
            'name.required' => 'NOMBRE OBLIGATORIO',
            'name.min' => 'Tu nombre debe tener mínimo 4 caracteres',
            'apellido.required' => 'APELLIDO OBLIGATORIO',
            'pais.required' => 'PAÍS OBLIGATORIO',


        ];
        $request->validate([
            'name' => 'required|min:4',
            'apellido' => 'required',
            'pais' => 'required',

        ], $messages);

        $newuser = User::findOrFail($id);
        $newuser->name = $request->name;
        $newuser->apellido = $request->apellido;
        $newuser->pais = $request->pais;

        $newuser->save();

        return redirect()->route('gestion');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = User::findOrFail($id);
        $u->delete();
        return redirect()->route('gestion');
    }
    /**
     *
     */

    public function gestion(){
        $u=User::all();

        return view("user.gestion")->with("gestion", $u);
    }

    /**
     *
     */

}
