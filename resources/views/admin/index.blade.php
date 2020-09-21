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
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Curso </th>
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
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                Detalhes </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($objetoEstudantes as $estudante)
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">{{$estudante->data_cadastro}}</td>
                                            <td>{{$estudante->nome_aluno}}</td>
                                            <td>{{$estudante->instituicao}}</td>
                                            <td>{{$estudante->curso}}</td>
                                            <td>{{$estudante->serie}}</td>
                                            <td>{{$estudante->bairro}}</td>
                                            <td>
                                                <a href="./{{$estudante->declaracao_matricula}}" class="btn btn-warning"
                                                    title=" Declaração de Matrícula"> <i class="fa fa-file-alt "></i>
                                                </a>
                                                <a href="./{{$estudante->comprovante_residencia}}"
                                                    class="btn btn-success" title=" Comprovante de residência "> <i
                                                        class="fa fa-plug "></i>
                                                </a>

                                                @if($estudante->possuiCpf==0)

                                                <a href="./{{$estudante->rg_responsavel_foto}}" class="btn btn-info"
                                                    title=" RG Responsável ">
                                                    <i class="fa fa-address-book "></i>

                                                </a>

                                                <a href="./{{$estudante->cpf_responsavel_foto}}" class="btn btn-primary"
                                                    title="CPF Responsável ">
                                                    <i class="fa fa-address-card ">

                                                    </i>

                                                </a>

                                                <a href="./{{$estudante->certidao_nascimento_foto}}"
                                                    class="btn btn-secondary" title="Certidão de nascimento ">
                                                    <i class="fa fa-baby-carriage ">

                                                    </i>
                                                </a>

                                                @else

                                                <a href="./{{$estudante->cpf_aluno_foto}}" class="btn btn-primary"
                                                    title="CPF Aluno ">
                                                    <i class="fa fa-address-card "></i>
                                                </a>

                                                <a href="./{{$estudante->rg_aluno_foto}}" class="btn btn-danger"
                                                    title="RG Aluno ">
                                                    <i class="fa fa-address-book ">

                                                    </i>
                                                </a>

                                                @endif


                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-xl-{{$estudante->id}}">
                                                    <i class="fa fa-search ">

                                                    </i>
                                                    Detalhes
                                                </a>


                                                <div class="modal fade" id="modal-xl-{{$estudante->id}}"
                                                    style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Detalhes</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">



                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <label for="nome">Nome do Aluno</label>
                                                                        <input type="text" name="nomeAluno"
                                                                            class="form-control" id="nomeAluno"
                                                                            placeholder="Nome completo" required
                                                                            value="{{$estudante->nome_aluno}}">

                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label for="responsavel">Nome do Responsável
                                                                        </label>
                                                                        <input type="text" name="responsavel"
                                                                            class="form-control" id="responsavel"
                                                                            placeholder="Nome completo " required
                                                                            value="{{$estudante->responsavel}}">

                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label for="naturalidade">Naturalidade</label>
                                                                        <input type="text" name="naturalidade"
                                                                            class="form-control" id="naturalidade"
                                                                            placeholder="Paranavaí " required
                                                                            value="{{$estudante->naturalidade}}">

                                                                    </div>

                                                                </div>


                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <label for="dados"> RG do Aluno <b
                                                                                class="text-danger">*</b> </label>
                                                                        <input type="text" class="form-control"
                                                                            name="rgAluno" id="rgAluno" required
                                                                            data-inputmask="&quot;mask&quot;: &quot; 99.999.999-9&quot;"
                                                                            data-mask="" inputmode="verbatim"
                                                                            im-insert="true" required
                                                                            value="{{$estudante->rg_aluno}}">

                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label for="dados"> </label>
                                                                        <label for="dados"> CPF do Aluno <b
                                                                                class="text-danger">*</b></label>
                                                                        <input type="text" class="form-control"
                                                                            name="cpfAluno" id="cpfAluno"
                                                                            data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;"
                                                                            data-mask="" inputmode="verbatim"
                                                                            im-insert="true" required
                                                                            value="{{$estudante->cpf_aluno}}">
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <label>Telefone de contato :</label>



                                                                        <input type="text" class="form-control"
                                                                            name="telefone" id="telefone"
                                                                            data-inputmask="&quot;mask&quot;: &quot;(99) 99999-9999&quot;"
                                                                            data-mask="" inputmode="verbatim"
                                                                            im-insert="true" required
                                                                            value="{{$estudante->telefone}}">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <label for="escola">Nome da escola ou faculdade
                                                                            <b class="text-danger">*</b> </label>
                                                                        <input type="text" name="instituicao"
                                                                            class="form-control"
                                                                            placeholder="Exemplo, Unespar " required
                                                                            value="{{$estudante->instituicao}}">
                                                                    </div>


                                                                    <div class="col-3">
                                                                        <label>Série <b class="text-danger">*</b>
                                                                        </label>
                                                                        <select
                                                                            class="form-control select2 select2-hidden-accessible"
                                                                            style="width: 100%;" data-select2-id="1"
                                                                            tabindex="-1" aria-hidden="true" required
                                                                            name="serie">
                                                                            <option
                                                                                value="Ensino Fundamental Anos Iniciais 1° ao 5° Ano">
                                                                                Ensino Fundamental Anos
                                                                                Iniciais 1° ao 5° Ano</option>
                                                                            <option
                                                                                value="Ensino Fundamental Anos Iniciais 1° ao 5° Ano">
                                                                                6° Ano - Ensino
                                                                                Fundamental 6° ao 9° Ano</option>
                                                                            <option
                                                                                value="7° Ano - Ensino Fundamental 6° ao 9° Ano">
                                                                                7° Ano - Ensino Fundamental 6°
                                                                                ao 9° Ano</option>
                                                                            <option
                                                                                value="8° Ano - Ensino Fundamental 6° ao 9° Ano">
                                                                                8° Ano - Ensino Fundamental 6°
                                                                                ao 9° Ano</option>
                                                                            <option
                                                                                value="9° Ano - Ensino Fundamental 6° ao 9° Ano">
                                                                                9° Ano - Ensino Fundamental 6°
                                                                                ao 9° Ano</option>
                                                                            <option value="1° Ano - Ensino Médio">1° Ano
                                                                                -
                                                                                Ensino Médio</option>
                                                                            <option value="2° Ano - Ensino Médio">2° Ano
                                                                                -
                                                                                Ensino Médio</option>
                                                                            <option value="3° Ano - Ensino Médio">3° Ano
                                                                                -
                                                                                Ensino Médio</option>
                                                                            <option value="1° Fase - CEEBJA">1° Fase -
                                                                                CEEBJA
                                                                            </option>
                                                                            <option value="2° Fase - CEEBJA">2° Fase -
                                                                                CEEBJA
                                                                            </option>
                                                                            <option value="1° Ano - FACULDADE">1° Ano -
                                                                                FACULDADE</option>
                                                                            <option value="2° Ano - FACULDADE">2° Ano -
                                                                                FACULDADE</option>
                                                                            <option value="3° Ano - FACULDADE">3° Ano -
                                                                                FACULDADE</option>
                                                                            <option value="4° Ano - FACULDADE">4° Ano -
                                                                                FACULDADE</option>
                                                                            <option value="1° Modúlo - FACULDADE">1°
                                                                                Modúlo
                                                                                -
                                                                                FACULDADE</option>
                                                                            <option value="2° Modúlo - FACULDADE">2°
                                                                                Modúlo
                                                                                -
                                                                                FACULDADE</option>
                                                                            <option value="3° Modúlo - FACULDADE">3°
                                                                                Modúlo
                                                                                -
                                                                                FACULDADE</option>
                                                                            <option value="4° Modúlo - FACULDADE">4°
                                                                                Modúlo
                                                                                -
                                                                                FACULDADE</option>
                                                                        </select>

                                                                    </div>

                                                                    <div class="col-3">
                                                                        <label>Turno <b class="text-danger">*</b>
                                                                        </label>
                                                                        <select class="form-control"
                                                                            style="width: 100%;" required name="turno"
                                                                            value="{{$estudante->turno}}">
                                                                            <option value="Matutino - Manhã ">Matutino -
                                                                                Manhã
                                                                            </option>
                                                                            <option value="Vespertino - Tarde ">
                                                                                Vespertino -
                                                                                Tarde </option>
                                                                            <option value="Integral "> Integral
                                                                            </option>
                                                                            <option value="Noturno - Noite">Noturno -
                                                                                Noite
                                                                            </option>
                                                                        </select>


                                                                    </div>

                                                                    <div class="col-3">
                                                                        <label for="curso"> Curso <b
                                                                                class="text-danger">*</b>
                                                                        </label>
                                                                        <input type="text" name="curso"
                                                                            class="form-control"
                                                                            placeholder="Exemplo, Administração  "
                                                                            required value="{{$estudante->curso}}">


                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <label>Cep:<b
                                                                                class="text-danger">*</b></label></label>
                                                                        <input name="cep" type="text" id="cep"
                                                                            class="form-control" required
                                                                            data-inputmask="&quot;mask&quot;: &quot; 99.999-999&quot;"
                                                                            data-mask="" inputmode="verbatim"
                                                                            im-insert="true" required
                                                                            value="{{$estudante->cep}}" />

                                                                    </div>
                                                                    <div class="col-3">

                                                                        <label>Rua:<b
                                                                                class="text-danger">*</b></label></label>
                                                                        <input name="rua" type="text" id="rua" size="60"
                                                                            class="form-control" required
                                                                            value="{{$estudante->rua}}" />


                                                                    </div>
                                                                    <div class="col-2">
                                                                        <label>Número da casa:<b
                                                                                class="text-danger">*</b></label></label>
                                                                        <input name="numeroCasa" type="text"
                                                                            class="form-control" required
                                                                            value="{{$estudante->numero_casa}}" />

                                                                    </div>
                                                                    <div class="col-3">
                                                                        <label>Bairro:<b
                                                                                class="text-danger">*</b></label></label>
                                                                        <input class="form-control" name="bairro"
                                                                            type="text" id="bairro" size="40"
                                                                            class="form-control" required
                                                                            value="{{$estudante->bairro}}" />


                                                                    </div>
                                                                    <div class="col-2">

                                                                        <label>Cidade:<b
                                                                                class="text-danger">*</b></label></label>
                                                                        <input name="cidade" type="text" id="cidade"
                                                                            size="40" class="form-control" required
                                                                            value="{{$estudante->cidade}}" />

                                                                    </div>
                                                                </div>


                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
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
