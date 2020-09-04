@extends('layout.estudante')

@section('content')



<div class="container-fluid">



    <div class="card card-light-dark">
        <div class="card-header">
            <h2 class="card-title"> <strong>Qual a instituição de ensino/escola que o aluno
                    estuda ?</strong> </h2>
        </div>
        <div class="card-body">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção !</h5>
                Caso sua série ou turno não conste no formulário, informe no campo observações !
                Caso seu RG possua letras como X informe somente números ! <br>
                Para que o cadastro seja efetivado, não deixe de preencher todos os dados! <br>

                <p class="text-danger">Campos com <strong>*</strong> é de preenchimento obrigatório !</p>
            </div>

            <form action="{{ route('finaliza') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="dadosResponsavel" value="{{ $dados }}">

                <div class="form-group">
                    <label for="escola">Nome da escola ou faculdade <b class="text-danger">*</b> </label>
                    <input type="text" name="instituicao" class="form-control" placeholder="Exemplo, Unespar " requi
                        red>
                </div>
                <div class="form-group">
                    <label for="dados"> Foto da declaração de Matrícula <b class="text-danger">*</b></label><br />
                    <input type="file" name="declaracaoMatriculaFoto" required>

                </div>
                <div class="form-group">
                    <label>Série <b class="text-danger">*</b> </label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                        data-select2-id="1" tabindex="-1" aria-hidden="true" required name="serie">
                        <option value="Ensino Fundamental Anos Iniciais 1° ao 5° Ano"> Ensino Fundamental Anos
                            Iniciais 1° ao 5° Ano</option>
                        <option value="Ensino Fundamental Anos Iniciais 1° ao 5° Ano">6° Ano - Ensino
                            Fundamental 6° ao 9° Ano</option>
                        <option value="7° Ano - Ensino Fundamental 6° ao 9° Ano">7° Ano - Ensino Fundamental 6°
                            ao 9° Ano</option>
                        <option value="8° Ano - Ensino Fundamental 6° ao 9° Ano">8° Ano - Ensino Fundamental 6°
                            ao 9° Ano</option>
                        <option value="9° Ano - Ensino Fundamental 6° ao 9° Ano">9° Ano - Ensino Fundamental 6°
                            ao 9° Ano</option>
                        <option value="1° Ano - Ensino Médio">1° Ano - Ensino Médio</option>
                        <option value="2° Ano - Ensino Médio">2° Ano - Ensino Médio</option>
                        <option value="3° Ano - Ensino Médio">3° Ano - Ensino Médio</option>
                        <option value="1° Fase - CEEBJA">1° Fase - CEEBJA</option>
                        <option value="2° Fase - CEEBJA">2° Fase - CEEBJA</option>
                        <option value="1° Ano - FACULDADE">1° Ano - FACULDADE</option>
                        <option value="2° Ano - FACULDADE">2° Ano - FACULDADE</option>
                        <option value="3° Ano - FACULDADE">3° Ano - FACULDADE</option>
                        <option value="4° Ano - FACULDADE">4° Ano - FACULDADE</option>
                        <option value="1° Modúlo - FACULDADE">1° Modúlo - FACULDADE</option>
                        <option value="2° Modúlo - FACULDADE">2° Modúlo - FACULDADE</option>
                        <option value="3° Modúlo - FACULDADE">3° Modúlo - FACULDADE</option>
                        <option value="4° Modúlo - FACULDADE">4° Modúlo - FACULDADE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Turno <b class="text-danger">*</b> </label>
                    <select class="form-control select2 select2-accessible" style="width: 100%;" required name="turno">
                        <option value="Matutino - Manhã ">Matutino - Manhã </option>
                        <option value="Vespertino - Tarde ">Vespertino - Tarde </option>
                        <option value="Noturno - Noite"> Noturno - Noite </option>
                        <option value="Noturno - Noite">Noturno - Noite</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="curso"> Curso <b class="text-danger">*</b> </label>
                    <input type="text" name="curso" class="form-control" placeholder="Exemplo, Administração  "
                        required>
                </div>
                <div>

                    <label for="obs"> Observações <b class="text-danger">*</b> </label>
                    <textarea class="form-control" rows="3"
                        placeholder=" Aqui coloque informações que são imporntantes caso haja necessidade "
                        name="obs"></textarea>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-lg btn-primary"><i class="fas fa-long-arrow-alt-right"></i>
                        Finalizar</button>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</div>

</div>


</section>

@endsection
