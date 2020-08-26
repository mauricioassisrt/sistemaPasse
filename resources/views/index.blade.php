@extends('layout.estudante')
<style type="text/css">
    .centro {
        margin-top: auto;
        margin-bottom: auto;

    }
</style>
@section('content')

<div class="container-fluid">
    <div class="row ">
        <!-- DIV NOVO PASSE -->
        <div class="col-lg-6 col-12 centro">
            <!-- small box -->
            <div class="small-box bg-success">
                <a href="{{route('estudante.index')}}" class="small-box-footer">
                    <div class="inner">
                        <h4>Solicitar Passe</h4>


                    </div>
                    <div class="icon">

                    </div>
                    <i class="fas fa-bus"></i>
                </a>
            </div>
        </div>

        <!-- DIV CONSULTAR PASSE -->
        <div class="col-lg-6 col-12 centro">
            <!-- small box -->
            <div class="small-box bg-success">
                <a href="{{route('consultar.situacao')}}" class="small-box-footer">
                    <div class="inner">
                        <h4>Consultar Situação</h4>


                    </div>
                    <div class="icon">

                    </div>
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
</div>
<!-- /.container-fluid -->
</section>
@endsection
