<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstitutoController extends Controller
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
    		'diretor' => 'bail|required',
    		'logotipo' => 'bail|required',
    		'nome' => 'bail|required|max:45',
    	]);

        $i = new \App\Instituto;
        $i->diretor = $request->diretor;

        if ($request->logotipo->isValid()) {
            $logotipo = $request->logotipo;
            $localArmazem = storage_path().'/logotipo/'.$i->id.'/';
            $logotipo_sanitizado = filter_var($logotipo->getClientOriginalName(), FILTER_SANITIZE_URL);
            if (file_exists($localArmazem.$logotipo_sanitizado)) {
                unlink($localArmazem.$logotipo_sanitizado);
            }
            $logotipo->move($localArmazem, $logotipo_sanitizado);
            $i->logotipo = $logotipo_sanitizado;
        }

        $i->nome = $request->nome;
        $i->save();

        return back()->with('success', 'Instituto '.$i->nome.' cadastrado com sucesso!');
    }


    public function apagar(Request $request)
    {
    	# code...
    }


    public function showLogo($institutoId)
    {
        $i = \App\Instituto::where('id',$institutoId)->first();
        $arquivo = storage_path().'/logotipo/'.$institutoId.'/'.$i->logotipo;

        if(!File::exists($arquivo)) abort(404);

        $file = File::get($arquivo);
        $type = File::mimeType($arquivo);

        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
