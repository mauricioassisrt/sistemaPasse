@extends('layout.estudante')
<style type="text/css">
    .centro {
        margin-top: auto;
        margin-bottom: auto;

    }
</style>
@section('content')

<div class="container-fluid">



        <div class="row">
            <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-info">

                    <div class="inner">
                        <h3>Consultar Passe </h3>


                    </div>
                    <div class="icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <a href="{{route('consultar.situacao')}}"  class="small-box-footer"> Clique  aqui <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-12">
                <!-- small box -->
                <div class="small-box bg-success">

                    <div class="inner">

                        <h3>Solicitar Passe </h3>


                    </div>
                    <div class="icon">
                        <i class="fas fa-bus"></i>
                    </div>

                    <a href="{{route('estudante.index')}}" class="small-box-footer" >Clique aqui <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
    <!-- /.row -->

<!-- /.container-fluid -->
</section>
@endsection
