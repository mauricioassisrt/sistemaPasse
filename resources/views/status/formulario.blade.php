@extends('layout.estudante')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-light-dark">
                    <div class="card-header">
                        <div class=" row">
                            <div class="col-md-12">
                                <h1 class="card-title"> <strong> <i class="fas fa-tachometer-alt"></i> Novo statuss
                                    </strong>
                                </h1>
                            </div>

                        </div>

                        <br />

                    </div>


                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            @if(Request::is('*/edit/*'))
                            {!! Form::model($status, ['method' => 'PATCH', 'url' => 'status/update/'.$status->id]) !!}
                            @else
                             {!! Form::open(['url' => 'status/store']) !!}
                            @endif
                            <div class="form-group">
                                @csrf
                                <label>Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Digite o nome" name="nome" @if(Request::is('*/edit/*')) value="{{$status->nome}}" @endif required>

                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" class="form-control" placeholder="Digite uma descrição para o statuss." id="descricao" name="descricao" @if(Request::is('*/edit/*')) value="{{$status->descricao}}" @endif required>

                            </div>
                         </div>


                        </div>
                        <div class="card-footer clearfix">

                            <a href="{{route('status')}}" class="btn btn-primary">

                                <i class="fas fa-arrow-left"></i> Voltar </a>

                            @if(Request::is('*/edit/*'))
                            <button type="submit" class="btn btn-success">  <i class=" fas fa-pen-alt"></i>  Alterar</button>
                            @else
                            <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Salvar</button>
                            @endif

                        </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>

            </div>
        </div>
    </div>


@endsection
