<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        \Carbon\Carbon::setLocale('pt_BR');
    }


    public function index()
    {
        $institutos = \App\Instituto::with('diretor')->orderBy('created_at','desc')->get();
        $professores = \App\Professor::orderBy('created_at','desc')->get();
        $certificados = \App\Certificado::orderBy('created_at','desc')->get();
        $cursos = \App\Curso::orderBy('curso','asc')->get();
        $lotes = \App\Lote::orderBy('created_at','desc')->get();
        return view('certificados.index',compact('professores','institutos','cursos','certificados','lotes'));
    }


    public function salvar(Request $request)
    {
        $this->validate($request, [
            'descricao' => 'bail|required',
        ]);
        if (is_null($request->id)) {
            $l = new \App\Lote;
            $mensagem = 'Lote de descrição '.$request->descricao.' adastrado com sucesso.';
        } else {
            $l = \App\Lote::find($request->id);
            $mensagem = 'Lote de '.$request->descricao.' editado com sucesso.';
        }

        $l->descricao = $request->descricao;
        $l->save();

        return back()->with('success', $mensagem);
    }


    public function apagar(Request $request)
    {
        if (\App\Certificado::find($request->id)) {
            $c = \App\Certificado::find($request->id);
            $c->delete();
            return back()->with('success', 'Certificado de '.$c->nome.' realizado em '.$c->realizado_em.' deletado com sucesso!');
        } else {
            return back()->withErrors('Certificado não encontrado!');
        }
    }
}
