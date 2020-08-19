@extends('layout.layout')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Departamentos</h3>
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <label for="">Nome </label>
            <input type="text" name="name">

            <label for="">Email </label>
            <input type="email" name="email">

            <label for="">Senha </label>
            <input type="password" name="password">

            <input type="submit" value="Salvar">

        </form>
    </div>
</div>
@endsection
