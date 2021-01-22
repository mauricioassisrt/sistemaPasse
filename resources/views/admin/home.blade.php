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
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>Total de Solicitações </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-address-book"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                    <p>Quantidade livre</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-lock-open"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>Quantidade com meia </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-sort-numeric-down"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Aguardando liberação </p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-redo-alt"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div>
            </div>
        </div>


@endsection
