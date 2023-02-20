@extends('layouts.admin')

@section('content')
    <h1>Horários</h1>
    <form method="POST" action="{{ route('remedios.horarios.store') }}">
        @csrf
        @component('components.forms.datahora')            
        @endcomponent
        @foreach ($remedios as $remedio)
            @component('components.forms.checkbox',[
                'name'      => 'remedio_id[]',
                'id'        => 'remedio_id' . $remedio->id,
                'label'     => $remedio->nome,
                'value'     => $remedio->id
            ])                
            @endcomponent
        @endforeach
       
        <button type="submit" class="btn btn-success btn-sm" title="Salvar"><i data-feather="save"></i></button>
    </form>
    <form id="formExcluir" action="{{ route('remedios.horarios.delete') }}" method="POST">
        @csrf
        @method('DELETE')
        @component('components.forms.hidden', [
            'id' => 'id',
            'name'  => 'id'
        ])            
        @endcomponent
    </form>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Remédio</th>
                <th scope="col">Data Hora</th>
                <th></th>             
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
            <tr>
                <td>{{ $horario->nome }}</td>
                <td>{{ date('d/m/Y H:i', strtotime($horario->data_hora)) }}</td>
                <td>
                   <button class="btn btn-danger btn-sm" onclick="excluirHorario({{ $horario->id }})"><i data-feather="delete"></i></button>
                </td>
                {{-- <td><a href="{{ route('remedios.edit', ['id' => $remedio->id]) }}">Editar</a></td>               --}}
            </tr>
            @endforeach            
        </tbody>
    </table>
    <script>
        function excluirHorario(id){
            if(window.confirm('Deseja excluir?')){
                document.getElementById('id').value = id;
                document.getElementById('formExcluir').submit();
            }
        }
    </script>
@endsection