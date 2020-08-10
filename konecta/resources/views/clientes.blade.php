@extends('layouts.appuser')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" crossorigin="anonymous">


<div class="container">
  @toastr_css
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                {{-- Este es el formulario encargado registrar los datos  --}}
                <div class=" card-body">

                  <form id="form" action="{{ route('storgCliente')}}" method="POST" role="form">
                    @csrf
                        <div class="form-group">
                          <label for="Nombre">Nombre</label>
                          <input type="text" class="form-control" id="Nombre" name="Nombre" required placeholder="Nombre de usuario">
                        </div>
                       
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="email" required placeholder="Ejemplo : user@gmail.com">
                        </div>

                        <div class="form-group">
                            <label for="documento">documento</label>
                            <input type="text" class="form-control" id="documento" name="documento" required placeholder="Ejemplo : 123123312">
                        </div>

                        <div class="form-group">
                            <label for="dirección">dirección</label>
                            <input type="text" class="form-control" id="dirección" name="dirección" required placeholder="Ejemplo : cr 8 # 21A">
                        </div>

                          <br>
                          <button type="submit" id="myajax" class="btn btn-primary">guardar</button>
                         <br>
                      </form>
                </div>
            </div>
            <br>
            <br>
            
              <form id="form" action="{{ route('getdatagCliente')}}" method="POST" role="form">
                @csrf
                  <input type="text" name="data"  class="form-control col-sm-8" id="exampleFormControlInput1" placeholder="Buscador">
                  <button type="submit" class="btn btn-primary col-sm-4">Buscar</button>
               </form>
              <br>
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">nombre</th>
                      <th scope="col">email</th>
                      <th scope="col">documento</th>
                      <th scope="col">dirección</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $data)
                    <tr>
                      <th scope="row">{{ $data->id }}</th>
                      <td>{{ $data->nombre }}</td>
                      <td>{{ $data->documento }}</td>
                      <td>{{ $data->correo }}</td>
                      <td>{{ $data->dirección }}</td>
                      <td></td>
                      <td></td>
                      <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop{{ $data->id }}">
                          Actualizar 
                        </button>
                
                          </td>
                            <td><a href="{{route('EliminarCliente',$data->id)}}" class="btn btn-danger">Eliminar </a>
                          </td>
                  
                    </tr>
  
                    <div class="modal fade" id="staticBackdrop{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <br>
                            <div class="card ">
        
                              {{-- Este es el formulario encargado registrar los datos  --}}
                     
              
                                <form id="form" action="{{ route('updategCliente')}}" method="POST" role="form">
                                  @csrf
                                     <input type="text" class="col-sm" id="id" value="{{ $data->id }}" hidden  name="id" required placeholder="Nombre de usuario">
  
                                      <div class="form-group">
                                        <label for="Nombre">Nombre</label>
                                        <input type="text" class="col-sm" id="Nombre" value="{{ $data->nombre }}"  name="Nombre" required placeholder="Nombre de usuario">
                                      </div>
                                     
              
                                      <div class="form-group">
                                          <label for="email">email</label>
                                          <input type="text" class="col-sm" id="email" name="email" value="{{ $data->correo }}" required placeholder="Ejemplo : user@gmail.com">
                                      </div>
              
              
                                      <div class="form-group">
                                        <label for="dirección">dirección</label>
                                        <input type="text" class="col-sm" id="dirección" name="dirección" value="{{ $data->dirección }}" required placeholder="Ejemplo : user@gmail.com">
                                    </div>

                                    <div class="form-group">
                                        <label for="documento">documento</label>
                                        <input type="text" class="col-sm" id="documento" name="documento" value="{{ $data->documento }}" required placeholder="Ejemplo : user@gmail.com">
                                    </div>
        
                          </div>
            
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">guardar</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
  
                    @endforeach
                  </tbody>
                </table>
              </div>
         
         
        </div>
    </div>

</div>

@jquery
@toastr_js
@toastr_render




@endsection
