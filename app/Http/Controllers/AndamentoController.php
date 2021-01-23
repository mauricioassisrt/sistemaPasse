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
                $objetoEstudantes =Estudante::where([['gratuidade', '=', null ]])->orderBy('data_cadastro', 'DESC')->paginate(10);

                return view('andamentos.index', compact('objetoEstudantes'));
            } else {
               return  redirect('login');
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }
    /*
     * ESTUDANTES NOS QUAIS JÁ FORAM RETIRAR O CARTAO NO TERMINAL RODOVIARIO
     */
    public function estudantes_com_cartao()
    {
        try {
            if (Auth::check()) {
                $objetoEstudantes =Estudante::where([['cartao_entregue', '=', true ]])->orderBy('data_cadastro', 'DESC')->paginate(10);

                return view('andamentos.estudantes_com_cartao', compact('objetoEstudantes'));
            } else {
                return  redirect('login');
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }
    /*
     * ESTUDANTES NOS QUAIS JÁ POSSUEM O PERFIL AVALIADO E NÃO VIERAM RETIRAR O CARTÃO
     */
    public function estudantes_sem_cartao()
    {
        try {
            if (Auth::check()) {
                $objetoEstudantes =Estudante::where([['cartao_entregue', '=', null ]])->orderBy('data_cadastro', 'DESC')->paginate(10);

                return view('andamentos.estudantes_sem_cartao', compact('objetoEstudantes'));
            } else {
                return  redirect('login');
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }


    public function search(Request $request)
    {
    }
    /*
     * DETALHES DO PERFIL DO ESTUDANTE PARA REALIZAR ANDAMENTOS
     */
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

    public function finalizar(Request $request, Estudante $objetoEstudante)
    {
        try {
            $objeto_estudante = $request->all();
            $objetoEstudante->update($objeto_estudante);
            return redirect('andamentos');
        }catch (\Throwable $th){
            dd('error');
        }
    }

    public function entregar_cartao(Request $request, Estudante $objetoEstudante)
    {
        try {

            $objeto_estudante = $request->all();
            $objetoEstudante->update($objeto_estudante);
            return redirect('estudanteRetirarCartao');
        }catch (\Throwable $th){
            dd('error');
        }
    }



}
