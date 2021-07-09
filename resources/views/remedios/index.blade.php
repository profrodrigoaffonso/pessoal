@extends('layouts.admin')

@section('content')
    <h1>Remédios</h1>
    <p><a class="btn btn-primary btn-sm" href="{{ route('remedios.create') }}"><i data-feather="plus"></i></a></p>
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
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('remedios.edit', ['id' => $remedio->id]) }}"><i data-feather="edit"></i></a>
                </td>              
            </tr>
            @endforeach            
        </tbody>
    </table>
@endsection