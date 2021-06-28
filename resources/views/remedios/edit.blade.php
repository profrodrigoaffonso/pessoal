@extends('layouts.admin')

@section('content')
<form action="{{ route('remedios.update') }}" method="POST">
@method('PUT')
    @csrf  
    @method('PUT')
    @component('components.forms.hidden',[
        'name'      => 'id',
        'id'        => 'id',
        'value'     => $remedio->id
    ])
    @endcomponent
    @component('components.forms.input',[
        'label'     => 'Nome',
        'name'      => 'nome',
        'id'        => 'nome',
        'value'     => $remedio->nome,
        'maxlength' => 200,
        'required'  => 'required',
    ])
    @endcomponent
    @component('components.forms.button', [
        'type'    => 'submit',
        'class'   => 'btn btn-primary',
        'label'   => 'Salvar'
    ])        
    @endcomponent 
  </form>
@endsection