@extends('layout.estudante')

@section('content')


<div class="container-fluid">



    <div class="card card-light-dark">
        <div class="card-header">
            <h2 class="card-title"> Dados do Responsável </h2>
        </div>
        <div class="card-body">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção !</h5>
                Caso seu RG possua letras como X informe somente números ! <br>
                Para que o cadastro seja efetivado, não deixe de preencher todos os dados! <br>

                <p class="text-danger">Campos com <strong>*</strong> é de preenchimento obrigatório !</p>
            </div>

            <form action="{{ route('dados.serie') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="dadosPessoaisAluno" value="{{$dadosPessoaisAluno}}">

                <div class="row justify-content-center align-items-center">
                    <div class="col-md-12">
                        <label for="dados"> RG do Responsável <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" name="rgResponsavel" required
                            data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask=""
                            inputmode="verbatim" im-insert="true">
                    </div>
                    <div class="col-md-12">
                        <label for="dados"> </label>
                        <label for="dados"> CPF do Responsável<b class="text-danger">*</b></label>
                        <input type="text" class="form-control" name="cpfResponsavel" id="cpfResponsavel"
                            data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask=""
                            inputmode="verbatim" im-insert="true" required>
                    </div>
                    <div class="col-md-12">
                        <label for="dados"> Foto do RG do Responsável o Verso <b class="text-danger">*</b>
                        </label><br />
                        <input type="file" name="rgResponsavelFoto" required>

                    </div>
                    <div class="col-md-12">
                        <label for="dados"> Foto do CPF do Responsável <b class="text-danger">*</b></label><br />
                        <input type="file" name="cpfResponsavelFoto" required>

                    </div>
                    <div class="col-md-12">
                        <label for="dados"> Foto da Certidão de Nascimento do Aluno<b class="text-danger">*</b>
                        </label><br />
                        <input type="file" name="certidaoNascimentoAlunoFoto" required>

                    </div>
                </div>
                <br>
                <div class="card-footer">
                    <button type="submit" class="btn btn-lg btn-primary" id="escolaridade"><i
                            class="fas fa-long-arrow-alt-right"></i>
                        Próximo</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>

@endsection
