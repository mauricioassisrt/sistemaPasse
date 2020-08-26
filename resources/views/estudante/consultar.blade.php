@extends('layout.estudante')

@section('content')


<div class="row">
    <!-- left column -->
    <div class="container-fluid">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-green">
                <div class="card-header">
                    <h3 class="card-title">Consultar Situação </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="" novalidate="novalidate">
                    <div class="card-body">
                        <div class="callout callout-danger">
                            <h5>Atenção </h5>

                            <p><b> Caso já tenha emitido solicitado digite ou o CPF ou o protocolo gerado e enviado via
                                    e-mail</b></p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF </label>
                            <input type="text" name="consultaCPF" class="form-control"
                                placeholder="Digite somente números" required>
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
