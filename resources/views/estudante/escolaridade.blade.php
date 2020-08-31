@extends('layout.estudante')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="container-fluid">
        <div class="col-lg-12 col-12">
            <!-- jquery validation -->
            <div class="card card-light-dark">
                <div class="card-header">
                    <div class="card-header">
                        <h2 class="card-title"> <strong>Informações Qual a instituição de ensino/escola que o aluno
                                estuda ?</strong> </h2>
                    </div>
                    <form action="{{ route('finaliza.cadastro') }}" method="POST">
                        @csrf
                        <input type="hidden" name="dadosAluno" value="{{ $dadosPessoaisAluno }}">
                        <input type="hidden" name="dadosResponsavel" value="{{ $objetoEstudante }}">
                        <div class="form-group">
                            <label for="escola">Nome da escola ou faculdade </label>
                            <input type="text" name="instituicao" class="form-control" placeholder="Exemplo, Unespar "
                                requi red>
                        </div>
                        <div class="form-group">
                            <label>Série </label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="2" tabindex="-1" aria-hidden="false" required name="serie">
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
                            <label>Turno </label>
                            <select class="form-control select2 select2-accessible" style="width: 100%;" required
                                name="turno">
                                <option value="Matutino - Manhã ">Matutino - Manhã </option>
                                <option value="Vespertino - Tarde ">Vespertino - Tarde </option>
                                <option value="Noturno - Noite"> Noturno - Noite </option>
                                <option value="Noturno - Noite">Noturno - Noite</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="curso"> Curso </label>
                            <input type="text" name="curso" class="form-control" placeholder="Exemplo, Administração  "
                                required>
                        </div>
                        <div>

                            <label for="obs"> Observações </label>
                            <textarea class="form-control" rows="3" placeholder="" name="obs"></textarea>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-long-arrow-alt-right"></i>
                                Finalizar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>


</section>

@endsection
