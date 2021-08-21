<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos["estudiantes"]=Estudiante::all();
        //$hola = 'hola soy un mensaje';

        //return view('estudiantes.index')->with('estudiantes',$datos);

       return view('estudiantes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       //$datos["estudiantes"]=Estudiante::all();
       //return view('estudiantes.create',$datos);
       return view('estudiantes.create');
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
        //$datos=request();

        /*DB::table('estudiantes')->insert([
            'nombre' => $datos['nombre'],
            'edad' => $datos['edad']
        ]);*/
        $datos=request()->except('_token');
        Estudiante::insert($datos);
        return redirect('/estudiantes')->with('estudianteGuardado','Estudiante guardado con exito');
        //return dd($datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante=Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
        //return dd($estudiante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos= request()->except(['_token', '_method']);
        Estudiante::where('id','=',$id)->update($datos);
        return redirect('/estudiantes')->with('estudianteModificado','Estudiante modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$id = $estudiante->id;
        Estudiante::destroy($id);
        return back()->with('estudianteEliminado','Estudiante eliminado con exito');

    }
}
