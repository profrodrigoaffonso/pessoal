<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Foto;

class FotosController extends Controller
{
    public function index(){

        $fotos = Foto::select('id', 'nome', 'caminho')
                        ->get();

        return view('fotos.index', compact('fotos'));

    }

    public function create(){

        return view('fotos.create');

    }

    public function store(Request $request){

        $file = $request->file('foto');

        $extensao = $request->foto->getClientOriginalExtension();

        // dd($request->foto);


        $novoNome = uniqid(). '.' . $extensao;

        if(move_uploaded_file($request->foto->path(), "fotos/{$novoNome}")){
            $dados = $request->all();
            $dados['caminho'] = "fotos/{$novoNome}";

            Foto::create($dados);
        }

        return redirect(route('fotos.index'));
        
     
    }

    public function delete(Request $request){

        $dados = $request->all();

        $foto = Foto::findOrFail($dados['id']);

        if(unlink($foto->caminho)){

            $foto->delete();

        }

        return redirect(route('fotos.index'));        

    }

    public function resposta(){
        echo '{
            "items": [
              { "id": 1, "name": "Apples",  "price": "$2" },
              { "id": 2, "name": "Peaches", "price": "$5" }
            ] 
          }';
        die;
    }
}
