<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\rol;
use Hash,Auth,DB;
class userController extends Controller
{
    public function index(){

        $rol=rol::all();
        $data = User::select('users.*','rol.nombre')
        ->join('rol', 'users.rol_id', '=','rol.id' )
        ->get();

        

        return view('admin')->with('rol',$rol)->with('data',$data);
    }


    public function storg(Request $request){
        $Nombre = $request->get('Nombre');
        $email = $request->get('email');
        $Rol = $request->get('Rol');
        $Contraseña = $request->get('password');


        try {
           
                        if($Nombre == '' || $email == '' || $Rol == '' || $Contraseña == '' ){
                            toastr()->error('Todo los campos son obligatorios ');
                            $rol=rol::all();
                            $data = User::select('users.*','rol.nombre')
                            ->join('rol', 'users.rol_id', '=','rol.id' );
                            return view('admin')->with('rol',$rol)->with('data',$data);
                        }else{

                            User::updateOrCreate(
                                [
                                    'name'=>$Nombre,
                                    'email'=>$email,
                                    'rol_id'=>$Rol,
                                    'password'=>Hash::make($Contraseña),
                                    'admin'=>  Auth::user()->id, 
                                ]
                        );

                            $rol=rol::all();
                            $data = User::select('users.*','rol.nombre')
                            ->join('rol', 'users.rol_id', '=','rol.id' )
                            ->get();
                            toastr()->success('Datos guardados correctamente');
                         return view('admin')->with('rol',$rol)->with('data',$data);
                        }
          } catch (Exception $e) {
                  $rol=rol::all();
                    $data = User::select('users.*','rol.nombre')
                    ->join('rol', 'users.rol_id', '=','rol.id' )
                    ->get();

                  toastr()->error('error',$e);
                  return view('admin')->with('rol',$rol)->with('data',$data);
          }

      


    }


    public function update(Request $request ){
        $Nombre = $request->get('Nombre');
        $email = $request->get('email');
        $Rol = $request->get('Rol');
        $Contraseña = $request->get('password');
        $id = $request->get('id');

        if($Nombre == '' || $email == '' || $Rol == '' || $Contraseña == '' ){
            toastr()->error('Todo los campos son obligatorios ');
            $rol=rol::all();
            $data = User::select('users.*','rol.nombre')
            ->join('rol', 'users.rol_id', '=','rol.id' );
            return view('admin')->with('rol',$rol)->with('data',$data);
        }else{
            DB::table('users')
            ->where('id', $id)
            ->update([  
                'name'=>$Nombre,
                'email'=>$email,
                'rol_id'=>$Rol,
                'password'=>Hash::make($Contraseña),
                'admin'=>  Auth::user()->id, 

            ]);

            $rol=rol::all();
            $data = User::select('users.*','rol.nombre')
            ->join('rol', 'users.rol_id', '=','rol.id' )
            ->get();
            toastr()->success('Datos guardados correctamente');
            return view('admin')->with('rol',$rol)->with('data',$data);
        }

    }


    public function Eliminar($id){
        DB::table('users')->where('id', '=', $id)->delete();
    }

    public function getdata(Request $request){
        $datos = $request->get('data');

        if($datos == null){
          $data=User::all();
          toastr()->error('El dato no existe ');
        }else{
            $data = User::select('users.*','rol.nombre')
            ->join('rol', 'users.rol_id', '=','rol.id' )
            ->where('users.name', "LIKE" , $datos  )
            ->get(); 
          
        }

        return view('admin')->with('rol',$rol)->with('data',$data);

    }

}
