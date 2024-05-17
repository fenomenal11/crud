<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Docente;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('docente')->get();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $docentes = Docente::all();
        return view('cursos.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:50',
            'docente_id' => 'required|string|max:8|exists:docentes,id',
            'estado' => 'required|boolean',
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso creado exitosamente.');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    //public function edit(Docente $docente)
    //{
    //    $personas = Persona::all();
    //    return view('docentes.edit', compact('docente', 'personas'));
    //}

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $docentes = Docente::all();
        return view('cursos.edit', compact('curso', 'docentes'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:50',
            'docente_id' => 'required|string|max:8|exists:docentes,id',
            'estado' => 'required|boolean',
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }
}