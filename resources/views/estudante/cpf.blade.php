@extends('layout.estudante')

@section('content')


<div class="row ">
    <!-- left column -->
    <div class="container-fluid">
        <div class=" row justify-content-center align-items-center">
            <!-- jquery validation -->
            <div class="card card-light-dark">
                <div class="card-header">
                    <h2 class="card-title"> <strong>Informações sobre CPF ?</strong> </h2>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Atenção!</h5>
                        Caso não possua CPF clique em não, caso possua clique em sim!
                    </div>


                    @csrf

                    <div class="row justify-content-center align-items-center">


                        <div class="col-md-6">
                            <form action="{{route('possui.cpf')}}" method="POST">
                                @csrf
                                <input type="hidden" name="dadosPessoais" value="{{$objetoEstudante}}">
                                <button type="submit" class="btn btn-block btn-primary btn-lg"><i
                                        class="icon fas fa-check"></i> Sim </button>

                            </form>
                        </div>

                        <div class="col-md-6 float-right">

                            <form action="{{route('nao.possui.cpf')}}" method="POST">
                                @csrf
                                <input type="hidden" name="dadosPessoais" value="{{$objetoEstudante}}">
                                <button type="submit" class="btn btn-block btn-danger btn-lg"><i
                                        class="icon fas fa-window-close"></i> Não</button>

                            </form>

                        </div>
                        <hr>

                    </div>
                    <hr>
                    <div class="box-footer">
                        <a href="{{route('estudante.index')}}" class="btn btn-success btn-lg "> <i
                                class="fa fa-bus pull-right"></i>
                            Inicio </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
<!--/.col (left) -->
<!-- right column -->
<div class="col-md-6">

</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</div>
</div>
<!-- /.container-fluid -->
</section>

@endsection
