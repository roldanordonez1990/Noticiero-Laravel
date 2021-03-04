<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('noticia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('noticia.create ');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'fecha.required' => 'FECHA OBLIGATORIA',
            'titulo.required' => 'TITULO OBLIGATORIO',
            'titulo.min' => 'El título debe ser superior a 10 caracteres',
            'descripcion.required' => 'DESCRIPCION OBLIGATORIA',
            'descripcion.max' => 'No puede sobrevapasar los 9999 caracteres',
            'imagen.required' => 'IMAGEN OBLIGATORIA',

        ];
            $request->validate([
            'fecha' => 'required',
            'titulo' => 'required|min:10',
            'descripcion' => 'required|max:9999',
            'imagen' => 'required|image',
        ], $messages);

        $newNotice = new Noticia();
        $newNotice->fecha = $request->fecha;
        $newNotice->categoria = $request->categoria;
        $newNotice->titulo = $request->titulo;
        $newNotice->user_id = Auth::id();
        $newNotice->descripcion = $request->descripcion;
        $nombreimagen = time() . '_' . $request->file('imagen')->getClientOriginalName();

        $newNotice->imagen = $nombreimagen;
        $newNotice->save();
        $request->file('imagen')->storeAs('public/img', $nombreimagen);
        if($request->categoria == 1){
            return redirect()->route('deportes');
        }
        if($request->categoria == 2){
            return redirect()->route('actualidad');
        }
        if($request->categoria == 3){
            return redirect()->route('ciencia');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $usu = User::all();
        $notices = Noticia::findOrFail($id);
        $url = 'storage/img/';
        return view('noticia.show')->with('notices', $notices)->with('url', $url)->with('usu', $usu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notices = Noticia::findOrFail($id);
        $url = 'storage/img/';
        return view('noticia.edit')->with('notices', $notices)->with('url', $url);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function deportes()
    {
        $d = Noticia::where("categoria", 1)->get();

        return view("noticia.deportes")->with("deportivas", $d);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function actualidad()
    {
        $d = Noticia::where("categoria", 2)->get();

        return view("noticia.actualidad")->with("actualidades", $d);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function ciencia()
    {
        $d = Noticia::where("categoria", 3)->get();

        return view("noticia.ciencia")->with("ciencias", $d);
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
        $messages=[
            'fecha.required' => 'FECHA OBLIGATORIA',
            'titulo.required' => 'TITULO OBLIGATORIO',
            'titulo.min' => 'El título debe ser superior a 10 caracteres',
            'descripcion.required' => 'DESCRIPCION OBLIGATORIA',
            'descripcion.max' => 'No puede sobrevapasar los 9999 caracteres',


        ];
        $request->validate([
            'fecha' => 'required',
            'titulo' => 'required|min:10',
            'descripcion' => 'required|max:9999',

        ], $messages);

        $newNotice = Noticia::findOrFail($id);
        $newNotice->fecha = $request->fecha;
        $newNotice->categoria = $request->categoria;
        $newNotice->titulo = $request->titulo;
        $newNotice->user_id = Auth::id();
        $newNotice->descripcion = $request->descripcion;


        if (is_uploaded_file($request->imagen)) {
            $nombreimagen = time() . '_' . $request->file('imagen')->getClientOriginalName();
            $newNotice->imagen = $nombreimagen;
            $request->file('imagen')->storeAs('public/img', $nombreimagen);

        }

        $newNotice->save();
        if ($newNotice->categoria == 1) {
            return redirect()->route('deportes');

        }
        if ($newNotice->categoria == 2) {
            return redirect()->route('actualidad');

        }
        if ($newNotice->categoria == 3) {
            return redirect()->route('ciencia');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newNotice = Noticia::findOrFail($id);
        $newNotice->delete();

        if ($newNotice->categoria == 1) {
            return redirect()->route('deportes');

        }
        if ($newNotice->categoria == 2) {
            return redirect()->route('actualidad');

        }
        if ($newNotice->categoria == 3) {
            return redirect()->route('ciencia');

        }
    }
}
