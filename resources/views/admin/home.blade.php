@extends('layout.estudante')

@section('content')
    <!-- left column -->
    <div class="container-fluid">

            <div class="card card-light-dark">
                <div class="card-header">
                    <h2 class="card-title"> <strong> <i class="fas fa-tachometer-alt"></i> Dashboard </strong> </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$total_cadastros}}</h3>

                                    <p>Total de Solicitações </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-address-book"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-12">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$inteira}}<sup style="font-size: 20px"></sup></h3>

                                    <p>Quantidade livre/100%</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock-open"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-12">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$meia}}</h3>

                                    <p>Quantidade com meia/ 50%</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-percentage"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->


                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <!-- small box -->
                            <div class="small-box bg-gradient-success">
                                <div class="inner">
                                    <h3>{{$retirou_cartao}}</h3>

                                    <p>Retirou o Cartão </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-id-card"></i>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-4 col-12">
                            <!-- small box -->
                            <div class="small-box bg-gradient-danger">
                                <div class="inner">
                                    <h3>{{$total_cadastros - $retirou_cartao}}</h3>

                                    <p>Falta retirar o Cartão </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-4 col-12">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$aguardando_liberacao}}</h3>

                                    <p>Aguardando liberação </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-redo-alt"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
