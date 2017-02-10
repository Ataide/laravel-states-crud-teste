<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\User;
use App\Estado;
use App\Role;
use App\Permission;

class EstadosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
   public function index()
   {
     $estados = Estado::paginate(10);
     return view('index', ['estados' => $estados]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
      return view('create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request $request)
   {
       $params = $request->all();

       $estado = new Estado();
       $estado->nome = $params['nome'];
       $estado->sigla = $params['sigla'];
       $estado->historico = $params['historico'];
       $estado->save();

        return Redirect::to('estados');

   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {
     $estado = Estado::find($id);
     return view('show', ['estado' => $estado]);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
     $estado = Estado::find($id);
     $estado->historico = strip_tags($estado->historico);

     return view('edit', ['estado' => $estado]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update($id, Request $request)
   {
     $estado = Estado::find($id);
     $params = $request->all();

     $estado->nome = $params['nome'];
     $estado->sigla = $params['sigla'];
     $estado->historico = $params['historico'];

     $estado->save();

     \Session::flash('flash_message','Atualizado com success');

     return Redirect::to('estados');

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
