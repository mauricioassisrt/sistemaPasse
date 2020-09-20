@extends('layout.estudante')

@section('content')

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
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false"
                    data-widget-deletebutton="false">
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
                                    <div class="form-bootstrapWizard" style="display: none;">
                                        <ul class="bootstrapWizard form-wizard">
                                            <li class="active" data-target="#step1">
                                                <a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span
                                                        class="title">Dados do Responsável</span> </a>
                                            </li>
                                            <li data-target="#step2">
                                                <a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span
                                                        class="title">Dados do Aluno</span> </a>
                                            </li>
                                            <li data-target="#step4">
                                                <a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span
                                                        class="title">Matricula Concluída</span> </a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="tab-content">

                                        <div class="tab-pane active card" id="tab1">

                                            <div class="tab-pane" id="tab4">
                                                <div id="impressao">

                                                    <br>
                                                    <h1 class="text-center text-success"><strong><i
                                                                class="fa fa-check fa-lg"></i> Comprovante recadastro de
                                                            vale transporte {{date('Y')}}</strong></h1><br>
                                                    <center><img
                                                            src="https://www.graphicsprings.com/filestorage/stencils/f794ad52bccba5259868672d8db49de5.png?width=500&height=500"
                                                            width="20%" height="20%">
                                                    </center>
                                                    <center style="margin-top: 5px; margin-bottom: 5px;">
                                                        <div id="qrcode"
                                                            style="width: 100px !important; height: 100px !important;">
                                                            <canvas width="80" height="80"></canvas></div>
                                                    </center>

                                                    <h3 class="text-center"><b>Protocolo: <span id="protocolo"
                                                                name="protocolo">{{$objetoEstudante->protocolo}}</span></b>
                                                    </h3>
                                                    <h3 class="text-center">Cadastro para protocolo do
                                                        aluno(a) <b>{{$objetoEstudante->nome_aluno}}</b><br>, portador
                                                        do CPF <b>{{$objetoEstudante->cpf_aluno}}</b>, e RG
                                                        <b> {{$objetoEstudante->rg_aluno}}</b>, no qual seu responsável
                                                        é
                                                        <b>{{$objetoEstudante->responsavel}}</b>, portador do CPF
                                                        <b> {{$objetoEstudante->cpf_responsavel}}</b>, estou ciente que
                                                        este
                                                        cadastro não me dará direito do benefício, e sim
                                                        é uma solicitação de cadastro no qual será feito uma avaliação
                                                        mediante a documentação cadastrada,
                                                        estou ciente que devo consultar com o número de <b>protocolo</b>
                                                        para
                                                        saber qual a data da entrega da documentação
                                                        e a confirmação do cadastro
                                                    </h3>
                                                    <h4 class="text-center"> - - - - - - - - - - - - - - - - - - - - - -
                                                        - - - - - - - </h4>
                                                    <h4 class="text-center"><b>Dados de endereço do aluno :</b> <span
                                                            id="sSerie">
                                                        </span></h4>
                                                    <h4 class="text-center"> - - - - - - - - - - - - - - - - - - - - - -
                                                        - - - - - - - </h4>
                                                    <h4 class="text-center"><b>Rua :</b> <span
                                                            id="sEscola2">{{$objetoEstudante->rua}}</span></h4>
                                                    <h4 class="text-center"><b>Número:</b> <span
                                                            id="sEscola2">{{$objetoEstudante->numero_casa}}</span></h4>
                                                    <h4 class="text-center"><b>Bairro:</b> <span
                                                            id="sEscola2">{{$objetoEstudante->bairro}}</span></h4>
                                                    <h4 class="text-center"><b>CEP:</b> <span
                                                            id="sEscola2">{{$objetoEstudante->cep}}</span></h4>
                                                    <h4 class="text-center"> - - - - - - - - - - - - - - - - - - - - - -
                                                        - - - - - - - </h4>
                                                    <h4 class="text-center"><b>Dados da Instituição :</b> <span
                                                            id="sSerie">
                                                        </span></h4>
                                                    <h4 class="text-center"> - - - - - - - - - - - - - - - - - - - - - -
                                                        - - - - - - - </h4>
                                                    <h4 class="text-center"><b>Escola/Universidade:</b>
                                                        <span id="sEscola1"> {{$objetoEstudante->instituicao}}</span>
                                                    </h4>
                                                    <h4 class="text-center"><b>Série:</b> <span
                                                            id="sEscola2">{{$objetoEstudante->serie}}</span></h4>
                                                    <h4 class="text-center"><b>Turno</b> <span id="sEscola3">
                                                            {{$objetoEstudante->turno}}</span></h4>
                                                    <h4 class="text-center"> - - - - - - - - - - - - - - - - - - - - - -
                                                        - - - - - - - </h4>
                                                    <h5 class="text-center"><b>Data:</b> <span id="sData">
                                                            {{date('d/m/Y', strtotime($objetoEstudante->data_cadastro) ) }}
                                                        </span> </h5>
                                                    <br>
                                                    <div class="text-center" style="color: white;">
                                                        <label id="btnImprimir" class="btn btn-lg  btn-success"><i
                                                                class="fa fa-print"></i> Imprimir </label>
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

@endsection
