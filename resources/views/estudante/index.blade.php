@extends('layout.estudante')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row">
    <!-- left column -->
    <div class="container-fluid">
        <div class="col-lg-12 col-12">
            <!-- jquery validation -->
            <div class="card card-light-dark">
                <div class="card-header">
                    <h3 class="card-title">Novo cadastro de passe livre </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
            </div>


            <form action="{{ route('verifica.cpf') }}" method="POST">
                @csrf
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
                                data-inputmask="&quot;mask&quot;: &quot;(99) 99999-9999&quot;" data-mask=""
                                inputmode="verbatim" im-insert="true" required>
                        </div>


                        <!-- /.input group -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-long-arrow-alt-right"></i>
                            Próximo</button>
                    </div>
                </div>
                {{--  <div class="form-group">

                        <div class="form-group">
                            <label>Minimal</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="2" tabindex="-1" aria-hidden="false">
                                <option selected="selected" data-select2-id="3">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                    </div>  --}}


            </form>
        </div>
    </div>
</div>

</div>


</div>


</div>


<!-- /.container-fluid -->
</section>
<script>
    {{-- $(document).ready(function () {
        $("#divCpf").hide();
        $("#divDadosResponsavel").hide();
        $("#divDadosAluno").hide();
        $("#divEscolaridade").hide();



  $.validator.setDefaults({
    submitHandler: function () {
        $("#divDadosPessoais").hide();

    }
  });

  $('#dadosPessoais').validate({
    rules: {
     nomeAluno: {
        required: true,
      },
      responsavel: {
        required: true,

      },
      naturalidade: {
        required: true
      },
      telefone: {
        required: true
      },
      possuiCpf: {
        required: true
      },



    },
    messages: {
        nomeAluno: {
          required: "Campo Obrigatório",

        },
        responsavel: {
          required: "Campo Obrigatório",

        },
        naturalidade: {
            required:"Campo Obrigatório"
        },

        telefone: {
            required: "Campo Obrigatório"
        },


      },


    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
//div cpf possui
$("#possuiCpf").on('click', function() {
    $("#divCpf").hide();
    $("#divDadosAluno").show();
    $("#divEscolaridade").hide();

});
$("#naoPossuiCpf").on('click', function() {
    $("#divCpf").hide();
    $("#divDadosResponsavel").show();
});

$("#escolaridade").on('click', function() {
    $("#divDadosResponsavel").hide();

    $("#divEscolaridade").show();
    $("#divCpf").hide();
}); --}}

});
</script>
@endsection
