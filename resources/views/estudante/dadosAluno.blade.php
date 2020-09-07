@extends('layout.estudante')

@section('content')


<div class="container-fluid">



    <div class="card card-light-dark">
        <div class="card-header">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>Dados do Aluno</h5>

        </div>
        <div class="card-body">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> <strong>Atenção !</strong> </h5>
                Caso seu RG possua letras como X informe somente números ! <br>
                Para que o cadastro seja efetivado, não deixe de preencher todos os dados! <br>


                <p class="text-danger">Campos com <strong>*</strong> é de preenchimento obrigatório !</p>


            </div>
            <form action="{{ route('dados.serie') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="dadosPessoaisAluno" value="{{$dadosPessoaisAluno}}">
                <input type="hidden" name="possuiCpf" value="1">

                <div class="col-md-12">
                    <label for="dados"> RG do Aluno <b class="text-danger">*</b> </label>
                    <input type="text" class="form-control" name="rgAluno" id="rgAluno" required
                        data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask="" inputmode="verbatim"
                        im-insert="true" required>
                </div>
                <div class="col-md-12">
                    <label for="dados"> </label>
                    <label for="dados"> CPF do Aluno <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" name="cpfAluno" id="cpfAluno"
                        data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask="" inputmode="verbatim"
                        im-insert="true" required>
                </div>
                <div class="col-md-12">
                    <label for=""> Foto do verso do RG <b class="text-danger">*</b></label><br>
                    <input type="file" name="rgAlunoFoto" required>
                </div>
                <div class="col-md-12">
                    <label for=""> Foto do CPF <b class="text-danger">*</b> </label><br>
                    <input type="file" name="cpfAlunoFoto" required>

                </div>
                <br>
                <div class="card-footer">
                    <a href="{{route('estudante.index')}}" class="btn btn-success btn-lg "> <i
                            class="fa fa-bus pull-right"></i>
                        Inicio </a>
                    <button type="submit" class="btn btn-lg btn-primary pull-right" id="btn-dadosPessoais"><i
                            class="fas fa-long-arrow-alt-right"></i>
                        Próximo</button>


                </div>
            </form>
        </div>


    </div>

</div>
@endsection
