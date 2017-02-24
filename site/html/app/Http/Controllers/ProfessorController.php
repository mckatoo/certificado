<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	# code...
    }


    public function salvar(Request $request)
    {
    	$this->validate($request, [
    		'tratamento' => 'bail|required|max:20',
    		'professor' => 'bail|required|max:150',
    	]);

        $p = new \App\Professor;
        $p->tratamento = $request->tratamento;
        $p->professor = $request->professor;
        $p->save();

        return back()->with('success', 'Professor '.$p->nome.' cadastrado com sucesso!');
    }


    public function apagar(Request $request)
    {
    	# code...
    }

    public function procurar($palavra)
    {
    	
    }
}
