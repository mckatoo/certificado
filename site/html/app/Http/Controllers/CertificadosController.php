<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificadosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $institutos = \App\Instituto::with('diretor')->orderBy('created_at','desc')->get();
        $professores = \App\Professor::orderBy('created_at','desc')->get();
        $cursos = \App\Curso::orderBy('curso','asc')->get();
        return view('certificados.index',compact('professores','institutos','cursos'));
    }


    public function print()
    {
    	return 'Print';
    }
}
