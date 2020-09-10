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
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>Dados de endereço</h5>

        </div>
        <div class="card-body">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> <strong>Atenção !</strong> </h5>
                Tire uma foto do comprovante de residência

                Digite somente o Cep <br>

                <p class="text-danger">Campos com <strong>*</strong> é de preenchimento obrigatório !</p>


            </div>
            <form action="{{route('finaliza')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="dadosPessoaisAluno" value="{{$dados}}">
                <div class="form-group">
                    <label for="dados"> Foto do comprovante de residênca<b class="text-danger">*</b></label><br />
                    <input type="file" name="comprovanteResidencia" required>

                </div>
                <div class="form-group">
                    <label>Cep:<b class="text-danger">*</b></label></label>
                    <input name="cep" type="text" id="cep" value="" class="form-control" required
                        data-inputmask="&quot;mask&quot;: &quot; 99.999-999&quot;" data-mask="" inputmode="verbatim"
                        im-insert="true" required />
                </div>
                <div class="form-group">
                    <label>Rua:<b class="text-danger">*</b></label></label>
                    <input name="rua" type="text" id="rua" size="60" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Número da casa:<b class="text-danger">*</b></label></label>
                    <input name="numeroCasa" type="text" class="form-control" required />
                </div>

                <div class="form-group">
                    <label>Bairro:<b class="text-danger">*</b></label></label>
                    <input class="form-control" name="bairro" type="text" id="bairro" size="40" class="form-control"
                        required />
                </div>
                <div class="form-group">
                    <label>Cidade:<b class="text-danger">*</b></label></label>
                    <input name="cidade" type="text" id="cidade" size="40" class="form-control" required />
                </div>

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
