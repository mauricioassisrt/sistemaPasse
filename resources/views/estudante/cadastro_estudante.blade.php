@extends('layout.estudante')
<!-- Adicionando JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- Adicionando Javascript -->
<script>
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (dados.localidade != "Paranavaí" && dados.cep != '87722-000') {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("O Cep não é de um endereço de Paranavaí .");

                        } //end if.
                        else {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);

                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });

</script>
@section('content')

    <div class="container-fluid">


        <div class="card card-light-dark">
            <div class="card-header">
                <h2 class="card-title"><strong>Qual a instituição de ensino/escola que o aluno
                        estuda ?</strong></h2>
            </div>
            <div class="card-body">
               
                <form action="{{ route('estudante.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                   href="#dados-aluno" role="tab" aria-controls="dados-aluno"
                                   aria-selected="false">Dados cadastrais do aluno </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " id="custom-tabs-three-messages-tab" data-toggle="pill"
                                   href="#custom-tabs-three-messages" role="tab"
                                   aria-controls="custom-tabs-three-messages"
                                   aria-selected="false">Endereço </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " id="custom-tabs-three-home-tab" data-toggle="pill"
                                   href="#cpf" role="tab" aria-controls="cpf"
                                   aria-selected="false">Escolas </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="custom-tabs-three-tabContent">


                        <div class="tab-pane  active show" id="dados-aluno">

                            <div class="card-body " id="divDadosPessoais">

                                <div class="callout callout-danger">
                                    <h5>Atenção </h5>

                                    <p><b> Nesta tela todos os campos são obrigatórios </b></p>
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome do Aluno</label>
                                    <input type="text" name="nomeAluno" class="form-control" id="nomeAluno"
                                           placeholder="Nome completo" required>
                                </div>
                                <div class="form-group">
                                    <label for="responsavel">Nome do Responsável </label>
                                    <input type="text" name="responsavel" class="form-control" id="responsavel"
                                           placeholder="Nome completo " requi red>
                                </div>
                                <div class="form-group">
                                    <label for="naturalidade">Naturalidade</label>
                                    <input type="text" name="naturalidade" class="form-control" id="naturalidade"
                                           placeholder="Paranavaí " required>
                                </div>
                                <div class="form-group">
                                    <label>Telefone de contato :</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="telefone" id="telefone"
                                               data-inputmask="&quot;mask&quot;: &quot;(99) 99999-9999&quot;"
                                               data-mask=""
                                               inputmode="verbatim" im-insert="true" required>
                                    </div>


                                    <!-- /.input group -->
                                </div>

                            </div>
                            <div id="confirma_cpf">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <h5><i class="icon fas fa-info"></i> Atenção!</h5>
                                    Caso não possua CPF clique em não, caso possua clique em sim!
                                </div>


                                <div class="row justify-content-center align-items-center">


                                    <div class="col-md-6">

                                        <button type="submit" class="btn btn-block btn-primary btn-lg"><i
                                                class="icon fas fa-check"></i> Sim
                                        </button>

                                    </div>
                                    <div class="col-md-6 float-right">
                                        <button type="submit" class="btn btn-block btn-danger btn-lg"><i
                                                class="icon fas fa-window-close"></i> Não
                                        </button>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div id="possui_cpf_aluno" style="display: none">

                                <div class="col-md-12">
                                    <label for="dados"> RG do Aluno <b class="text-danger">*</b> </label>
                                    <input type="text" class="form-control" name="rgAluno" id="rgAluno" required
                                           data-inputmask="&quot;mask&quot;: &quot; 99.999.999-9&quot;" data-mask=""
                                           inputmode="verbatim"
                                           im-insert="true" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="dados"> </label>
                                    <label for="dados"> CPF do Aluno <b class="text-danger">*</b></label>
                                    <input type="text" class="form-control" name="cpfAluno" id="cpfAluno"
                                           data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask=""
                                           inputmode="verbatim"
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

                            </div>

                            <div id="cpf_responsavel" style="display: none">

                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-12">
                                        <label for="dados"> RG do Responsável <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" name="rgResponsavel" required
                                               data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;"
                                               data-mask=""
                                               inputmode="verbatim" im-insert="true">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="dados"> </label>
                                        <label for="dados"> CPF do Responsável<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" name="cpfResponsavel"
                                               id="cpfResponsavel"
                                               data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;"
                                               data-mask=""
                                               inputmode="verbatim" im-insert="true" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="dados"> Foto do RG do Responsável o Verso <b
                                                class="text-danger">*</b>
                                        </label><br/>
                                        <input type="file" name="rgResponsavelFoto" required>

                                    </div>
                                    <div class="col-md-12">
                                        <label for="dados"> Foto do CPF do Responsável <b
                                                class="text-danger">*</b></label><br/>
                                        <input type="file" name="cpfResponsavelFoto" required>

                                    </div>
                                    <div class="col-md-12">
                                        <label for="dados"> Foto da Certidão de Nascimento do Aluno<b
                                                class="text-danger">*</b>
                                        </label><br/>
                                        <input type="file" name="certidaoNascimentoAlunoFoto" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                             aria-labelledby="custom-tabs-three-messages-tab">
                            <div class="card-body">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> <strong>Atenção !</strong> </h5>
                                    Tire uma foto do comprovante de residência

                                    Digite somente o Cep <br>

                                    <p class="text-danger">Campos com <strong>*</strong> é de preenchimento obrigatório !</p>


                                </div>
                                <div class="form-group">
                                    <label for="dados"> Foto do comprovante de residênca<b
                                            class="text-danger">*</b></label><br/>
                                    <input type="file" name="comprovanteResidencia" required>

                                </div>
                                <div class="form-group">
                                    <label>Cep:<b class="text-danger">*</b></label></label>
                                    <input name="cep" type="text" id="cep" value="" class="form-control" required
                                           data-inputmask="&quot;mask&quot;: &quot; 99.999-999&quot;" data-mask=""
                                           inputmode="verbatim"
                                           im-insert="true" required/>
                                </div>
                                <div class="form-group">
                                    <label>Rua:<b class="text-danger">*</b></label></label>
                                    <input name="rua" type="text" id="rua" size="60" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Número da casa:<b class="text-danger">*</b></label></label>
                                    <input name="numeroCasa" type="text" class="form-control" required/>
                                </div>

                                <div class="form-group">
                                    <label>Bairro:<b class="text-danger">*</b></label></label>
                                    <input class="form-control" name="bairro" type="text" id="bairro" size="40"
                                           class="form-control"
                                           required/>
                                </div>
                                <div class="form-group">
                                    <label>Cidade:<b class="text-danger">*</b></label></label>
                                    <input name="cidade" type="text" id="cidade" size="40" class="form-control"
                                           required/>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="cpf">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção !</h5>
                                Caso sua série ou turno não conste no formulário, informe no campo observações !
                                Caso seu RG possua letras como X informe somente números ! <br>
                                Para que o cadastro seja efetivado, não deixe de preencher todos os dados! <br>

                                <p class="text-danger">Campos com <strong>*</strong> é de preenchimento obrigatório !</p>
                            </div>
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
                                    <option value="Integral "> Integral </option>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


    </section>

@endsection
