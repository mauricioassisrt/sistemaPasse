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
    //pega os dados do formulario  Novo cadastro de passe livre e adiciona no objeto estudante  e direciona para view
    //verificacao cpf
    public  function verificaCpf(Request $request)
    {
        try {

            $objetoEstudante = new Estudante();
            //  $var = $request->all();
            $objetoEstudante->nomeAluno = $request->nomeAluno;
            $objetoEstudante->responsavel = $request->responsavel;
            $objetoEstudante->naturalidade = $request->naturalidade;
            $objetoEstudante->telefone = $request->telefone;
            return view('estudante.cpf', compact('objetoEstudante'));
        } catch (\Throwable $th) {
            return view('layout.erro', compact('th'));
        }
    }
    // ao clicar no botao sim na tela Informações sobre CPF ? entra no metodo possui CPF, e após isso redireciona para a view dadosAluno
    public function possuiCpf(Request $request)
    {
        try {
            $dadosPessoaisAluno =  $request->dadosPessoais;
            return view('estudante.dadosAluno',  compact('dadosPessoaisAluno'));
        } catch (\Throwable $th) {
            return view('layout.erro', compact('th'));
        }
    }
    // ao clicar no botão nao na tela Informações sobre CPF ?  redireciona para tela de dados pessoais do responsavel
    public function naoPossuiCpf(Request $request)
    {
        try {

            $dadosPessoaisAluno =  $request->dadosPessoais;

            return view('estudante.dadosResponsavel',  compact('dadosPessoaisAluno'));
        } catch (\Throwable $th) {
            return view('layout.erro', compact('th'));
        }
    }

    // ao preencher os dados ou da tela do aluno ou da tela do responsavel ele é direcionado para este metodo, dados estes pessoais
    //onde o mesmo verifica as informações que vieram do formulario
    public function dadosSerie(Request $request)
    {
        try {
            $objetoEstudante = new Estudante();
            $objetoEstudante = json_decode($request->dadosPessoaisAluno);

            //verifica se o campo vier possuiCpf == 1 o aluno possui cpf caso contrario ele não possui ai cai no else
            if ($request->possuiCpf == 1 && $request->hasFile('rgAlunoFoto') && $request->hasFile('cpfAlunoFoto')) {
                //parte na qual verifica o input que veio um arquivo
                $cpfFoto = $request->file('cpfAlunoFoto');
                $rgFoto = $request->file('rgAlunoFoto');

                //define o diretorio que sera a pasta public/alunos/cpf
                $dir = "alunos" . '/' . $request->cpfAluno;
                //pega o tipo de extensão do arquivo
                $extencaoCpf = $cpfFoto->guessClientExtension();
                $extencaoRg = $rgFoto->guessClientExtension();
                //monta o arquivo seguido da extencao
                $arquivoRgMover =  $objetoEstudante->nomeAluno . "-RG" . "." . $extencaoRg;
                $arquivoCpfMover =  $objetoEstudante->nomeAluno . "-CPF" . "." . $extencaoCpf;
                //move o arquivo para a pasta
                $rgFoto->move($dir, $arquivoRgMover);
                $cpfFoto->move($dir, $arquivoCpfMover);

                $objetoEstudante->rgResponsavel = "O Aluno possui CPF ";
                $objetoEstudante->cpfResponsavel = "O Aluno possui CPF ";
                $objetoEstudante->rgResponsavelFoto = "Vazio";
                $objetoEstudante->cpfResponsavelFoto = "Vazio";
                $objetoEstudante->certidaoNascimentoAlunoFoto = "Vazio";
                $objetoEstudante->rgAlunoFoto = $dir . "/" . $arquivoRgMover;
                $objetoEstudante->cpfAlunoFoto = $dir . "/" . $arquivoCpfMover;
                $objetoEstudante->rgAluno = $request->rgAluno;
                $objetoEstudante->cpfAluno = $request->cpfAluno;
                $objetoEstudante->possuiCpf = 1;
                //converter objeto em json
                $dados = json_encode($objetoEstudante);

                return view('estudante.escolaridade', compact('dados'));
            } else if ($request->hasFile('rgResponsavelFoto') && $request->hasFile('cpfResponsavelFoto') && $request->hasFile('certidaoNascimentoAlunoFoto')) {

                $objetoEstudante = new Estudante();
                $objetoEstudante = json_decode($request->dadosPessoaisAluno);

                $cpfFoto = $request->file('cpfResponsavelFoto');
                $rgFoto = $request->file('rgResponsavelFoto');
                $certidao = $request->file('certidaoNascimentoAlunoFoto');

                // $numero = rand(1111, 9999);
                $dir = "alunos" . '/' . $request->cpfResponsavel;
                $extencaoCpf = $cpfFoto->guessClientExtension();
                $extencaoRg = $rgFoto->guessClientExtension();
                $extencaoCertidao = $certidao->guessClientExtension();
                $arquivoRgMover =  $objetoEstudante->nomeAluno . "-RG-responsavel" . "." . $extencaoRg;
                $arquivoCpfMover =  $objetoEstudante->nomeAluno . "-CPF-responsavel-" . "." . $extencaoCpf;
                $arquivoCertidaoMover =  $objetoEstudante->nomeAluno . "-CERTIDAO-responsavel" . "." . $extencaoCertidao;
                $rgFoto->move($dir, $arquivoRgMover);
                $cpfFoto->move($dir, $arquivoCpfMover);
                $certidao->move($dir, $arquivoCertidaoMover);

                $objetoEstudante->rgResponsavel = $request->rgResponsavel;
                $objetoEstudante->cpfResponsavel = $request->cpfResponsavel;
                $objetoEstudante->rgResponsavelFoto = $dir . "/" . $arquivoRgMover;
                $objetoEstudante->cpfResponsavelFoto = $dir . "/" . $arquivoCpfMover;
                $objetoEstudante->certidaoNascimentoAlunoFoto = $dir . "/" . $arquivoCertidaoMover;
                $objetoEstudante->possuiCpf = 0;
                //converter objeto em json
                $dados = json_encode($objetoEstudante);

                return view('estudante.escolaridade', compact('dados'));
            }
        } catch (\Throwable $th) {

            return view('layout.erro', compact('th'));
        }
    }
    //metodo de finalização de cadastro, neste ele irá pegar todas as informações vinda do formulario e salvar no banco de dados
    public function finalizaCadastro(Request $request)
    {

        try {
            $objetoEstudante = new Estudante();
            //decode JSON dados aluno
            $dadosPessoaisEstudante = json_decode($request->dadosAluno);
            if ($request->hasFile('declaracaoMatriculaFoto') && $dadosPessoaisEstudante->possuiCpf == 0) {
                $declaracaoMatricula = $request->file('declaracaoMatriculaFoto');

                $dir = "alunos" . '/' . $dadosPessoaisEstudante->cpfResponsavel;
                $extencao = $declaracaoMatricula->guessClientExtension();
                $nomeImagem =  $dadosPessoaisEstudante->nomeAluno . "-DECLARACAO-MATRICULA" . "." . $extencao;
                $declaracaoMatricula->move($dir, $nomeImagem);
                // $objetoEstudante->declaracaoMatriculaFoto = $dir . "/" . $nomeImagem;
                dd($nomeImagem);
            } else if ($request->hasFile('declaracaoMatriculaFoto')) {
                $declaracaoMatricula = $request->file('declaracaoMatriculaFoto');
                // $numero = rand(1111, 9999);

                $dir = "alunos" . '/' . $dadosPessoaisEstudante->cpfAluno;
                $extencao = $declaracaoMatricula->guessClientExtension();
                $nomeImagem =  $dadosPessoaisEstudante->nomeAluno . "-DECLARACAO-MATRICULA" . "." . $extencao;
                $declaracaoMatricula->move($dir, $nomeImagem);
                dd("DENTRO DO ELSE");
            }

            // $objetoEstudante->nomeAluno = $dadosPessoaisEstudante->nomeAluno;
            // $objetoEstudante->responsavel = $dadosPessoaisEstudante->responsavel;
            // $objetoEstudante->naturalidade = $dadosPessoaisEstudante->naturalidade;
            // $objetoEstudante->telefone = $dadosPessoaisEstudante->telefone;
            // //JSON dados do responsavel
            // $objetoEstudante->rgResponsavel = $dadosPessoaisResponsavel->rgResponsavel;
            // $objetoEstudante->cpfResponsavel = $dadosPessoaisResponsavel->cpfResponsavel;
            // $objetoEstudante->rgResponsavelFoto = $dadosPessoaisResponsavel->rgResponsavelFoto;
            // $objetoEstudante->cpfResponsavelFoto = $dadosPessoaisResponsavel->cpfResponsavelFoto;
            // $objetoEstudante->certidaoNascimentoAlunoFoto = $dadosPessoaisResponsavel->certidaoNascimentoAlunoFoto;
            // $objetoEstudante->instituicao = $request->instituicao;
            // $objetoEstudante->serie = $request->turno;
            // $objetoEstudante->curso = $request->curso;
            // $objetoEstudante->obs = $request->obs;
            // $objetoEstudante->declaracaoMatriculaFoto = $request->declaracaoMatriculaFoto;
        } catch (\Throwable $th) {
            dd($th);
            return view('layout.erro', compact('th'));
        }
    }
}