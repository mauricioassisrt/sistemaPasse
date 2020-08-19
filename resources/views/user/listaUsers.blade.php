@extends('layout.layout')

@section('content')
<h1>Lista de Usuarios </h1>

<p>O nome do Usuario é : {{ $user->name }} e ele tem o email {{ $user->email }}</p>
@endsection
