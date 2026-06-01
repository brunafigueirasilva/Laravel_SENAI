<?php
// estou no ProdutiController.php
namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function listar(Request $request){
         try {
            $query = Setores::query();

            if ($request->filled('nome')){
                $query->where('nome', 'like', '%'.$request->nome.'%');        
            }

            if ($request->filled('num_setor')){
                $query->where('num_setor', $request->num_setor);        
            }

            $setores = $query->get();
            return view ('listarSetores', compact ('setores'));

            } catch (\Exception $e) {
            return view('listarSetores', [
                'setores' => collect(),
                'erro' => 'Erro interno no servidor'
        ]);

    }
}

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'num_setor' => 'required|numeric|max:255',
            // para poder ser nulo ou existir na tabela setores
        ]);

        Setores::create([
            'nome' => $request->nome,
            'num_setor' => $request->num_setor
        ]);

        return redirect()->back()->with('success','Setor Cadastrado com sucesso!');

    }

}