@extends('layout.estudante')

@section('content')


<div class="container-fluid" id="divDadosResponsavel">



    <div class="card card-light-dark">
        <div class="card-header">
            <h2 class="card-title"> <strong>Dados do Responsável ?</strong> </h2>
        </div>
        <div class="card-body">

            <div class="alert alert-danger alert-dismissible">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Dados do Responsável!</h5>
                <strong>!</strong>
            </div>
            <form action="{{ route('dados.responsavel') }}" method="POST">
                @csrf
                <input type="hidden" name="dadosPessoaisAluno" value="{{$dadosPessoaisAluno}}">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-12">
                        <label for="dados"> RG do Responsável</label>
                        <input type="text" class="form-control" name="rgResponsavel" required>
                    </div>
                    <div class="col-md-12">
                        <label for="dados"> </label>
                        <label for="dados"> CPF do Responsável</label>
                        <input type="text" class="form-control" name="cpfResponsavel" id="cpfResponsavel"
                            data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask=""
                            inputmode="verbatim" im-insert="true" required>
                    </div>
                    <div class="col-md-12">
                        <label for="dados"> Foto do RG do Responsável o Verso </label><br />
                        <input type="file" name="rgResponsavelFoto">

                    </div>
                    <div class="col-md-12">
                        <label for="dados"> Foto do CPF do Responsável </label><br />
                        <input type="file" name="cpfResponsavelFoto">

                    </div>
                    <div class="col-md-12">
                        <label for="dados"> Foto da Certidão de Nascimento do Aluno </label><br />
                        <input type="file" name="certidaoNascimentoAlunoFoto">

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="escolaridade"><i
                            class="fas fa-long-arrow-alt-right"></i>
                        Próximo</button>
                </div>
            </form>
        </div>
    </div>
    </section>

    @endsection
