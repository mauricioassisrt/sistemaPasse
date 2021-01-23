@extends('layout.estudante')

@section('content')

    <!-- left column -->
    <div class="container-fluid">

        <div class="card card-light-dark">
            <div class="card-header">
                <h2 class="card-title"><strong> <i class="fas fa-tachometer-alt"></i> Consultar andamento
                    </strong></h2>
            </div>


            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="custom-tabs-three-home-tab" data-toggle="pill"
                           href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                           aria-selected="false">Protocolo </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-messages-tab" data-toggle="pill"
                           href="#custom-tabs-three-messages" role="tab"
                           aria-controls="custom-tabs-three-messages"
                           aria-selected="false">Andamentos</a>
                    </li>


                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade" id="custom-tabs-three-home">

                        <div id="main" role="main" style="margin-left: 0px;">

                            <!-- RIBBON -->

                            <!-- END RIBBON -->

                            <!-- widget grid -->
                            <section id="widget-grid" class="">
                                <!-- row -->
                                <div class="container">
                                    <!-- NEW WIDGET START -->
                                    <article>
                                        <!--<article class="col-sm-12 col-md-12 col-lg-6">-->
                                        <!-- Widget ID (each widget will need unique ID)-->
                                        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0"
                                             data-widget-editbutton="false" data-widget-deletebutton="false">
                                            <!--<header>-->
                                            <!--<span class="widget-icon"> <i class="fa fa-check"></i> </span>-->
                                            <!--<h2>Pré-Matrícula Online</h2>-->
                                            <!-- -->
                                            <!--</header> -->
                                            <!-- -->
                                            <!-- widget div -->
                                            <div>
                                                <!-- widget content -->
                                                <div class="widget-body">
                                                    <div class="row">
                                                        <!--											<form id="wizard-1" action="//10.1.1.175/aluno/newaluno" novalidate="novalidate" name="candidatoPreMatriculaDTO">-->

                                                        <div id="bootstrap-wizard-1" class="col-sm-12">
                                                            <div class="form-bootstrapWizard"
                                                                 style="display: none;">
                                                                <ul class="bootstrapWizard form-wizard">
                                                                    <li class="active" data-target="#step1">
                                                                        <a href="#tab1" data-toggle="tab"> <span
                                                                                class="step">1</span> <span
                                                                                class="title">Dados do
                                                                                        Responsável</span> </a>
                                                                    </li>
                                                                    <li data-target="#step2">
                                                                        <a href="#tab2" data-toggle="tab"> <span
                                                                                class="step">2</span> <span
                                                                                class="title">Dados do Aluno</span>
                                                                        </a>
                                                                    </li>
                                                                    <li data-target="#step4">
                                                                        <a href="#tab4" data-toggle="tab"> <span
                                                                                class="step">4</span> <span
                                                                                class="title">Matricula
                                                                                        Concluída</span> </a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="tab-content">

                                                                <div class="tab-pane active card" id="tab1">

                                                                    <div class="tab-pane" id="tab4">
                                                                        <div id="impressao">

                                                                            <br>
                                                                            <h1 class="text-center text-success">
                                                                                <strong><i
                                                                                        class="fa fa-check fa-lg"></i>
                                                                                    Comprovante recadastro de
                                                                                    vale transporte
                                                                                    {{ date('Y') }}</strong>
                                                                            </h1>
                                                                            <br>
                                                                            <center><img
                                                                                    src="../../img/bus.png"
                                                                                    width="20%" height="20%">
                                                                            </center>
                                                                            <center
                                                                                style="margin-top: 5px; margin-bottom: 5px;">
                                                                                <div id="qrcode"
                                                                                     style="width: 100px !important; height: 100px !important;">
                                                                                    <canvas width="80"
                                                                                            height="80"></canvas>
                                                                                </div>
                                                                            </center>

                                                                            <h3 class="text-center"><b>Protocolo:
                                                                                    <span id="protocolo"
                                                                                          name="protocolo">{{ $objetoEstudante->protocolo }}</span></b>
                                                                            </h3>
                                                                            <h3 class="text-center">Cadastro
                                                                                para
                                                                                protocolo do
                                                                                aluno(a)
                                                                                <b>{{ $objetoEstudante->nome_aluno }}</b><br>,
                                                                                portador
                                                                                do CPF
                                                                                <b>{{ $objetoEstudante->cpf_aluno }}</b>,
                                                                                e RG
                                                                                <b>
                                                                                    {{ $objetoEstudante->rg_aluno }}</b>,
                                                                                no qual seu responsável
                                                                                é
                                                                                <b>{{ $objetoEstudante->responsavel }}</b>,
                                                                                portador do CPF
                                                                                <b>
                                                                                    {{ $objetoEstudante->cpf_responsavel }}</b>,
                                                                                estou ciente que
                                                                                este
                                                                                cadastro não me dará direito do
                                                                                benefício, e sim
                                                                                é uma solicitação de cadastro no
                                                                                qual será feito uma avaliação
                                                                                mediante a documentação
                                                                                cadastrada,
                                                                                estou ciente que devo consultar
                                                                                com
                                                                                o número de <b>protocolo</b>
                                                                                para
                                                                                saber qual a data da entrega da
                                                                                documentação
                                                                                e a confirmação do cadastro
                                                                            </h3>
                                                                            <h4 class="text-center"> - - - - - -
                                                                                - -
                                                                                - - - - - - - - - - - - - -
                                                                                - - - - - - - </h4>
                                                                            <h4 class="text-center"><b>Dados de
                                                                                    endereço do aluno :</b>
                                                                                <span
                                                                                    id="sSerie">
                                                                                        </span></h4>
                                                                            <h4 class="text-center"> - - - - - -
                                                                                - -
                                                                                - - - - - - - - - - - - - -
                                                                                - - - - - - - </h4>
                                                                            <h4 class="text-center"><b>Rua :</b>
                                                                                <span
                                                                                    id="sEscola2">{{ $objetoEstudante->rua }}</span>
                                                                            </h4>
                                                                            <h4 class="text-center">
                                                                                <b>Número:</b>
                                                                                <span
                                                                                    id="sEscola2">{{ $objetoEstudante->numero_casa }}</span>
                                                                            </h4>
                                                                            <h4 class="text-center">
                                                                                <b>Bairro:</b>
                                                                                <span
                                                                                    id="sEscola2">{{ $objetoEstudante->bairro }}</span>
                                                                            </h4>
                                                                            <h4 class="text-center"><b>CEP:</b>
                                                                                <span
                                                                                    id="sEscola2">{{ $objetoEstudante->cep }}</span>
                                                                            </h4>
                                                                            <h4 class="text-center"> - - - - - -
                                                                                - -
                                                                                - - - - - - - - - - - - - -
                                                                                - - - - - - - </h4>
                                                                            <h4 class="text-center"><b>Dados da
                                                                                    Instituição :</b> <span
                                                                                    id="sSerie">
                                                                                        </span></h4>
                                                                            <h4 class="text-center"> - - - - - -
                                                                                - -
                                                                                - - - - - - - - - - - - - -
                                                                                - - - - - - - </h4>
                                                                            <h4 class="text-center">
                                                                                <b>Escola/Universidade:</b>
                                                                                <span id="sEscola1">
                                                                                            {{ $objetoEstudante->instituicao }}</span>
                                                                            </h4>
                                                                            <h4 class="text-center">
                                                                                <b>Série:</b>
                                                                                <span
                                                                                    id="sEscola2">{{ $objetoEstudante->serie }}</span>
                                                                            </h4>
                                                                            <h4 class="text-center"><b>Turno</b>
                                                                                <span id="sEscola3">
                                                                                            {{ $objetoEstudante->turno }}</span>
                                                                            </h4>
                                                                            <h4 class="text-center"> - - - - - -
                                                                                - -
                                                                                - - - - - - - - - - - - - -
                                                                                - - - - - - - </h4>
                                                                            <h5 class="text-center"><b>Data:</b>
                                                                                <span id="sData">
                                                                                            {{ date('d/m/Y', strtotime($objetoEstudante->data_cadastro)) }}
                                                                                        </span>
                                                                            </h5>
                                                                            <br>
                                                                            <div class="text-center"
                                                                                 style="color: white;">
                                                                                <label id="btnImprimir"
                                                                                       class="btn btn-lg  btn-success"><i
                                                                                        class="fa fa-print"></i>
                                                                                    Imprimir </label>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                    <div id="img-out">

                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- end widget content -->
                                                </div>
                                                <!-- end widget div -->

                                            </div>
                                            <!-- end widget -->

                                        </div>
                                    </article>
                                    <!-- WIDGET END -->

                                </div>

                                <!-- end row -->

                            </section>
                            <!-- end widget grid -->

                        </div>
                    </div>

                    <div class="tab-pane fade active show" id="custom-tabs-three-messages" role="tabpanel"
                         aria-labelledby="custom-tabs-three-messages-tab">
                        
                        @if(Auth::check())

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-andamento">
                                Realizar Andamento <i class="fa fa-forward ">

                                </i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modal-gratuidade">
                                Definir gratuidade <i class="fa fa-money-bill-alt ">

                                </i>
                            </button>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modal-entregar">
                                Entregar cartão? <i class="fa fa-check-square ">

                                </i>
                            </button>

                        @endif
                        <hr>


                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Data que foi realizado o último andamento</th>
                                <th>Status do passe</th>
                                <th>Detalhes</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($andamentos as $andamento)
                                <tr>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($andamento->data)) }}</td>
                                    <td>{{  $andamento->status->descricao}}</td>
                                    <td>{{$andamento->detalhes}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="modal fade" id="modal-detalhes" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Detalhes</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            Fechar
                                        </button>

                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        @if(Auth::check())
                        <!-- Modal andamento -->
                            <div class="modal fade" id="modal-andamento" style="display: none;"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Realizar Andamento </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="{{route('andamento.novo')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="estudante_id"
                                                       value="{{$objetoEstudante->id}}">
                                                <label for="data"> Nome do Aluno </label>
                                                <input type="text" class="form-control " name="nome_aluno"
                                                       disabled
                                                       value="{{$objetoEstudante->nome_aluno}}">
                                                <label for="data"> Data que foi realizado o andamento </label>

                                                <label>Status <b class="text-danger">*</b>
                                                </label>
                                                <select
                                                    class="form-control select2 select2-hidden-accessible"
                                                    style="width: 100%;" data-select2-id="1"
                                                    tabindex="-1" aria-hidden="true" required
                                                    name="status_id">
                                                    @foreach($status as $objeto_status)
                                                        <option
                                                            value="{{$objeto_status->id}}">
                                                            {{$objeto_status->nome}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="obs"> Detalhes <b class="text-danger">*</b> </label>
                                                <textarea class="form-control" rows="3"
                                                          placeholder=" Aqui coloque informações que são imporntantes caso haja necessidade "
                                                          name="detalhes"></textarea>
                                            </div>

                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                    <i
                                                        class="fa fa-times "></i> Fechar
                                                </button>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-save "></i> Salvar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- Modal FINALIZAR -->
                            <div class="modal fade" id="modal-gratuidade" style="display: none;"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Definir gratuidade do cadastro </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="{{url('andamentos/finalizar/')}}/{{$objetoEstudante->id}}"
                                              method="post">
                                            @csrf
                                            <div class="modal-body">

                                                <label for="data"> Nome do Aluno </label>
                                                <input type="text" class="form-control " name="nome_aluno"
                                                       disabled
                                                       value="{{$objetoEstudante->nome_aluno}}">
                                                <label for="detalhes">Definir a gratuidade do passe </label>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input " type="radio"
                                                           name="gratuidade" value="1" id="gratuito">
                                                    <label for="gratuito" class="custom-control-label">Passe
                                                        100% gratuito </label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input " type="radio" id="meio"
                                                           name="gratuidade" value="0">
                                                    <label for="meio" class="custom-control-label">Meio passe -
                                                        50 % gratuito </label>
                                                </div>
                                            </div>

                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"><i
                                                        class="fa fa-times "></i>
                                                    Fechar
                                                </button>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save "></i> Salvar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- Modal entregar cartao -->
                            <div class="modal fade" id="modal-entregar" style="display: none;"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Entregar cartão ao estudante </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="{{url('andamentos/entregarCartao')}}/{{$objetoEstudante->id}}"
                                              method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="cartao_entregue" value="1">
                                                <label for="data"> Tem certeza que deseja efetuar a entrega do
                                                    cartão do estudante: {{$objetoEstudante->nome_aluno}}
                                                    ? </label>


                                            </div>

                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"><i
                                                        class="fa fa-times "></i>
                                                    Fechar
                                                </button>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square "></i> Sim</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        @endif
                        {{ $andamentos->links() }}
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- /.card-body -->

    </div>


@endsection
