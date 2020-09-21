@extends('layout.estudante')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-light-dark">
                <div class="card-header">
                    <h2 class="card-title"> <strong> <i class="fas fa-tachometer-alt"></i> Cadastros Realizados
                        </strong> </h2>
                </div>


                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Data</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Aluno</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Instituição </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Curso </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Série</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">Bairro
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                Documentos </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                Detalhes </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($objetoEstudantes as $estudante)
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">{{$estudante->data_cadastro}}</td>
                                            <td>{{$estudante->nome_aluno}}</td>
                                            <td>{{$estudante->instituicao}}</td>
                                            <td>{{$estudante->curso}}</td>
                                            <td>{{$estudante->serie}}</td>
                                            <td>{{$estudante->bairro}}</td>
                                            <td>
                                                <a href="./{{$estudante->declaracao_matricula}}" class="btn btn-warning"
                                                    title=" Declaração de Matrícula"> <i class="fa fa-file-alt "></i>
                                                </a>
                                                <a href="./{{$estudante->comprovante_residencia}}"
                                                    class="btn btn-success" title=" Comprovante de residência "> <i
                                                        class="fa fa-plug "></i>
                                                </a>

                                                @if($estudante->possuiCpf==0)

                                                <a href="./{{$estudante->rg_responsavel_foto}}" class="btn btn-info"
                                                    title=" RG Responsável ">
                                                    <i class="fa fa-address-book "></i>

                                                </a>

                                                <a href="./{{$estudante->cpf_responsavel_foto}}" class="btn btn-primary"
                                                    title="CPF Responsável ">
                                                    <i class="fa fa-address-card ">

                                                    </i>

                                                </a>

                                                <a href="./{{$estudante->certidao_nascimento_foto}}"
                                                    class="btn btn-secondary" title="Certidão de nascimento ">
                                                    <i class="fa fa-baby-carriage ">

                                                    </i>
                                                </a>

                                                @else

                                                <a href="./{{$estudante->cpf_aluno_foto}}" class="btn btn-primary"
                                                    title="CPF Aluno ">
                                                    <i class="fa fa-address-card "></i>
                                                </a>

                                                <a href="./{{$estudante->rg_aluno_foto}}" class="btn btn-danger"
                                                    title="RG Aluno ">
                                                    <i class="fa fa-address-book ">

                                                    </i>
                                                </a>

                                                @endif


                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-xl-{{$estudante->id}}">
                                                    <i class="fa fa-search ">

                                                    </i>
                                                    Detalhes
                                                </a>


                                                <div class="modal fade" id="modal-xl-{{$estudante->id}}"
                                                    style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Detalhes</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="impressao">

                                                                    <br>
                                                                    <h1 class="text-center text-success"><strong><i
                                                                                class="fa fa-check fa-lg"></i>
                                                                            Comprovante recadastro de
                                                                            vale transporte {{date('Y')}}</strong></h1>
                                                                    <br>
                                                                    <center><img
                                                                            src="https://www.graphicsprings.com/filestorage/stencils/f794ad52bccba5259868672d8db49de5.png?width=500&height=500"
                                                                            width="20%" height="20%">
                                                                    </center>
                                                                    <center
                                                                        style="margin-top: 5px; margin-bottom: 5px;">
                                                                        <div id="qrcode"
                                                                            style="width: 100px !important; height: 100px !important;">
                                                                            <canvas width="80" height="80"></canvas>
                                                                        </div>
                                                                    </center>

                                                                    <h3 class="text-center"><b>Protocolo: <span
                                                                                id="protocolo"
                                                                                name="protocolo">{{$estudante->protocolo}}</span></b>
                                                                    </h3>
                                                                    <h3 class="text-center">Cadastro para protocolo do
                                                                        aluno(a)
                                                                        <b>{{$estudante->nome_aluno}}</b><br>,
                                                                        CPF <b>{{$estudante->cpf_aluno}}</b>,
                                                                        RG
                                                                        <b> {{$estudante->rg_aluno}}</b>, Responsável
                                                                        é
                                                                        <b>{{$estudante->responsavel}}</b>,
                                                                        portador do CPF
                                                                        <b> {{$estudante->cpf_responsavel}}</b>,

                                                                    </h3>
                                                                    <h4 class="text-center"> - - - - - - - - - - - - - -
                                                                        - - - - - - - -
                                                                        - - - - - - - </h4>
                                                                    <h4 class="text-center"><b>Dados de endereço do
                                                                            aluno :</b> <span id="sSerie">
                                                                        </span></h4>
                                                                    <h4 class="text-center"> - - - - - - - - - - - - - -
                                                                        - - - - - - - -
                                                                        - - - - - - - </h4>
                                                                    <h4 class="text-center"><b>Rua :</b> <span
                                                                            id="sEscola2">{{$estudante->rua}}</span>
                                                                    </h4>
                                                                    <h4 class="text-center"><b>Número:</b> <span
                                                                            id="sEscola2">{{$estudante->numero_casa}}</span>
                                                                    </h4>
                                                                    <h4 class="text-center"><b>Bairro:</b> <span
                                                                            id="sEscola2">{{$estudante->bairro}}</span>
                                                                    </h4>
                                                                    <h4 class="text-center"><b>CEP:</b> <span
                                                                            id="sEscola2">{{$estudante->cep}}</span>
                                                                    </h4>
                                                                    <h4 class="text-center"> - - - - - - - - - - - - - -
                                                                        - - - - - - - -
                                                                        - - - - - - - </h4>
                                                                    <h4 class="text-center"><b>Dados da Instituição
                                                                            :</b> <span id="sSerie">
                                                                        </span></h4>
                                                                    <h4 class="text-center"> - - - - - - - - - - - - - -
                                                                        - - - - - - - -
                                                                        - - - - - - - </h4>
                                                                    <h4 class="text-center"><b>Escola/Universidade:</b>
                                                                        <span id="sEscola1">
                                                                            {{$estudante->instituicao}}</span>
                                                                    </h4>
                                                                    <h4 class="text-center"><b>Série:</b> <span
                                                                            id="sEscola2">{{$estudante->serie}}</span>
                                                                    </h4>
                                                                    <h4 class="text-center"><b>Turno</b> <span
                                                                            id="sEscola3">
                                                                            {{$estudante->turno}}</span></h4>
                                                                    <h4 class="text-center"> - - - - - - - - - - - - - -
                                                                        - - - - - - - -
                                                                        - - - - - - - </h4>
                                                                    <h5 class="text-center"><b>Data:</b> <span
                                                                            id="sData">
                                                                            {{date('d/m/Y', strtotime($estudante->data_cadastro) ) }}
                                                                        </span> </h5>
                                                                    <br>

                                                                </div>
                                                                <br>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                            </div>
                            </td>
                            </tr>
                            @endforeach

                            </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

        </div>

    </div>
</div>
</div>


@endsection
