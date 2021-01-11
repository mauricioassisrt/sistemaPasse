<?php

namespace App\Http\Controllers;

use App\Estudante;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{


    public function index()
    {
        return view('estudante.index');
    }

    //pega os dados do formulario  Novo cadastro de passe livre e adiciona no objeto estudante  e direciona para view
    //verificacao cpf
    public  function verificaCpf(Request $request)
    {
        try {

            $objetoEstudante = new Estudante();
            //  $var = $request->all();
            $objetoEstudante->nome_aluno = $request->nomeAluno;
            $objetoEstudante->responsavel = $request->responsavel;
            $objetoEstudante->naturalidade = $request->naturalidade;
            $objetoEstudante->telefone = $request->telefone;

            return view('estudante.cpf', compact('objetoEstudante'));
        } catch (\Throwable $th) {
            //dd($th);
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
    public function dadosAluno(Request $request)
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
                $arquivoRgMover =  $objetoEstudante->nome_aluno . "-RG" . "." . $extencaoRg;
                $arquivoCpfMover =  $objetoEstudante->nome_aluno . "-CPF" . "." . $extencaoCpf;
                //move o arquivo para a pasta
                $rgFoto->move($dir, $arquivoRgMover);
                $cpfFoto->move($dir, $arquivoCpfMover);

                $objetoEstudante->rg_responsavel = "O Aluno possui CPF ";
                $objetoEstudante->cpf_responsavel = "O Aluno possui CPF ";
                $objetoEstudante->certidao_nascimento_aluno_foto = "O Aluno possui CPF ";
                $objetoEstudante->rg_responsavel_foto = "Vazio";
                $objetoEstudante->cpf_responsavel_foto = "Vazio";
                $objetoEstudante->certidao_nascimento_alunoFoto = "Vazio";
                $objetoEstudante->rg_aluno_foto = $dir . "/" . $arquivoRgMover;
                $objetoEstudante->cpf_aluno_foto = $dir . "/" . $arquivoCpfMover;
                $objetoEstudante->rg_aluno = $request->rgAluno;
                $objetoEstudante->cpf_aluno = $request->cpfAluno;
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
                $arquivoRgMover =  $objetoEstudante->nome_aluno . "-RG-responsavel" . "." . $extencaoRg;
                $arquivoCpfMover =  $objetoEstudante->nome_aluno . "-CPF-responsavel-" . "." . $extencaoCpf;
                $arquivoCertidaoMover =  $objetoEstudante->nome_aluno . "-CERTIDAO-responsavel" . "." . $extencaoCertidao;
                $rgFoto->move($dir, $arquivoRgMover);
                $cpfFoto->move($dir, $arquivoCpfMover);
                $certidao->move($dir, $arquivoCertidaoMover);

                $objetoEstudante->rg_responsavel = $request->rgResponsavel;
                $objetoEstudante->cpf_responsavel = $request->cpfResponsavel;
                $objetoEstudante->rg_responsavel_foto = $dir . "/" . $arquivoRgMover;
                $objetoEstudante->cpf_responsavel_foto = $dir . "/" . $arquivoCpfMover;
                $objetoEstudante->certidao_nascimento_aluno_foto = $dir . "/" . $arquivoCertidaoMover;
                $objetoEstudante->possuiCpf = 0;
                $objetoEstudante->rg_aluno_foto = "Vazio";
                $objetoEstudante->cpf_aluno_foto = "Vazio";
                $objetoEstudante->rg_aluno = "Aluno sem RG";
                $objetoEstudante->cpf_aluno = "Aluno sem CPF";
                //converter objeto em json
                $dados = json_encode($objetoEstudante);

                return view('estudante.escolaridade', compact('dados'));
            }
        } catch (\Throwable $th) {

            return view('layout.erro', compact('th'));
        }
    }
    // metodo no qual pega todos as inforamções da matricula
    public function matricula(Request $request)
    {

        try {
            $objetoEstudante = new Estudante();
            //decode JSON dados aluno
            $objetoEstudante = json_decode($request->dadosAluno);
            //aqui verifica se é responsavel os dados vindos se for igual a zero significa que o aluno não possui cpf
            //caso o aluno possua cpf cai no else if
            if ($request->hasFile('declaracaoMatriculaFoto')) {
                //Foto atribui o arquivo vindo do request em uma variavel
                $declaracaoMatricula = $request->file('declaracaoMatriculaFoto');
                //cria os parametros de url, que é o seguinte public/alunos/cpf/docs

                if ($objetoEstudante->possuiCpf == 0) {
                    //cria os parametros de url, que é o seguinte public/alunos/cpf/docs
                    $dir = "alunos" . '/' . $objetoEstudante->cpf_responsavel;
                } else {
                    //cria os parametros de url, que é o seguinte public/alunos/cpf/docs
                    $dir = "alunos" . '/' . $objetoEstudante->cpf_aluno;
                }

                //pega a extenção
                $extencao = $declaracaoMatricula->guessClientExtension();
                //renomeia a imagem
                $nomeImagem =  $objetoEstudante->nome_aluno . "-DECLARACAO-MATRICULA" . "." . $extencao;
                //move a imagem para a pasta
                $declaracaoMatricula->move($dir, $nomeImagem);
                //atribui ela no objeto
                $objetoEstudante->declaracao_matricula = $dir . '/' . $nomeImagem;
                $objetoEstudante->instituicao = $request->instituicao;
                $objetoEstudante->serie = $request->serie;
                $objetoEstudante->turno = $request->turno;
                $objetoEstudante->curso = $request->curso;

                $dados = json_encode($objetoEstudante);
            }

            return view('estudante.endereco', compact('dados'));
        } catch (\Throwable $th) {
            dd($th);
            return view('layout.erro', compact('th'));
        }
    }
    //metodo de finalização de cadastro, neste ele irá pegar todas as informações vinda do formulario e salvar no banco de dados

    public function finaliza(Request $request)
    {
        try {
            $objetoEstudante = new Estudante();
            //decode JSON dados aluno
            $dadosVindoForm = json_decode($request->dadosPessoaisAluno);

            if ($request->hasFile('comprovanteResidencia')) {
                //Foto atribui o arquivo vindo do request em uma variavel
                $comprovanteResidencia = $request->file('comprovanteResidencia');
                if ($dadosVindoForm->possuiCpf == 0) {
                    //cria os parametros de url, que é o seguinte public/alunos/cpf/docs
                    $dir = "alunos" . '/' . $dadosVindoForm->cpf_responsavel;
                } else {
                    //cria os parametros de url, que é o seguinte public/alunos/cpf/docs
                    $dir = "alunos" . '/' . $dadosVindoForm->cpf_aluno;
                }
                //pega a extenção
                $extencao = $comprovanteResidencia->guessClientExtension();
                //renomeia a imagem
                $nomeImagem =  $dadosVindoForm->nome_aluno . "-COMPROVANTE-RESIDENCIA" . "." . $extencao;
                //move a imagem para a pasta
                $comprovanteResidencia->move($dir, $nomeImagem);
                //atribui ela no objeto
                $objetoEstudante->comprovante_residencia = $dir . '/' . $nomeImagem;

                $objetoEstudante->cep = $request->cep;
                $objetoEstudante->rua = $request->rua;
                $objetoEstudante->numero_casa = $request->numeroCasa;
                $objetoEstudante->bairro = $request->bairro;
                $objetoEstudante->cidade = $request->cidade;
                //protocolo formado por dia mes ano hora minutos
                $objetoEstudante->protocolo = date('dmYHi');
                $objetoEstudante->data_cadastro = date('Y-m-d');
                $objetoEstudante->nome_aluno = $dadosVindoForm->nome_aluno;
                $objetoEstudante->responsavel = $dadosVindoForm->responsavel;
                $objetoEstudante->naturalidade = $dadosVindoForm->naturalidade;
                $objetoEstudante->telefone = $dadosVindoForm->telefone;
                $objetoEstudante->rg_responsavel = $dadosVindoForm->rg_responsavel;
                $objetoEstudante->cpf_responsavel = $dadosVindoForm->cpf_responsavel;
                $objetoEstudante->rg_responsavel_foto = $dadosVindoForm->rg_responsavel_foto;
                $objetoEstudante->cpf_responsavel_foto = $dadosVindoForm->cpf_responsavel_foto;
                $objetoEstudante->certidao_nascimento_aluno_foto = $dadosVindoForm->certidao_nascimento_aluno_foto;
                $objetoEstudante->possuiCpf = $dadosVindoForm->possuiCpf;
                $objetoEstudante->declaracao_matricula = $dadosVindoForm->declaracao_matricula;
                $objetoEstudante->instituicao = $dadosVindoForm->instituicao;
                $objetoEstudante->serie = $dadosVindoForm->serie;
                $objetoEstudante->turno = $dadosVindoForm->turno;
                $objetoEstudante->curso = $dadosVindoForm->curso;
                $objetoEstudante->rg_aluno_foto =  $dadosVindoForm->rg_aluno_foto;
                $objetoEstudante->cpf_aluno_foto = $dadosVindoForm->cpf_aluno_foto;
                $objetoEstudante->rg_aluno = $dadosVindoForm->rg_aluno;
                $objetoEstudante->cpf_aluno = $dadosVindoForm->cpf_aluno;

                $objetoEstudante->save();
                return view('estudante.protocolo', compact('objetoEstudante'));
            }
        } catch (\Throwable $th) {
            dd($th);
            return view('layout.erro', compact('th'));
        }
    }
}
