@extends('layout.estudante')
<script type="text/javascript">
    function deletardados(e) {
        if (!(window.confirm("Tem certeza que deseja excluir esse usuario?")))
            e.returnValue = false;
    }

</script>
@section('content')

        <!-- left column -->
        <div class="container-fluid">

                <div class="card card-light-dark">
                    <div class="card-header">
                        <div class=" row">
                            <div class="col-md-12">
                                <h2 class="card-title"> <strong> <i class="fas fa-tachometer-alt"></i> Status
                                    </strong>
                                </h2>
                            </div>

                        </div>

                        <br />
                        <a href="{{ route('status.create') }}" class="btn btn-primary float-right">
                            <i class="fas fa-plus"></i> Novo </a>
                        <form action="{{ url('status/pesquisar') }}" method="get">

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Pesquisar">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status </th>
                                        <th>Descrição </th>
                                        <th>Detalhes</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($status as $statu)
                                        <tr>

                                            <td>
                                                {{ $statu->id }}
                                            </td>
                                            <td>
                                                {{ $statu->nome }}
                                            </td>
                                            <td>
                                                {{ $statu->descricao }}
                                            </td>
                                            <td>
                                                <a href="{{ url('status/edit/' . $statu->id) }}"
                                                    class="btn btn-primary"><span class="glyphicon glyphicon-pencil">
                                                    </span>
                                                    <i class="fas fa-edit"></i> Editar </a>
                                                <a href="{{ url('status/deletar/' . $statu->id) }}" class="btn btn-primary"
                                                    onclick="return deletardados(event)"><span
                                                        class="glyphicon glyphicon-remove"></span> <i
                                                        class="fas fa-trash"></i> Excluir
                                                </a>
                                            </td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $status->links() }}
                    </div>
                </div>


        </div>


@endsection
