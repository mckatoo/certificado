<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use PDF;

class CertificadosController extends Controller
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
            'instituto' => 'bail|required',
            'nome' => 'bail|required',
            'titulo' => 'bail|required',
            'carga_horaria' => 'bail|required',
            'nota' => 'bail',
            'realizado_em' => 'bail|required|date_format:d/m/Y',
            'curso' => 'bail|required',
            'lote' => 'bail',
        ]);
        if (is_null($request->id)) {
            $c = new \App\Certificado;
            $mensagem = 'Certificado de '.$request->nome.' realizado em '.$request->realizado_em.' cadastrado com sucesso.';
        } else {
            $c = \App\Certificado::find($request->id);
            $mensagem = 'Certificado de '.$request->nome.' realizado em '.$request->realizado_em.' editado com sucesso.';
        }

        $c->instituto_id = $request->instituto;
        $c->nome = $request->nome;
        $c->titulo = $request->titulo;
        $c->carga_horaria = $request->carga_horaria;
        $c->nota = $request->nota;
        $c->realizado_em = DateTime::createFromFormat('d/m/Y', $request->realizado_em);
        $c->curso_id = $request->curso;
        $c->lote_id = $request->lote;
        $c->save();

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


    public function print($id)
    {
        $certificado = \App\Certificado::find($id);
        $instituto = \App\Instituto::with('diretor')->find($certificado->instituto_id);
        $curso = \App\Curso::with('coordenador')->find($certificado->curso_id);
        $fundo = base_path().'/public/images/fundo.png';
        $logotipo = storage_path().'/logotipo/'.$instituto->nome.'/'.$instituto->logotipo;
        // return view('certificados.print', compact('certificado','curso','instituto','logotipo','fundo'));
        $pdf = PDF::loadView('certificados.print', compact('certificado','curso','instituto','fundo','logotipo'));
        return $pdf->setPaper('a4', 'landscape')->stream();
    }


    public function download($id)
    {
        $certificado = \App\Certificado::find($id);
        $instituto = \App\Instituto::with('diretor')->find($certificado->instituto_id);
        $curso = \App\Curso::with('coordenador')->find($certificado->curso_id);
    	return view('certificados.print', compact('certificado','curso','instituto'));
    }
}
