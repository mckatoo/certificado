<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function cadastros()
    {
        $institutos = \App\Instituto::with('diretor')->orderBy('created_at','desc')->get();
        $professores = \App\Professor::orderBy('created_at','desc')->get();
        $cursos = \App\Curso::orderBy('curso','asc')->get();
        return view('cadastros.index',compact('professores','institutos','cursos'));
    }
}
