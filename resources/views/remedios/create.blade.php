@extends('layouts.admin')

@section('content')
<form action="{{ route('remedios.store') }}" method="POST">
    @csrf
    @component('components.forms.input',[
        'label'     => 'Nome',
        'name'      => 'nome',
        'id'        => 'nome',
        'value'     => '',
        'maxlength' => 200,
        'required'  => 'required',
    ])
    @endcomponent
    <button class="btn btn-success btn-sm" title="Salvar"><i data-feather="save"></i></button>
  </form>
@endsection