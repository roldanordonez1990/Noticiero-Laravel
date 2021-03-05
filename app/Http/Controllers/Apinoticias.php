<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class Apinoticias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return response()->json($noticias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'fecha' => ['required', 'date'],
            'titulo' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'imagen' => ['required', 'string'],
        ]);

        Noticia::create([
            'fecha' => $request->fecha,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,

        ]);

        return response()->json(['result', 'OK']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticias = Noticia::findOrFail($id);
        return response()->json($noticias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);

        Validator::make($request->all(), [
            'fecha' => ['required', 'date'],
            'titulo' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'imagen' => ['required', 'string'],
        ]);


        $noticia->fecha = $request->fecha;
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;
        $noticia->imagen = $request->imagen;

        $noticia->save();
        return response()->json(['result', 'OK']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Noticia::destroy($id);
       return response()->json(['result', 'OK']);
    }
}
