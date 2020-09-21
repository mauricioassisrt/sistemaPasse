@extends('layout.estudante')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-light-dark">
                <div class="card-header">
                    <h2 class="card-title"> <strong> <i class="fas fa-tachometer-alt"></i> Cadastros Realizados
                        </strong> </h2>
                </div>


                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Data</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Aluno</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Instituição </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Série</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">Bairro
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                Documentos </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($objetoEstudantes as $estudante)
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">{{$estudante->data_cadastro}}</td>
                                            <td>{{$estudante->nome_aluno}}</td>
                                            <td>{{$estudante->instituicao}}</td>
                                            <td>{{$estudante->serie}}</td>
                                            <td>{{$estudante->bairro}}</td>
                                            <td>
                                                <a href="./{{$estudante->declaracao_matricula}}"> <i
                                                        class="fa fa-file-alt "></i>
                                                    Declaração de Matrícula</a>


                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    <ul class="pagination">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
        </div>
    </div>
</div>


@endsection
