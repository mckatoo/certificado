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
        if (is_null($request->id)) {
            $p = new \App\Professor;
            $mensagem = 'Professor '.$request->professor.' cadastrado com sucesso!';
        } else {
            $p = \App\Professor::find($request->id);
            $mensagem = 'Professor '.$p->professor.' editado com sucesso!';
        }

        $p->tratamento = $request->tratamento;
        $p->professor = $request->professor;
        $p->save();

        return back()->with('success', $mensagem);
    }


    public function apagar(Request $request)
    {
    	if (\App\Professor::find($request->id)) {
            $p = \App\Professor::find($request->id);
            $p->delete();
            return back()->with('success', 'Professor '.$p->professor.' deletado com sucesso!');
        } else {
            return back()->withErrors('Professor não encontrado!');
        }
    }

    public function procurar($palavra)
    {
    	
    }
}
