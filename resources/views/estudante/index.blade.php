@extends('layout.estudante')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="container-fluid">



    <div class="card card-light-dark">
        <div class="card-header">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>Dados do Aluno</h5>

        </div>
        <div class="card-body">


            <form action="{{ route('verifica.cpf') }}" method="POST">
                @csrf


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
