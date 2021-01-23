<?php

namespace App\Http\Controllers;

use App\Andamento;
use App\Estudante;
use App\Http\Controllers\Controller;
use App\Status;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{


    public function index()
    {
        return view('estudante.cadastro_estudante');
    }

    //metodo de finalização de cadastro, neste ele irá pegar todas as informações vinda do formulario e salvar no banco de dados

    public function store(Request $request)
    {
        try {
            $estudante = $request->all();
            //verifica se o campo vier possuiCpf == 1 o aluno possui cpf caso contrario ele não possui ai cai no else
            if ($request->possuiCpf == 'true' && $request->hasFile('rg_aluno_foto') && $request->hasFile('cpf_aluno_foto')) {

                //parte na qual verifica o input que veio um arquivo
                $cpfFoto = $request->file('cpf_aluno_foto');
                $rgFoto = $request->file('rg_aluno_foto');
                //define o diretorio que sera a pasta public/alunos/cpf
                $dir = "alunos" . '/' . $request->cpf_aluno;
                //pega o tipo de extensão do arquivo
                $extencaoCpf = $cpfFoto->guessClientExtension();
                $extencaoRg = $rgFoto->guessClientExtension();
                //monta o arquivo seguido da extencao
                $arquivoRgMover = $request->nome_aluno . "-RG" . "." . $extencaoRg;
                $arquivoCpfMover = $request->nome_aluno . "-CPF" . "." . $extencaoCpf;
                //move o arquivo para a pasta
                $rgFoto->move($dir, $arquivoRgMover);
                $cpfFoto->move($dir, $arquivoCpfMover);

                $estudante['rg_responsavel'] = "O Aluno possui CPF ";
                $estudante['cpf_responsavel'] = "O Aluno possui CPF ";
                $estudante['certidao_nascimento_aluno_foto'] = "O Aluno possui CPF ";
                $estudante['rg_responsavel_foto'] = "Vazio";
                $estudante['cpf_responsavel_foto'] = "Vazio";
                $estudante['certidao_nascimento_alunoFoto'] = "Vazio";
                $estudante['rg_aluno_foto'] = $dir . "/" . $arquivoRgMover;
                $estudante['cpf_aluno_foto'] = $dir . "/" . $arquivoCpfMover;


            } else if ($request->hasFile('rg_responsavel_foto') && $request->hasFile('cpf_responsavel_foto') && $request->hasFile('certidao_nascimento_aluno_foto')) {

                $cpfFoto = $request->file('cpf_responsavel_foto');
                $rgFoto = $request->file('rg_responsavel_foto');
                $certidao = $request->file('certidao_nascimento_aluno_foto');
              //  dd('no else');
                // $numero = rand(1111, 9999);
                $dir = "alunos" . '/' . $request->cpf_responsavel;
                $extencaoCpf = $cpfFoto->guessClientExtension();
                $extencaoRg = $rgFoto->guessClientExtension();
                $extencaoCertidao = $certidao->guessClientExtension();
                $arquivoRgMover = $request->nome_aluno . "-RG-responsavel" . "." . $extencaoRg;
                $arquivoCpfMover = $request->nome_aluno . "-CPF-responsavel-" . "." . $extencaoCpf;
                $arquivoCertidaoMover = $request->nome_aluno . "-CERTIDAO-responsavel" . "." . $extencaoCertidao;

                $rgFoto->move($dir, $arquivoRgMover);
                $cpfFoto->move($dir, $arquivoCpfMover);
                $certidao->move($dir, $arquivoCertidaoMover);

                $estudante['rg_responsavel_foto'] = $dir . "/" . $arquivoRgMover;
                $estudante['cpf_responsavel_foto'] = $dir . "/" . $arquivoCpfMover;
                $estudante['certidao_nascimento_aluno_foto'] = $dir . "/" . $arquivoCertidaoMover;
                $estudante['rg_aluno_foto'] = "Vazio";
                $estudante['cpf_aluno_foto'] = "Vazio";
                $estudante['rg_aluno'] = "Aluno sem RG";
                $estudante['cpf_aluno'] = "Aluno sem CPF";


            }
            /*
             * declaração de matricula upload do arquivo para o servidor
             */
            if ($request->hasFile('declaracao_matricula')) {
                //Foto atribui o arquivo vindo do request em uma variavel
                $declaracaoMatricula = $request->file('declaracao_matricula');
                //cria os parametros de url, que é o seguinte public/alunos/cpf/docs

                if ($request->possuiCpf == 'true') {
                    //cria os parametros de url, que é o seguinte public/alunos/cpf/docs
                    $dir = "alunos" . '/' . $request->cpf_aluno;
                } else {
                    //cria os parametros de url, que é o seguinte public/alunos/cpf/docs
                    $dir = "alunos" . '/' . $request->cpf_responsavel ;

                }

                //pega a extenção
                $extencao = $declaracaoMatricula->guessClientExtension();
                //renomeia a imagem
                $nomeImagem = $request->nome_aluno . "-DECLARACAO-MATRICULA" . "." . $extencao;
                //move a imagem para a pasta
                $declaracaoMatricula->move($dir, $nomeImagem);
                //atribui ela no objeto
                $estudante['declaracao_matricula'] = $dir . '/' . $nomeImagem;
               //  $objetoEstudante->declaracao_matricula = $request->declaracao_matricula;

            }
            if ($request->hasFile('comprovante_residencia')) {
                //Foto atribui o arquivo vindo do request em uma variavel
                $comprovanteResidencia = $request->file('comprovante_residencia');
                if ($request->possuiCpf == 'true') {
                    //cria os parametros de url, que é o seguinte public/alunos/cpf/docs
                    $dir = "alunos" . '/' . $request->cpf_aluno;
                } else {
                    //cria os parametros de url, que é o seguinte public/alunos/cpf/docs
                    $dir = "alunos" . '/' . $request->cpf_responsavel;
                }
                //pega a extenção
                $extencao = $comprovanteResidencia->guessClientExtension();
                //renomeia a imagem
                $nomeImagem = $request->nome_aluno . "-COMPROVANTE-RESIDENCIA" . "." . $extencao;
                //move a imagem para a pasta
                $comprovanteResidencia->move($dir, $nomeImagem);
                //atribui ela no objeto
                $estudante['comprovante_residencia'] = $dir . '/' . $nomeImagem;

                //protocolo formado por dia mes ano hora minutos
                $estudante['protocolo'] = date('ymdHiss');
                $estudante['data_cadastro'] = date('Y-m-d');
            }

            $objetoEstudante=Estudante::create($estudante);


            $status = Status::all();

            if(!empty($status->count())){

                $objeto_andamento['status_id'] = $status->first()->id;
                $objeto_andamento['estudante_id'] = $objetoEstudante->id;
                $objeto_andamento['data'] = date('Y-m-d H:i:s');
                $objeto_andamento['detalhes']= "Andamento iniciado ";

                Andamento::create($objeto_andamento);


                $andamentos = Andamento::where('estudante_id', $objetoEstudante->id)->orderBy('data', 'DESC')->paginate(10);

                return view('andamentos.detalhes', compact('objetoEstudante', 'status', 'andamentos'));


            }else{
                $objeto_status['nome'] = "Andamento Realizado ";
                $objeto_status['descricao']= "Primeiro andamento realizado ";
                Status::create($objeto_status);


                $objeto_andamento['status_id'] = $status->first();
                $objeto_andamento['estudante_id'] = $objetoEstudante->id;

                $objeto_andamento['data']= date('Y-m-d H:i:s');
                $objeto_andamento['descricao']= "Andamento iniciado ";

                Andamento::create($objeto_andamento);

                $andamentos = Andamento::where('estudante_id', $objetoEstudante->id)->orderBy('data', 'DESC')->paginate(10);

                return view('andamentos.detalhes', compact('objetoEstudante', 'status', 'andamentos'));
            }

        } catch (\Throwable $th) {
            dd($th);
            return view('layout.erro', compact('th'));
        }
    }
}
