<div class="card-body" id="divDadosAluno">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Dados do Aluno!</h5>
        <strong>!</strong>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <label for="dados"> RG do Aluno</label>
                <input type="text" class="form-control" name="rgAluno" id="rgAluno" required>
            </div>
            <div class="col-md-12">
                <label for="dados"> </label>
                <label for="dados"> CPF do Aluno</label>
                <input type="text" class="form-control" name="cpfAluno" id="cpfAluno"
                    data-inputmask="&quot;mask&quot;: &quot; 999.999.999-99&quot;" data-mask="" inputmode="verbatim"
                    im-insert="true" required>
            </div>
            <div class="col-md-12">
                <label for=""> Foto do verso do RG </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fotoRgAluno" required>
                    <label class="custom-file-label" for="exampleInputFile">Clique aqui </label>
                </div>
            </div>
            <div class="col-md-12">
                <label for=""> Foto do CPF </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fotoCpfAluno" required>
                    <label class="custom-file-label" for="exampleInputFile">Clique aqui </label>
                </div>

            </div>
        </div>


    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary" id="btn-dadosPessoais"><i class="fas fa-long-arrow-alt-right"></i>
            Próximo</button>
    </div>
</div>
