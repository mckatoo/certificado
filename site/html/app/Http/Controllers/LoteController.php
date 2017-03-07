<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use PDF;

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
            'nome' => 'bail|required',
        ]);
        if (is_null($request->id)) {
            $c = new \App\Certificado;
            $mensagem = 'Certificado de "'.$request->nome.'" cadastrado com sucesso.';
        } else {
            $c = \App\Certificado::find($request->id);
            $mensagem = 'Certificado de '.$request->nome.' editado com sucesso.';
        }
        $l = \App\Lote::find($request->lote);

        $c->nome = $request->nome;
        $c->titulo = $l->titulo;
        $c->carga_horaria = $l->carga_horaria;
        $c->realizado_em = $l->realizado_em;
        $c->instituto_id = $l->instituto_id;
        $c->curso_id = $l->curso_id;
        $c->lote_id = $request->lote;
        $c->save();

        return back()->with('success', $mensagem);
    }


    public function salvarLote(Request $request)
    {
        $this->validate($request, [
            'descricao' => 'bail|required',
            'titulo' => 'bail|required',
            'carga_horaria' => 'bail|required',
            'realizado_em' => 'bail|required',
            'instituto' => 'bail|required',
            'curso' => 'bail|required',
        ]);
        if (is_null($request->id)) {
            $l = new \App\Lote;
            $mensagem = 'Lote de descrição "'.$request->descricao.'" cadastrado com sucesso.';
        } else {
            $l = \App\Lote::find($request->id);
            $mensagem = 'Lote de '.$request->descricao.' editado com sucesso.';
        }

        $l->descricao = $request->descricao;
        $l->titulo = $request->titulo;
        $l->carga_horaria = $request->carga_horaria;
        $l->realizado_em = DateTime::createFromFormat('d/m/Y', $request->realizado_em);
        $l->instituto_id = $request->instituto;
        $l->curso_id = $request->curso;
        $l->save();

        return back()->with('success', $mensagem);
    }


    public function apagar(Request $request)
    {
        if (\App\Lote::find($request->id)) {
            $l = \App\Lote::find($request->id);
            $l->delete();
            return back()->with('success', 'Lote com descrição "'.$l->descricao.'" deletado com sucesso!');
        } else {
            return back()->withErrors('Lote não encontrado!');
        }
    }


    public function print($id)
    {
        $certificado = \App\Certificado::where('lote_id',$id)->get();
        foreach ($certificado as $c) {
	        $instituto = \App\Instituto::with('diretor')->find($c->instituto_id);
	        $curso = \App\Curso::with('coordenador')->find($c->curso_id);
        }
        $fundo = base_path().'/public/images/fundo.png';
        $logotipo = storage_path().'/logotipo/'.$instituto->nome.'/'.$instituto->logotipo;
        $pdf = PDF::loadView('certificados.printLotes', compact('certificado','curso','instituto','fundo','logotipo'));
        return $pdf->setPaper('a4', 'landscape')->stream();
    }
}
