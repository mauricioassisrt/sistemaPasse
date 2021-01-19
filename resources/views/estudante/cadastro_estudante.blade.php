@extends('layout.estudante')
<!-- Adicionando JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- Adicionando Javascript -->
<script>
    $(document).ready(function () {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function () {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

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


        <div class="card card-light-dark" id="tab">

            <div class="card-body ">
                <form action="{{url('estudante/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="dados_aluno">

                        <div class="callout callout-danger">
                            <h5>Atenção </h5>

                            <p><b> Nesta tela todos os campos são obrigatórios </b></p>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome do Aluno</label>
                            <input type="text" name="nomeAluno" class="form-control dados_aluno" id="nomeAluno"
                                   placeholder="Nome completo">
                        </div>
                        <div class="form-group">
                            <label for="responsavel">Nome do Responsável </label>
                            <input type="text" name="responsavel" class="form-control dados_aluno" id="responsavel"
                                   placeholder="Nome completo ">
                        </div>
                        <div class="form-group">
                            <label for="naturalidade">Naturalidade</label>
                            <input type="text" name="naturalidade" class="form-control dados_aluno"
                                   id="naturalidade"
                                   placeholder="Paranavaí ">
                        </div>
                        <div class="form-group">
                            <label>Telefone de contato :</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control dados_aluno" name="telefone" id="telefone"
                                       data-inputmask="&quot;mask&quot;: &quot;(99) 99999-9999&quot;" data-mask=""
                                       inputmode="verbatim" im-insert="true">
                            </div>


                            <!-- /.input group -->
                        </div>


                        <!--------------------------------verifica cpf  --------------!>

                        <div id="confirma_cpf">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                </button>
                                <h5><i class="icon fas fa-info"></i> Atenção!</h5>
                                Caso não possua CPF clique em não, caso possua clique em sim!
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input dados_aluno" type="radio" id="possuiCpf"
                                       name="possuiCpf" value="true">
                                <label for="possuiCpf" class="custom-control-label">Possui CPF </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input dados_aluno" type="radio" id="naoPossuiCPF"
                                       name="possuiCpf" value="false">
                                <label for="naoPossuiCPF" class="custom-control-label">Não possui CPF </label>
                            </div>
                        </div>
                        <div class="card-footer" id="footer">

                            <a href="" class="btn btn-success btn-lg "> <i class="fa fa-bus pull-right"></i>
                                Inicio </a>
                            <a href="#" class="btn btn-success btn-lg " id="form_cadastra_dados_aluno"> <i
                                    class="fa fa-bus pull-right"></i>
                                Próximo <i class="fas fa-long-arrow-alt-right"></i></a>

                        </div>

                    </div>
                    <!--------------------------------fim verifica cpf   -------------------------!>
                    <!--------------------------------cpf do aluno   -------------------------!>
                    <div id="possui_cpf_aluno" style="display: none">

                        <div class="col-md-12">
                            <label for="dados"> RG do Aluno <b class="text-danger">*</b> </label>
                            <input type="text" class="form-control cpf_aluno" name="rgAluno" id="rgAluno"
                                   data-inputmask="&quot;mask&quot;: &quot; 99.999.999-9&quot;" data-mask=""
                                   inputmode="verbatim" im-insert="true">
                        </div>
                        <div class="col-md-12">
                            <label for="dados"> </label>
                            <label for="dados"> CPF do Aluno <b class="text-danger">*</b></label>
                            <input type="text" class="form-control cpf_aluno" name="cpfAluno" id="cpfAluno"
                                   data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask=""
                                   inputmode="verbatim" im-insert="true">
                        </div>
                        <div class="col-md-12">
                            <label for=""> Foto do verso do RG <b class="text-danger">*</b></label><br>
                            <input type="file" name="rgAlunoFoto" class="form-control cpf_aluno">
                        </div>
                        <div class="col-md-12">
                            <label for=""> Foto do CPF <b class="text-danger">*</b> </label><br>
                            <input type="file" name="cpfAlunoFoto" class="form-control cpf_aluno">

                        </div>
                        <br>
                        <div class="card-footer">

                            <a href="#" class="btn btn-success btn-lg " id="btndadosAluno"> <i
                                    class="fa fa-bus pull-right"></i>
                                Voltar </a>

                            <a href="#" class="btn btn-success btn-lg " id="form_cadastra_cpf_aluno"> <i
                                    class="fas fa-long-arrow-alt-right"></i>
                                Próximo </a>
                        </div>
                    </div>
                    <!--------------------------------FIM cpf do aluno  -------------------------!>
                    <!--------------------------------dados responsavel   -------------------------!>
                    <div id="cpf_responsavel" style="display: none">


                        <div class="col-md-12">
                            <label for="dados"> RG do Responsável <b class="text-danger">*</b></label>
                            <input type="text" class="form-control dados_responsavel" name="rgResponsavel"
                                   data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask=""
                                   inputmode="verbatim" im-insert="true">
                        </div>
                        <div class="col-md-12">
                            <label for="dados"> </label>
                            <label for="dados"> CPF do Responsável<b class="text-danger">*</b></label>
                            <input type="text" class="form-control dados_responsavel" name="cpfResponsavel"
                                   id="cpfResponsavel"
                                   data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask=""
                                   inputmode="verbatim" im-insert="true" >
                        </div>
                        <div class="col-md-12">
                            <label for="dados"> Foto do RG do Responsável o Verso <b class="text-danger">*</b>
                            </label><br/>
                            <input type="file" class="form-control dados_responsavel" name="rgResponsavelFoto"
                                   >

                        </div>
                        <div class="col-md-12">
                            <label for="dados"> Foto do CPF do Responsável <b
                                    class="text-danger">*</b></label><br/>
                            <input type="file" class="form-control dados_responsavel" name="cpfResponsavelFoto"
                                   >

                        </div>
                        <div class="col-md-12">
                            <label for="dados"> Foto da Certidão de Nascimento do Aluno<b
                                    class="text-danger">*</b>
                            </label><br/>
                            <input type="file" name="certidaoNascimentoAlunoFoto"
                                   class="form-control dados_responsavel"
                                   id="certidaoNascimento" >

                        </div>
                        <div class="card-footer">

                            <a href="#" class="btn btn-success btn-lg " id="btndadosAluno_tela_responsavel"> <i
                                    class="fa fa-bus pull-right"></i>
                                Voltar </a>

                            <a href="#" class="btn btn-success btn-lg " id="form_cadastra_dados_responsavel"
                            > <i class="fas fa-long-arrow-alt-right"></i>
                                Próximo </a>
                        </div>
                    </div>
                    <!--------------------------------Fim dados do responsavel   -------------------------!>
                    <!--------------------------------ENDERECO  -------------------------!>
                    <div id="endereco" style="display: none">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> <strong>Atenção !</strong></h5>
                            Tire uma foto do comprovante de residência

                            Digite somente o Cep <br>

                            <p class="text-danger">Campos com <strong>*</strong> é de preenchimento obrigatório !
                            </p>


                        </div>
                        <div class="form-group">
                            <label for="dados"> Foto do comprovante de residênca<b
                                    class="text-danger">*</b></label><br/>
                            <input type="file" name="comprovanteResidencia" class="input_endereco" required>

                        </div>
                        <div class="form-group">
                            <label>Cep:<b class="text-danger">*</b></label></label>
                            <input name="cep" type="text" id="cep" value="" class="form-control input_endereco"
                                   data-inputmask="&quot;mask&quot;: &quot; 99.999-999&quot;" data-mask=""
                                   inputmode="verbatim" im-insert="true" required/>
                        </div>
                        <div class="form-group">
                            <label>Rua:<b class="text-danger">*</b></label></label>
                            <input name="rua" type="text" id="rua" size="60" class="form-control input_endereco"
                                   />
                        </div>
                        <div class="form-group">
                            <label>Número da casa:<b class="text-danger">*</b></label></label>
                            <input name="numeroCasa" type="text" class="form-control input_endereco" />
                        </div>

                        <div class="form-group">
                            <label>Bairro:<b class="text-danger">*</b></label></label>
                            <input class="form-control input_endereco" name="bairro" type="text" id="bairro" size="40"
                                   class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Cidade:<b class="text-danger">*</b></label></label>
                            <input name="cidade" type="text" id="cidade" size="40" class="form-control input_endereco"
                                   />
                        </div>
                        <div class="card-footer" id="footer-endereco">

                            <a href="#" class="btn btn-success btn-lg " id="btn_voltarcpf_responsavel_tela"
                               style="display: none"> <i
                                    class="fa fa-bus pull-right"></i>
                                Voltar para dados do responsável </a>
                            <a href="#" class="btn btn-success btn-lg " id="btn_voltar_dados_aluno"
                               style="display: none">
                                <i
                                    class="fa fa-bus pull-right"></i>
                                Voltar para dados do Aluno </a>

                            <a href="#" class="btn btn-success btn-lg " id="form_cadastra_endereco"
                            > <i class="fas fa-long-arrow-alt-right"></i>
                                Próximo </a>
                        </div>
                    </div>
                    <!--------------------------------FIM ENDERECO   -------------------------!>
                    <!--------------------------------ESCOLA   -------------------------!>
                    <div id="escola" style="display: none">

                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção !</h5>
                            Caso sua série ou turno não conste no formulário, informe no campo observações !
                            Caso seu RG possua letras como X informe somente números ! <br>
                            Para que o cadastro seja efetivado, não deixe de preencher todos os dados! <br>

                            <p class="text-danger">Campos com <strong>*</strong> é de preenchimento obrigatório !
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="escola">Nome da escola ou faculdade <b class="text-danger">*</b> </label>
                            <input type="text" name="instituicao" class="form-control"
                                   placeholder="Exemplo, Unespar " requi
                                   red>
                        </div>
                        <div class="form-group">
                            <label for="dados"> Foto da declaração de Matrícula <b
                                    class="text-danger">*</b></label><br/>
                            <input type="file" name="declaracaoMatriculaFoto" required>

                        </div>
                        <div class="form-group">
                            <label>Série <b class="text-danger">*</b> </label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true" required name="serie">
                                <option value="Ensino Fundamental Anos Iniciais 1° ao 5° Ano"> Ensino Fundamental
                                    Anos
                                    Iniciais 1° ao 5° Ano
                                </option>
                                <option value="Ensino Fundamental Anos Iniciais 1° ao 5° Ano">6° Ano - Ensino
                                    Fundamental 6° ao 9° Ano
                                </option>
                                <option value="7° Ano - Ensino Fundamental 6° ao 9° Ano">7° Ano - Ensino Fundamental
                                    6°
                                    ao 9° Ano
                                </option>
                                <option value="8° Ano - Ensino Fundamental 6° ao 9° Ano">8° Ano - Ensino Fundamental
                                    6°
                                    ao 9° Ano
                                </option>
                                <option value="9° Ano - Ensino Fundamental 6° ao 9° Ano">9° Ano - Ensino Fundamental
                                    6°
                                    ao 9° Ano
                                </option>
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
                            <select class="form-control select2 select2-accessible" style="width: 100%;" required
                                    name="turno">
                                <option value="Matutino - Manhã ">Matutino - Manhã</option>
                                <option value="Vespertino - Tarde ">Vespertino - Tarde</option>
                                <option value="Integral "> Integral</option>
                                <option value="Noturno - Noite">Noturno - Noite</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="curso"> Curso <b class="text-danger">*</b> </label>
                            <input type="text" name="curso" class="form-control"
                                   placeholder="Exemplo, Administração  "
                                   required>
                        </div>
                        <div>

                            <label for="obs"> Observações <b class="text-danger">*</b> </label>
                            <textarea class="form-control" rows="3"
                                      placeholder=" Aqui coloque informações que são imporntantes caso haja necessidade "
                                      name="obs"></textarea>

                        </div>

                        <div class="card-footer">

                            <a href="#" class="btn btn-success btn-lg " id="btn_voltar_endereco"> <i
                                    class="fa fa-bus pull-right"></i>
                                Voltar </a>

                            <button type="submit" class="btn btn-lg btn-primary"><i
                                    class="fas fa-long-arrow-alt-right"></i>
                                Emitir protocolo
                            </button>
                        </div>
                    </div>

                    <!--------------------------------------FIM ESCOLA-------------------------------------->
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        // Primeira DIV dados do aluno
        // verifica ao clicar em possui cpf se os inputs estão preechidos

        $(function () {
            $("#form_cadastra_dados_aluno").click(function () {
                var vazios = $(".dados_aluno").filter(function () {
                    return !this.value;
                }).get();

                if (vazios.length) {
                    $(vazios).addClass('vazio');
                    alert("Todos os campos devem ser preenchidos.");
                    return false;
                } else {
                    var valor_radio_cpf = $('input[name=possuiCpf]:checked', '#confirma_cpf')
                        .val();
                    //caso seja true o aluno selecionou que possue cpf
                    if (valor_radio_cpf === 'true') {
                        alert('no if');
                        $("#dados_aluno").hide();
                        $('#possui_cpf_aluno').show();
                        //caso seja false o aluno não possue cpf
                    } else if (valor_radio_cpf == 'false') {
                        alert('no else' + valor_radio_cpf);
                        $("#dados_aluno").hide();
                        $('#cpf_responsavel').show();
                    }
                }
            });
        });
        //verifica dados responsavel
        $(function () {
            $("#form_cadastra_dados_responsavel").click(function () {
                var vazios = $(".dados_responsavel").filter(function () {
                    return !this.value;
                }).get();
                alert("Vazios");
                if (vazios.length) {
                    $(vazios).addClass('vazio');
                    alert("Todos os campos devem ser preenchidos.");
                    return false;
                } else {
                    alert("Eureka1");
                    $("#cpf_responsavel").hide();
                    $('#btn_voltarcpf_responsavel_tela').show();
                    $('#endereco').show();

                }
            });
        });
        //verifica dados do aluno
        $(function () {
            $("#form_cadastra_cpf_aluno").click(function () {
                var vazios = $(".cpf_aluno").filter(function () {
                    return !this.value;
                }).get();

                if (vazios.length) {
                    $(vazios).addClass('vazio');
                    alert("Todos os campos devem ser preenchidos.");
                    return false;
                } else {
                    alert("Eureka1");
                    $("#possui_cpf_aluno").hide();
                    $('#btn_voltar_dados_aluno').show();
                    $('#endereco').show();

                }
            });
        });
        //verifica endereco
        $(function () {
            $("#form_cadastra_endereco").click(function () {
                var vazios = $(".input_endereco").filter(function () {
                    return !this.value;
                }).get();

                if (vazios.length) {
                    $(vazios).addClass('vazio');
                    alert("Todos os campos do endereço que devem ser preenchidos!!!!");
                    return false;
                } else {
                    alert("Eureka1");
                    $("#endereco").hide();
                    $('#escola').show();

                }
            });
        });

        //voltar tela aluno
        $("#btndadosAluno").click(function () {
            alert('no btndadosAluno')
            $("#dados_aluno").show();
            $('#cpf_responsavel').hide();
            $('#possui_cpf_aluno').hide();
            alert('aluno');
        });
        //voltar tela aluno
        $("#btndadosAluno_tela_responsavel").click(function () {
            alert('no btndadosAluno_tela_responsavel')
            $("#dados_aluno").show();
            $('#cpf_responsavel').hide();

        });

        //voltar tela dados responsavel
        $("#btn_voltarcpf_responsavel_tela").click(function () {

            $("#cpf_responsavel").show();
            $('#endereco').hide();

        });
        //voltar tela dados aluno
        $("#btn_voltar_dados_aluno").click(function () {

            $("#possui_cpf_aluno").show();
            $('#endereco').hide();

        });
        //voltar tela endereco
        $("#btn_voltar_endereco").click(function () {

            $("#endereco").show();
            $('#escola').hide();

        });
    </script>
@endsection
