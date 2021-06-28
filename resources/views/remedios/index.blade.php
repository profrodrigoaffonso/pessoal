@extends('layouts.admin')

@section('content')
    <h1>Remédios</h1>
    <p><a href="{{ route('remedios.create') }}">Novo</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th></th>             
            </tr>
        </thead>
        <tbody>
            @foreach($remedios as $remedio)
            <tr>
                <td>{{ $remedio->nome }}</td>
                <td><a href="{{ route('remedios.edit', ['id' => $remedio->id]) }}">Editar</a></td>              
            </tr>
            @endforeach            
        </tbody>
    </table>
@endsection