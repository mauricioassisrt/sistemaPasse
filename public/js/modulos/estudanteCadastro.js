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
                //     alert('no if');
                $("#dados_aluno").hide();
                $('#possui_cpf_aluno').show();
                //caso seja false o aluno não possue cpf
            } else if (valor_radio_cpf == 'false') {
                //  alert('no else' + valor_radio_cpf);
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
        // alert("Vazios");
        if (vazios.length) {
            //$(vazios).addClass('vazio');
            alert("Todos os campos devem ser preenchidos.");
            return false;
        } else {
            // alert("Eureka1");
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
            //alert("Eureka1");
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

            alert("Todos os campos do endereço que devem ser preenchidos!!!!");
            return false;
        } else {
            // alert("Eureka1");
            $("#endereco").hide();
            $('#escola').show();

        }
    });
});

//voltar tela aluno
$("#btndadosAluno").click(function () {
    //alert('no btndadosAluno')
    $("#dados_aluno").show();
    $('#cpf_responsavel').hide();
    $('#possui_cpf_aluno').hide();
    // alert('aluno');
});
//voltar tela aluno
$("#btndadosAluno_tela_responsavel").click(function () {
    //alert('no btndadosAluno_tela_responsavel')
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
