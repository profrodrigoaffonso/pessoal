<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Remedio;
use App\Models\HorarioRemedio;

class RemediosController extends Controller
{
    public function index(){

        $remedios = Remedio::get();
        
        return view('remedios.index', compact('remedios'));

    }

    public function create(){
        
        return view('remedios.create');

    }

    public function store(Request $request){

        $dados = $request->all();

        Remedio::create($dados);

        return redirect(route('remedios.index'));

    }

    public function edit($id){

        $remedio = Remedio::findOrFail($id);
        
        return view('remedios.edit', compact('remedio'));

    }

    public function update(Request $request){

        $dados = $request->all();

        $remedio = Remedio::findOrFail($dados['id']);

        $remedio->update([
            'nome' => $dados['nome']
        ]);
        
        return redirect(route('remedios.index'));

    }

    public function horarios(){

        $horarios = HorarioRemedio::select('horario_remedios.id', 'remedios.nome', 'horario_remedios.data_hora')
                    ->join('remedios', 'remedio_id', '=', 'remedios.id' )
                    ->orderBy('horario_remedios.data_hora', 'DESC')
                    ->get();

        $remedios = Remedio::select('id', 'nome')->get();

        return view('remedios.horarios', compact('horarios','remedios'));
    }

    public function horariosStore(Request $request){

        $dados = $request->all();

        if(isset($dados['remedio_id'])){
            foreach($dados['remedio_id'] as $remedio_id){
                HorarioRemedio::create([
                    'remedio_id' => $remedio_id,
                    'data_hora' => "{$dados['data']} {$dados['hora']}"
                ]);
            }
        }
        

        return redirect(route('remedios.horarios'));

        // HorarioRemedio::create($dados);

        dd($dados);
    }

    public function horariosDelete(Request $request){

        $dados = $request->all();

        $horario = HorarioRemedio::findOrFail($dados['id']);

        $horario->delete();

        return redirect(route('remedios.horarios'));


        dd($dados);
    }
}
