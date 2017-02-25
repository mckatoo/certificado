<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

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
        if (is_null($request->id)) {
            $this->validate($request, [
                'diretor' => 'bail|required',
                'logotipo' => 'bail|required',
                'nome' => 'bail|required|unique:instituto|max:45',
            ]);
            $i = new \App\Instituto;
            $acao = 'cadastrado';
        } else {
            $this->validate($request, [
                'diretor' => 'bail|required',
                'logotipo' => 'bail',
                'nome' => 'bail|required|max:45',
            ]);
            $i = \App\Instituto::find($request->id);
            $acao = 'editado';
        }
        

        $i->diretor = $request->diretor;

        if (($request->logotipo !== null) and ($request->logotipo->isValid())) {
            $logotipo = $request->logotipo;
            $localArmazem = storage_path().'/logotipo/'.$request->nome.'/';
            $logotipo_sanitizado = filter_var($logotipo->getClientOriginalName(), FILTER_SANITIZE_URL);
            if (file_exists($localArmazem.$logotipo_sanitizado)) {
                unlink($localArmazem.$logotipo_sanitizado);
            }
            $logotipo->move($localArmazem, $logotipo_sanitizado);
            $i->logotipo = $logotipo_sanitizado;
        }

        $i->nome = $request->nome;
        $i->save();

        return back()->with('success', 'Instituto '.$i->nome.' '.$acao.' com sucesso!');
    }


    public function apagar(Request $request)
    {
        if (\App\Instituto::find($request->id)) {
            $i = \App\Instituto::find($request->id);
            $i->delete();
            return back()->with('success', 'Instituto '.$i->nome.' deletado com sucesso!');
        } else {
            return back()->withErrors('Instituto não encontrado!');
        }
    }


    public function showLogo($institutoId)
    {
        $i = \App\Instituto::where('id',$institutoId)->first();
        $arquivo = storage_path().'/logotipo/'.$i->nome.'/'.$i->logotipo;

        if(!File::exists($arquivo)) abort(404);

        $file = File::get($arquivo);
        $type = File::mimeType($arquivo);

        $response = \Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
