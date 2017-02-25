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

        $c = new \App\Curso;
        $c->coordenador = $request->coordenador;
        $c->curso = $request->curso;
        $c->save();

        return back()->with('success', 'Curso '.$c->nome.' cadastrado com sucesso!');
    }


    public function apagar(Request $request)
    {
    	# code...
    }
}
