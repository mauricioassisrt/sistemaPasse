@extends('layout.estudante')

@section('content')


<div class="row">
    <!-- left column -->
    <div class="container-fluid">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Consultar Situação </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('cpf.protocolo') }}" method="post">
                    @csrf
                    <div class="card-body">


                        <div class="callout callout-danger">
                            <h5>Atenção </h5>

                            <p><b> Informe o CPF e o Número de protocolo   </b></p>
                        </div>
                        <div class="alert alert-danger alert-dismissible " style="display: {{ $retorno }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> ATENÇÃO !</h5>
                            Não foi encontrado nenhum dado relacionado ao CPF ou número de protocolo: {{ $cpf}} {{ $protocolo   }}
                          </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF </label>

                                <input type="text" class="form-control" name="consultaCPF"
                                data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask="" inputmode="verbatim"
                                im-insert="true" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Protocolo </label>
                            <input type="number" name="consultaProtocolo" class="form-control"
                                placeholder="Digite o código gerado ">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Consultar</button>
                    </div>
                </form>
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
