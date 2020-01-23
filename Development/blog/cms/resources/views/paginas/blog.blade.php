
@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 622px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("/") }}">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
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
                <button class = "btn btn-primary float-right">Guardar cambios</button>
              </div>
              <div class="card-body">
                @foreach($blog as $element)
                @endforeach
                <div class ="row">
                  <div class= "col-lg-7">
                    <div class = "card">
                        <div class = "card-body">

                          <div class = "input-group mb-3">
                            <div class= "input-group-append">
                              <span class = "input-group-text"> Dominio </span>
                            </div>
                            <input type="text" class ="form-control" name ="dominio" value = "{{ $element->dominio }}" required>
                          </div>
                       
                          <div class = "input-group mb-3">
                            <div class= "input-group-append">
                              <span class = "input-group-text"> Servidor </span>
                            </div>
                            <input type="text" class ="form-control" name ="servidor" value = "{{ $element->servidor }}" required>
                          </div>

                          <div class = "input-group mb-3">
                            <div class= "input-group-append">
                              <span class = "input-group-text"> Titulo </span>
                            </div>
                            <input type="text" class ="form-control" name ="titulo" value = "{{ $element->titulo }}" required>
                          </div>

                          <div class = "input-group mb-3">
                            <div class= "input-group-append">
                              <span class = "input-group-text"> Descripcion </span>
                            </div>
                            <textarea  class ="form-control" rows = "5" name ="descripcion" required>
                              {{ $element->descripcion }}
                            </textarea>
                          </div>
                        
                          <hr class = "ph-2">
                          <div class = "form-group mb-3">
                            <label> Palabras Claves</label>
                            @php
                              $tags  =json_decode($element->palabras_claves,true);
                              $palabras_claves = "";
                              foreach ($tags as $key => $value){
                                  $palabras_claves .= $value.",";

                              }
                            @endphp
                            <input type= "text" class="form-control" name= "palabras claves" value ="{{$palabras_claves}}" required>
                          </div>
                          
                          <hr class = "ph-2">
                          <label> Redes Sociales</label>
                          <div class ="row">
                            <div class= "col-5">
                              <div class = "input-group mb-3">
                                <div class= "input-group-append">
                                  <span class = "input-group-text"> Icono </span>
                                </div>
                                <select class = "form-control" id="icono_red">
                                  <option value "fab fa-facebook-f, #1475E0">
                                    facebook
                                  </option>
                                  <option value "fab fa-instagram, #1475E0">
                                    instagram
                                  </option>
                                  <option value "fab fa-twitter, #00A6FF">
                                    twitter
                                  </option>
                                  <option value "fab fa-youtube, #F95F62">
                                    youtube
                                  </option>
                                  <option value "fab fa-snapchat-ghost, #FF9052">
                                    snapchat
                                  </option>
                                  <option value "fab fa-linkekdin-in, #0E76A8">
                                    linkedin
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class= "col-5"> 
                              <div class = "input-group mb-3">
                                <div class= "input-group-append">
                                  <span class = "input-group-text"> Url </span>
                                </div>
                                <input type="text" class ="form-control" id ="url_red">
                              </div>
                              
                            <div>
                            
                          </div>
                          
                          <div class = "col-7">
                              <button type = "button" class = "btn btn-primary w-100 agregarRed"> Agregar </button>
                          </div>
                        </div>
                        
                        <div class ="row">
                          @php
                            $redes  =json_decode($element->redes_sociales,true);
                            
                            foreach ($redes as $key => $value){
                              echo  '<div class ="col-lg-12">
                                <div class = "input-group mb-3">
                                  <div class = "input-group-append">
                                    <div class = "input-group-text text-white" style = "background:'.$value["background"].'">
                                      <i class="'.$value["icono"].'"></i>
                                    </div>
                                  </div>
                                  <input type="text" class = "form-control" value="'.$value["url"].'" >
                                  <div class = "input-group-append">
                                    <div class = "input-group-text" style = "cursor:pointer">
                                      <span class = "bg-danger px-2 rounded-circle"> &times; </span>
                                    </div>
                                  </div>
                                </div>
                              </div>';

                            }
                          @endphp
                          
                        </div>
                      </div>  
                    </div>
                  <div class= "col-lg-5">
                    <div class = "card">
                      <div class = "card-body">
                        <div class = "row">
                          <div class= "col-lg-6">
                            <div class= "form-group my-2 text-center">
                              <div class= "btn btn-default btn-file mb-3">
                                <i class= "fas fa-paperclip"></i>Adjuntar Image de logo
                                <input type= "file" name = "logo">

                              </div>
                            
                            </div>
                          
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                

                
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button class = "btn btn-primary float-right">Guardar cambios</button>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  @endsection