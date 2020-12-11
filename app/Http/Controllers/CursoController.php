<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCurso;

class CursoController extends Controller
{
    public function index() {

        $cursos = Curso::orderBy('id', 'desc')->paginate();

        return view('cursos.index', compact('cursos'));
    }

    public function create() {
        return view('cursos.create');
    }

    public function store(StoreCurso $request) {

        //return $request->all();
        // $curso = new Curso();

        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // //return $curso;
        // $curso->save();

        // return $request->all();

        $curso = Curso::create($request->all());

        return redirect()->route('cursos.show', $curso);
    }
    public function show(Curso $curso) {

        //$curso = Curso::find($id);
        //return $curso;
        //return view('cursos.show', ['z' => $curso]);
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso){
        //$curso = Curso::find($id);

        //return $curso;
        //return $curso;
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso){
        //return $request->all();
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);

        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // //return $curso;
        // $curso->save();

        $curso->update($request->all());
        return view('cursos.show', compact('curso'));
    }
}
