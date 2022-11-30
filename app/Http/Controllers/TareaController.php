<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tarea\StoreRequest;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Llama al modelo de la base de datos
        $tareas = Tarea::all();
        return view('tasks.index', [
            // Referenciamos a la carpeta
            'tareas' => $tareas
        ]);
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
    // IMPORTANTE exporat el StoreRequest que creaste 
    public function store(StoreRequest $request)
    {
        // dd($request->all());
        // Only se encarga de agrupar variables de $request->....
        // $request->all()
        // $request->name
        // $request->description
        // $request->date

        $data = $request->only('name','description','date');
        Tarea::create($data);

        // Retorna un mensaje de creacion
        return redirect()->back()->with('success','Tarea creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    // Llama a una sola de las tareas
    public function edit(Tarea $tarea)
    {
        return view('tasks.edit',[
            'tarea' => $tarea
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        // Pasamos los campoa a actualizar
        $data = $request->only('name','description','date','status');
        // Con este comando actualizamos la data hecha
        $tarea->update($data);

        return redirect()->back()->with('success','Tarea actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->back()->with('success','Elemento eliminado correctamente');
    }
}
