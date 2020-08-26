@extends('layout.estudante')

@section('content')


<div class="row">
    <!-- left column -->
    <div class="container-fluid">
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-light-dark">
                <div class="card-header">
                    <h3 class="card-title">Novo cadastro de passe livre </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>

                    <div class="card-body">
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
                                placeholder="Nome completo " required>
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
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-long-arrow-alt-right"></i>
                                Próximo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- /.card -->
</div>
<!--/.col (left) -->
<!-- right column -->
<div class="col-md-6">

</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</div>
</div>
<!-- /.container-fluid -->
</section>

@endsection
