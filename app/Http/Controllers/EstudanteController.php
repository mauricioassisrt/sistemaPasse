<?php

namespace App\Http\Controllers;

use App\Estudante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estudante.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function consultarSituacao(Request $request)
    {
        return view('estudante.consultar');
    }
    public function possuiCpf(Request $request)
    {
        try {

            $objetoEstudante = new Estudante();
            //  $var = $request->all();
            $objetoEstudante->nomeAluno = $request->nomeAluno;
            $objetoEstudante->responsavel = $request->responsavel;
            $objetoEstudante->naturalidade = $request->naturalidade;
            $objetoEstudante->telefone = $request->telefone;


            // $objetoEstudante = (object)$request->all();

            return view('estudante.cpf', compact('objetoEstudante'));
        } catch (\Throwable $th) {
            return view('estudante.index');
        }
    }
    public function naoPossuiCpf(Request $request)
    {
        try {
            // $json =  $request->dadosPessoais;
            // $dadosPessoaisEstudante = json_decode($json);

            $dadosPessoaisAluno =  $request->dadosPessoais;

            return view('estudante.dadosResponsavel',  compact('dadosPessoaisAluno'));
        } catch (\Throwable $th) {
            echo "erro";
        }
    }
    public function dadosAluno(Request $request)
    {
        dd($request);
    }

    public function dadosResponsavel(Request $request)
    {
        try {
            // $json =  $request->dadosPessoais;
            // $dadosPessoaisEstudante = json_decode($json);
            $dadosPessoaisAluno =  $request->dadosPessoaisAluno;
            $objetoEstudante = new Estudante();
            $objetoEstudante->rgResponsavel = $request->rgResponsavel;
            $objetoEstudante->cpfResponsavel = $request->cpfResponsavel;
            $objetoEstudante->rgResponsavelFoto = $request->rgResponsavelFoto;
            $objetoEstudante->cpfResponsavelFoto = $request->cpfResponsavelFoto;
            $objetoEstudante->certidaoNascimentoAlunoFoto = $request->certidaoNascimentoAlunoFoto;

            return view('estudante.escolaridade', compact('dadosPessoaisAluno', 'objetoEstudante'));
        } catch (\Throwable $th) {
            echo "erro";
        }
    }
    public function escolaridade(Request $request)
    {
        dd($request->all());
    }
}
