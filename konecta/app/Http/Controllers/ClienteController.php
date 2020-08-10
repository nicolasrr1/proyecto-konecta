<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cliente;
use Hash,Auth,DB;

class ClienteController extends Controller
{
    public function index(){
        $data = Cliente::select('clientes.*')
        ->get();

        return view('clientes')->with('data',$data);
    }


    public function storg(Request $request){
        $Nombre = $request->get('Nombre');
        $email = $request->get('email');
        $documento = $request->get('documento');
        $dirección = $request->get('dirección');

        try {
           
                        if($Nombre == '' || $email == '' || $documento == '' || $dirección == '' ){
                            toastr()->error('Todo los campos son obligatorios ');
                           
                            $data = Cliente::select('clientes.*')->get();

                          
                            return view('clientes')->with('data',$data);
                        }else{

                            Cliente::updateOrCreate(
                                [
                                    'nombre'=>$Nombre,
                                    'correo'=>$email,
                                    'documento'=>$documento,
                                    'dirección' => $dirección,
                                    'user_id'=>  Auth::User()->id, 
                                ]
                        );

                           
                            $data = Cliente::select('clientes.*')->get();

                            toastr()->success('Datos guardados correctamente');
                          
                            return view('clientes')->with('data',$data);
                        }
          } catch (Exception $e) {
                 
                        $data = Cliente::select('clientes.*')
                        ->get();


                  toastr()->error('error',$e);
                
                            return view('clientes')->with('data',$data);
          }

      


    }


    public function update(Request $request ){
        $Nombre = $request->get('Nombre');
        $email = $request->get('email');
        $documento = $request->get('documento');
        $dirección = $request->get('dirección');
        $id = $request->get('id');

        if($Nombre == '' || $email == '' || $documento == '' || $dirección == '' ){
            toastr()->error('Todo los campos son obligatorios ');
           
          $data = Cliente::select('clientes.*')->get();

          
                            return view('clientes')->with('data',$data);
        }else{
            DB::table('clientes')
            ->where('id', $id)
            ->update([  
                'nombre'=>$Nombre,
                'correo'=>$email,
                'documento'=>$documento,
                'dirección' => $dirección,
                'user_id'=>  Auth::User()->id, 
            ]);

            $data = Cliente::select('clientes.*')->get();
            toastr()->success('Datos guardados correctamente ');
    
             return view('clientes')->with('data',$data);
        }

    }

    public function Eliminar($id){
        DB::table('clientes')->where('id', '=', $id)->delete();
        $data = Cliente::select('clientes.*')
        ->get();
        toastr()->success('Data has been saved successfully!');

        return view('clientes')->with('data',$data);
    }

    public function getdata(Request $request){
        $datos = $request->get('data');

        if($datos == null){
          $data=Cliente::all();
          toastr()->success('El dato que usted esta buscado no se encuentra  ');
        }else{
            $data = Cliente::select('clientes.*')
            ->where('nombre',$datos)->get();
        }
         return view('clientes')->with('data',$data);

    }
    
}
