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
                        <strong> Caso não possua CPF clique em não, caso possua clique em sim!</strong>
                    </div>


                    @csrf

                    <div class="row justify-content-center align-items-center">


                        <div class="col-md-12">
                            <form action="{{route('possui.cpf')}}" method="POST">
                                @csrf
                                <input type="hidden" name="dadosPessoais" value="{{$objetoEstudante}}">
                                <button type="submit" class="btn btn-block bg-gradient-primary btn-lg"><i
                                        class="icon fas fa-check"></i> Sim </button>
                                <hr>
                            </form>
                        </div>

                        <div class="col-md-12 float-right">

                            <form action="{{route('nao.possui.cpf')}}" method="POST">
                                @csrf
                                <input type="hidden" name="dadosPessoais" value="{{$objetoEstudante}}">
                                <button type="submit" class="btn btn-block bg-gradient-info btn-lg"><i
                                        class="icon fas fa-window-close"></i> Não</button>
                                <hr>
                            </form>
                        </div>

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
