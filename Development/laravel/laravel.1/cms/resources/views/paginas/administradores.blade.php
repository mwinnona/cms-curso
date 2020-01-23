@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Administradores</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Administradores</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <!-- Default box -->
          <div class="card">

            <div class="card-header">
              <button class = "btn btn-primary btn-sm" data-toggle = "modal" data-target = "#crearAdministrador">Crear nuevo administradores</button>
            </div>

            <div class="card-body">
              <table class = "table table-bordered table-striped" width ="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th width= "50px">Foto</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($administradores as $key => $value)
                    <tr>
                      <td>{{ ($key+1) }}</td>
                      <td>{{ ($value["name"]) }}</td>
                      <td>{{ ($value["email"]) }}</td>
                    @php
                      if($value["foto"]== "" ){
                        echo '<td><img src="'.url('/').'/img/administradores/admin.png" class = "img-fluid rounded-cirle"></td>';
                      }else { 
                        echo '<td><img src="'.url('/').'/'.$value['foto'].'" class = "img-fluid rounded-cirle"></td>';
                      }
                      if($value["rol"]== "" ){
                        echo '<td>Administrador</td>';
                      }else { 
                        echo '<td>'.$value["rol"].'</td>';
                      }
                        

                      
                    @endphp
                     
                      <td>
                        <a href="{{url('/')}}/administradores/{{$value['id']}}" class="btn btn-warning btn-sm">
                          <i class="fas fa-pencil-alt text-white"></i>
                        </a>
                        <button class="btn btn-danger btn-sm 2 " action="{{url('/')}}/administradores/{{$value["id"]}}" method="DELETE" pagina="administradores">
                            @csrf 
                            <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>


                    </tr>

                    
                  @endforeach
                </tbody>
              </table>

                

            </div>

            <!-- /.card-body -->
            <div class="card-footer">

              Footer

            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->
  <!-- /.CREAR USUARIO-->
</div>
<div class="modal" id="crearAdministrador">
 
  <div class="modal-dialog">
   
    <div class="modal-content">

      <form method="POST" action="{{ route('register') }}">
        @csrf
      
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Crear Administrador</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

            {{-- Nombre --}}

            <div class="input-group mb-3">
              
              <div class="input-group-append input-group-text">               
                <i class = "fas fa-user"></i>
              </div>

              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">

              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>

            {{-- Email --}}

            <div class="input-group mb-3">
              
              <div class="input-group-append input-group-text">               
                <i class = "fas fa-envelope"></i>
              </div>

              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>

            {{-- Password --}}

            <div class="input-group mb-3">
              
              <div class="input-group-append input-group-text">               
                <i class = "fas fa-key"></i>
              </div>

              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña mínimo de 8 caracteres">

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>

            {{-- Confirmar Password --}}

            <div class="input-group mb-3">
              
              <div class="input-group-append input-group-text">               
                <i class = "fas fa-key"></i>
              </div>

              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">

            </div>

        </div>

        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </div>

      </form>

    </div> 

  </div> 

</div>

<!-- /.EDITAR USUARIO -->

@if (isset($status))
  @if($status== 200)
    @foreach ($administradores as $key => $value)
      <div class = "modal" id="editarAdministrador">
     
        <div class="modal-dialog">
          <div class = "modal-content">
            <form method="POST" action="{{ url('/') }}/administradores/{{$value['id']}}" enctype = "multipart/form-data">
                  @method('PUT')
                  @csrf
              <div class = "modal-header bg-info">
                <h4 class = "modal-tile"> Editar Administrador</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class = "modal-body">
                <div class = "input-group mb-3">
                  <div class = "input-group-append input-group-text">
                    <i class = "fas fa-user"></i>
                  </div>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $value['name'] }}" required autocomplete="name" autofocus placeholder = "Ingrese el nombre">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>


                <div class = "input-group mb-3">
                  <div class = "input-group-append input-group-text">
                    <i class = "fas fa-envelope"></i>
                  </div>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $value['email'] }}" required autocomplete="email" placeholder = "Ingrese el email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class = "input-group mb-3">
                  <div class = "input-group-append input-group-text">
                    <i class = "fas fa-key"></i>
                  </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder = "Contraseña mínima de 8 caracteres">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <input type = "hidden" name= "password_actual" value = "{{$value['password']}}">

                <div class = "input-group mb-3">
                  <div class = "input-group-append input-group-text">
                    <i class = "fas fa-list-ul"></i>
                  </div>
                  <select class  =" form-control" name = "rol" required>
                  @if($value['rol'] == "administrador" || $value['rol'] =="" ) 
                      <option value = "administrador"> administrador</option>
                      <option value = "editor"> editor</option>
                  @else
                      <option value = "editor"> editor</option>
                      <option value = "administrador"> administrador </option>
                  @endif
                  </select>

                </div>

                <hr class = "pb-2">
                      <div class = "form-group my-2 text-center" >
                        <div class  ="btn btn-default btn-file">
                          <i class = "fas fa-paperclip"></i> Adjuntar foto
                          <input type = "file" name = "foto">
                        </div>
                        <br>
                        @if($value['foto']=="")
                        <img src="{{url('/')}}/img/administradores/admin.png" class = "previsualizarImg img-fluid py-2 w-25 rounded-circle">
                        @else
                          <img src="{{url('/')}}/{{$value['foto']}}" class = "previsualizarImg_foto img-fluid py-2 w-25 rounded-circle">
                        @endif
                        <input type = "hidden" value="{{$value['foto']}}" name = "imagen_actual">
                        <p class = "help-block small"> Dimensiones: 200px * 200px | Peso Max. 2MB | Formato; JPG o PNG </p>
                      </div>



                
                  
                  
                </div>
              
                <div class = "modal-footer d-flex justify-content-between">
                  <div>
                    <button type="button" class ="btn btn-danger" data-dismiss="modal">Cerrar </button>
                  </div>
                  <div>
                    <button type="submit" class ="btn btn-primary" >Guardar </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
            
          
          
        </div>
      </div>
    @endforeach
    <script>
    $("#editarAdministrador").modal();
    </script>
    

    @else
    {{($status)}}
  
    
  @endif
 
@endif
@if (Session::has("no-validacion"))

    <script>
        notie.alert({ type: 2, text: '¡Hay campos no válidos en el formulario!', time: 10 })
    </script>

    @endif

    @if (Session::has("error"))

      <script>
          notie.alert({ type: 3, text: '¡Error en el gestor de administradores!', time: 10 })
    </script>

    @endif

    @if (Session::has("ok-editar"))

      <script>
          notie.alert({ type: 1, text: '¡El administrador ha sido actualizado correctamente!', time: 10 })
    </script>

    @endif

    @if (Session::has("ok-eliminar"))

    <script>
          notie.alert ({ type: 1, text: '¡El administrador ha sido eliminado correctamente!', time: 10 })
    </script>

    @endif




    <script>


$( ".eliminarRegistro" ).click(function() {
console.log('holis');
      var action = $(this).attr("action"); 
        var method = $(this).attr("method");
        var pagina = $(this).attr("pagina");
        // var token = $(this).children("[name='_token']").attr("value");
        var token = $(this).attr("token");


        swal({
          title: '¿Está seguro de eliminar este registro?',
          text: "¡Si no lo está puede cancelar la acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, eliminar registro!'
        }).then(function(result){

          if(result.value){
        console.log("Se elimino con exito")
        }
      })
});


    </script>
    @if (Session::has("no-borrar"))

      <script>
          notie.alert({ type: 2, text: '¡Este administrador no se puede borrar!', time: 10 })
    </script>

    @endif
@endsection