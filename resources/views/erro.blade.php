@extends('layout.estudante')

@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>404 Erro !</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page não encontrada.</h3>

                <p>

                    Não foi possível encontrar a página que você estava procurando. Enquanto isso, você pode retornar ao
                    painel ou tentar usar o formulário de pesquisa.
                </p>
                <a href="{{ route('estudante.index') }}" class="btn btn-block btn-success btn-lg"><i
                        class="fa fa-arrow-left"></i> Voltar</a>

            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
@endsection
