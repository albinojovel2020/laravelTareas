<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importo el modelo de mi tabla de bdd llamado Task
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        //Index es el metodo para mostrar registros de la tabla con la cual queremos controlar el fulo de Task
        $task = Task::paginate(5);

        return view('task.index', compact('task'));
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
        $tarea = new Task;
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->estado = $request->estado;
        $tarea->save();
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('task.index', compact('task'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Primero, obtenemos el objeto Task que deseamos actualizar
        $tarea = Task::find($request->id);
        //  dd($tarea);

        // Luego, actualizamos sus atributos con los valores del formulario
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->estado = $request->estado;

        // Guardamos los cambios en la base de datoss
        $tarea->save();

        // Redirigimos de vuelta a la vista index después de la actualización
        return redirect()->route('task.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Task::find($id);
        $tarea->delete();
        return redirect()->route('task.index');
    }
}