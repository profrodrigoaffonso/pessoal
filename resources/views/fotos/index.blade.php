@extends('layouts.admin')

@section('content')
    <h1>Fotos</h1>
    <p><a href="{{ route('fotos.create') }}">Nova</a></p>
    <form id="formExcluir" action="{{ route('fotos.delete') }}" method="POST">
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
                <th scope="col">Nome</th>
                <th scope="col">Miniatura</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($fotos as $foto)
            <tr>
                <td>{{ $foto->nome }}</td>  
                <td><a href="javascript:exibeFoto('{{ $foto->caminho }}')"><img src="/{{ $foto->caminho }}" width="100"></a></td> 
                <td><button type="button" onclick="excluirFoto({{ $foto->id }})" class="btn btn-primary">Editar</a></td> 
            @endforeach            
        </tbody>
    </table>
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="exibicaoFoto">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        function excluirFoto(id){
            if(window.confirm('Deseja excluir?')){
                document.getElementById('id').value = id;
                document.getElementById('formExcluir').submit();
            }
        }

        function exibeFoto(foto){

            $('.modal-body').html('<img class="img-fluid" src="/' + foto + '">');

            $('.modal').modal();


            console.log(foto);
        }
    </script>
@endsection