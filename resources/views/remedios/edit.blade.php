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
    <button class="btn btn-success btn-sm" title="Salvar"><i data-feather="save"></i></button>
  </form>
@endsection