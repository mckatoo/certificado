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
    	return view('certificados.index');
    }


    public function print()
    {
    	return 'Print';
    }
}
