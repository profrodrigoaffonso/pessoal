@extends('layouts.admin')

@section('content')
<form action="{{ route('comandos.executar') }}" method="POST">
    @csrf
    @component('components.forms.input',[
        'label'     => 'Comando',
        'name'      => 'comando',
        'id'        => 'comando',
        'value'     => '',
        'maxlength' => 100,
        'required'  => 'required',
    ])
    @endcomponent
    <button class="btn btn-success btn-sm" title="Salvar"><i data-feather="save"></i></button>
  </form>
@endsection
