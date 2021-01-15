<?php

namespace App\Http\Controllers;

use App\Andamento;
use App\Estudante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AndamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $objetoEstudantes = Estudante::paginate(2);

            return view('andamentos.index', compact('objetoEstudantes'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Andamento  $andamento
     * @return \Illuminate\Http\Response
     */
    public function show(Andamento $andamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Andamento  $andamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Andamento $andamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Andamento  $andamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Andamento $andamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Andamento  $andamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Andamento $andamento)
    {
        //
    }
    public function search(Request $request)
    {
    }
    public function consulta_situacao(Request $request)
    {
        return view("andamentos.detalhes");
    }
    //PROTOCOLO CONSULTA E REDIRECT
    public function consultarSituacaoParametros(Request $request)
    {
        try {
            if (!empty($request->consultaProtocolo) ){
                $objetoEstudante = Estudante::where([['protocolo', '=', $request->consultaProtocolo]])->first();
                return view('andamentos.detalhes', compact('objetoEstudante'));
            } elseif (!empty($request->consultaCPF)) {
                $objetoEstudante = Estudante::where([['cpf_aluno', '=', $request->consultaCPF]])->first();
                return view('andamentos.detalhes', compact('objetoEstudante'));
            } else {
                $dados = array(
                    'retorno' =>  "true",
                    'cpf' => $request->consultaCPF,
                    'protocolo' => $request->consultaProtocolo,
                );
                return view('estudante.consultar', $dados);
            }
        } catch (\Throwable $th) {
            dd($th);
            //return view('layout.erro', compact('th'));
        }
    }
    //PROTOCOLO VIEW
    public function consultarSituacao()
    {
        $dados = array(
            'retorno' =>  "none",
            'cpf' => '',
            'protocolo' => '',
        );
        return view('estudante.consultar', $dados);
    }
    //REALIZAR ANDAMENTO USER AUTENTICADO
    public function realizar_andamento(Estudante $objetoEstudante)
    {
        try {

            return view('andamentos.detalhes', compact('objetoEstudante'));
        } catch (\Throwable $th) {
            dd($th);
            //return view('layout.erro', compact('th'));
        }
    }
}
