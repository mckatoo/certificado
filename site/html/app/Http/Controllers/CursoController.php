<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	//
    }


    public function salvar(Request $request)
    {
        $this->validate($request, [
            'coordenador' => 'bail|required',
            'curso' => 'bail|required|unique:curso|max:150',
        ]);
        if (is_null($request->id)) {
            $c = new \App\Curso;
            $mensagem = 'Curso '.$request->curso.' cadastrado com sucesso!';
        } else {
            $c = \App\Curso::find($request->id);
            $mensagem = 'Curso '.$c->curso.' editado com sucesso!';
        }

        $c->coordenador = $request->coordenador;
        $c->curso = $request->curso;
        $c->save();

        return back()->with('success', $mensagem);
    }


    public function apagar(Request $request)
    {
        if (\App\Curso::find($request->id)) {
            $c = \App\Curso::find($request->id);
            $c->delete();
            return back()->with('success', 'Curso '.$c->curso.' deletado com sucesso!');
        } else {
            return back()->withErrors('Curso não encontrado!');
        }
    }
}
