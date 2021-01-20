<?php

namespace App\Http\Controllers;

use App\Andamento;
use App\Estudante;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if (Auth::check()) {
                $objetoEstudantes = Estudante::paginate(10);

                return view('andamentos.index', compact('objetoEstudantes'));
            } else {
                dd('user nao autenticado');
            }

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Andamento $andamento
     * @return \Illuminate\Http\Response
     */
    public function show(Andamento $andamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Andamento $andamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Andamento $andamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Andamento $andamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Andamento $andamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Andamento $andamento
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
            $status = Status::all();
            $consulta_por_protocolo = Estudante::where([['protocolo', '=', $request->consultaProtocolo]])->first();
            $consulta_por_cpf = Estudante::where([['cpf_aluno', '=', $request->consultaCPF]])->first();

            if (!empty($request->consultaProtocolo) && !empty($consulta_por_protocolo)) {
                $objetoEstudante = $consulta_por_protocolo;

                $andamentos = Andamento::where('estudante_id', $objetoEstudante->id)->orderBy('data', 'DESC')->paginate(10);

                return view('andamentos.detalhes', compact('objetoEstudante', 'status', 'andamentos'));
            } elseif (!empty($request->consultaCPF) && !empty($consulta_por_cpf)) {
                $objetoEstudante = $consulta_por_cpf;

                $andamentos = Andamento::where('estudante_id', $objetoEstudante->id)->orderBy('data', 'DESC')->paginate(10);

                return view('andamentos.detalhes', compact('objetoEstudante', 'status', 'andamentos'));
            } else {
                $dados = array(
                    'retorno' => "true",
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
            'retorno' => "none",
            'cpf' => '',
            'protocolo' => '',
        );
        return view('estudante.consultar', $dados);
    }

    //REALIZAR ANDAMENTO USER AUTENTICADO
    public function realizar_andamento(Estudante $objetoEstudante)
    {
        try {

            $status = Status::all();
            $andamentos = Andamento::where('estudante_id', $objetoEstudante->id)->orderBy('data', 'DESC')->paginate(10);

            if (!empty($andamentos)) {

                return view('andamentos.detalhes', compact('objetoEstudante', 'status', 'andamentos'));

            } else {
                dd('error');
                return view('andamentos.detalhes', compact('objetoEstudante', 'status', 'andamentos'));
            }


        } catch (\Throwable $th) {
            dd($th);
            //return view('layout.erro', compact('th'));
        }
    }

    public function novo_andamento(Request $request)
    {
        try{
            $objetoAndamento = $request->all();
            $objetoAndamento['data']= date('Y-m-d H:i:s');


            $andamento = Andamento::create($objetoAndamento);

            return redirect()->to("andamentos/iniciar/" .$andamento->estudante_id);
        }catch (\Throwable $th) {
            dd($th);
            //return view('layout.erro', compact('th'));
        }
    }

    public function finalizar(Request $request)
    {
        dd('no finalizar');
    }
}
