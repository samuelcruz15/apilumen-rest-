<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        return Produto::all();
    }

    public function store(Request $request){
        try{
            $produto = new Produto();
            $produto->name = $request->name;
            $produto->description = $request->description;

            if($produto->save()){
                return response()->json(['status'=> 'sucess', 'message' => 'Produto Criado']);
            }
        }catch(\Exception $e){
            return response()->json(['status'=> 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request,$id){
         try{
            $produto = Produto::findOrFail($id);
            $produto->name = $request->name;
            $produto->description = $request->description;

            if($produto->save()){
                return response()->json(['status'=> 'sucess', 'message' => 'Produto Atualizado']);
            }
        }catch(\Exception $e){
            return response()->json(['status'=> 'error', 'message' => $e->getMessage()]);
        }
    }

     public function destroy($id){
         try{
            $produto = Produto::findOrFail($id);

            if($produto->delete()){
                return response()->json(['status'=> 'sucess', 'message' => 'Produto Excluido']);
            }
        }catch(\Exception $e){
            return response()->json(['status'=> 'error', 'message' => $e->getMessage()]);
        }
    }
}
