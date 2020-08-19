@extends('layout.layout')

@section('content')
<form action="{{ route('user.update',  ['user'=> $user->id]) }}" method="post">
    {{--  Metodo csrf token necessario   --}}
    @csrf
    @method('PUT')
    <label for="">Nome </label>
    <input type="text" name="name" value="{{ $user->name }}">

    <label for="">Email </label>
    <input type="email" name="email" value="{{ $user->email }}">

    <label for="">Senha </label>
    <input type="text" name="password" value="{{ $user->password }}">

    <input type="submit" value="Editar">

</form>
@endsection
