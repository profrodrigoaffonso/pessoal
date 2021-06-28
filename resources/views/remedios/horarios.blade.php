@extends('layouts.admin')

@section('content')
    <h1>Horárioa</h1>
    <form method="POST" action="{{ route('remedios.horarios.store') }}">
        @csrf
        @component('components.forms.datahora')            
        @endcomponent
        @foreach ($remedios as $remedio)
            @component('components.forms.checkbox',[
                'name'      => 'remedio_id[]',
                'id'        => 'remedio_id[]',
                'label'     => $remedio->nome,
                'value'     => $remedio->id
            ])                
            @endcomponent
        @endforeach
        @component('components.forms.button',[
            'type' => 'submit',
            'label' => 'Salvar',
            'class' => 'btn btn-primary'
        ])            
        @endcomponent
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
    <p><a href="{{ route('remedios.create') }}">Novo</a></p>
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
                    @component('components.forms.button',[
                        'type'      => 'button',
                        'class'     => 'btn btn-primary',
                        'label'     => 'Excluir',
                        'onclick'   => 'onclick=excluirHorario(' . $horario->id . ')'
                    ])                        
                    @endcomponent
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