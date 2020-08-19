@extends('layout.layout')

@section('content')
<table>
    <tr>
        <td>IDs</td>
        <td>nome</td>
        <td>Email </td>
        <td>Ação </td>

    </tr>
    @foreach ($users as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>
            <a href="{{ route('user.show', ['user'=> $item->id]) }}">Ver Usuarios</a>
            {{--  ao ptrabalhar com delet utilizar  um form no button   --}}
            <form action="{{ route('user.destroy', ['user'=> $item->id]) }}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="user" value="">
                <input type="submit" value="Remover">
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
