<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comando;

class ComandosController extends Controller
{
    public function receber(){
        $comando = Comando::findOrFail(1);

        if($comando->executado == 'n'){
            $comando->update(
                [
                    'executado' => 's'
                ]
            );
            // Comando::where('id', 1)
            //     ->update(['executado' => 's']);
            echo $comando->comando;
        } else {
            echo '';
        }

        die;

    }

    public function enviarComando(){

        return view('comandos.enviar_comando');
    }

    public function alterarComando(Request $request){

        $dados = $request->all();
        Comando::where('id', 1)
                ->update([
                    'comando' => $dados['comando'],
                    'executado' => 'n'
                ]);

        return redirect(route('comandos.enviar'));

    }
}
