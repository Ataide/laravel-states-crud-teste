<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\User;
use App\Estado;
use App\Role;
use App\Permission;
use Auth;

class AjaxEstadosController extends Controller
{

   public function store(Request $request)
   {
       $params = $request->all();
       $permissions = [];
       $permissions['create'] = Auth::user()->can('create');
       $permissions['read']   = Auth::user()->can('read');
       $permissions['update'] = Auth::user()->can('update');
       $permissions['delete'] = Auth::user()->can('delete');

       $estado = new Estado();
       $estado->nome = $params['nome'];
       $estado->sigla = $params['sigla'];
       $estado->historico = $params['historico'];
       $estado->save();

        return Response::json(['status' => 'success', 'message' => 'Registro criado com sucesso', 'estado' => $estado, 'perma' =>$permissions]);

   }

   public function update(Request $request)
   {
     $params = $request->all();
     $id = $params['id'];

     $estado = Estado::find($id);
     $estado->nome = $params['nome'];
     $estado->sigla = $params['sigla'];
     $estado->historico = $params['historico'];
     $estado->save();

     return Response::json(['status' => 'success', 'message' => 'Atualizado com success' ]);

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
     $estado = Estado::find($id);
     $estado->delete();
     return Response::json(['msg' => 'Deletado com sucesso'], 200);

   }


}
