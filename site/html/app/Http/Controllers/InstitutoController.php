<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstitutoController extends Controller
{
    public function index()
    {
    	# code...
    }


    public function salvar(Request $request)
    {
    	$this->validate($request, [
    		'diretor' => 'bail|required',
    		'logotipo' => 'bail|required|max:200',
    		'nome' => 'bail|required|max:45',
    	]);
    }


    public function apagar(Request $request)
    {
    	# code...
    }
}
