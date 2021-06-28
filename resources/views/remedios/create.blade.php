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
    @component('components.forms.button', [
        'type'    => 'submit',
        'class'   => 'btn btn-primary',
        'label'   => 'Salvar'
    ])        
    @endcomponent  
  </form>
@endsection