@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if($message = Session::get('juegocreado'))
      <div class="alert alert-success">
        <h4>{{$message}}</h4>
      </div>
      @endif
      @if($message = Session::get('juegomodificado'))
      <div class="alert alert-success">
        <h4>{{$message}}</h4>
      </div>
      @endif
      @if($message = Session::get('juegoeliminado'))
      <div class="alert alert-success">
        <h4>{{$message}}</h4>
      </div>
      @endif
      
      @if($message = Session::get('bibliotecavacia'))
      <div class="alert alert-info">
        <h4>{{$message}}</h4>
      </div>
      @endif

      @if($message = Session::get('usuarioeditado'))
      <div class="alert alert-info">
        <h4>{{$message}}</h4>
      </div>
      @endif

      @if($message = Session::get('contraseñaactualizada'))
      <div class="alert alert-info">
        <h4>{{$message}}</h4>
      </div>
      @endif


      @if($message = Session::get('coleccionvacia'))
      <div class="alert alert-info">
        <h4>{{$message}}</h4>
      </div>
      @endif
      @if($message = Session::get('agregadoacoleccion'))
      <div class="alert alert-success">
        <h4>{{$message}}</h4>
      </div>
      @endif
      
      





      <h1 id="listavideojuegosh1">Lista videojuegos</h1>
      @if($user!=null)
      @if(auth()->user()->can('permisosAdmin',['App\Models\User',$user]))
      <a class="btn btn-success" href="{{ route('games.create') }}" class="btn btn">Nuevo juego</a>
      @endif
      @endif
  
      @if($user!=null)
      @if(auth()->user()->can('agregarABiblioteca',$user))
      <a class="btn btn-warning" href="{{ route('users.verMiBiblioteca') }}" class="btn btn">Mi biblioteca</a>
      @endif
      
      @endif
      <a class="btn btn-warning" href="{{ route('users.perfil') }}" class="btn btn" >Mi perfil</a>


      <table class="table table-sm table-hover table-bordered" style="display: flex;align-items:center; background-color: white !important;" id="contenedorGames">
        <tr style="background-color: #b3c4dc !important;">
       
        <td><strong>NOMBRE</strong></td>
      
          <td><strong>AÑO DE LANZAMIENTO</strong></td>
          <td><strong>GENEROS</strong></td>
          <td><strong>PLATAFORMAS</strong></td>
        
          <td><strong>IMAGEN</strong></td>
          <td></td>
          <td></td>
        </strong>
        </tr>
        @foreach($gameList as $game)
        <tr>

          <td>{{$game->nombre}}</td>
  
          <td>{{$game->anyoLanzamiento}}</td>
          <td>
            @foreach($game->generos as $gen)
            {{$gen}}
            @endforeach
          </td>
          <td>
            @foreach($game->plataformas as $gen1)
            {{$gen1}}
            @endforeach
          </td>
         
          <td>
            @if($game->imagen==null)
            <img src="imagenes/filenotfound.png" width="200px" height="250px">

            @else
            <img src="{{$game->imagen}}" />

            @endif
          </td>

          <td> <a class="btn btn-warning" href="{{ route('games.show',$game->id) }}" class="btn btn">Ver juego</a></td>
          @if($user!=null)
          @if(auth()->user()->can('agregarABiblioteca',$user))
          <td>
            <form action="{{ route('games.agregarAColeccion',['user'=>$user,'game'=>$game]) }}" method="post">
              @csrf
              <input type="submit" class="btn btn-success" value="+">
            </form>
          </td>

          @if(auth()->user()->can('permisosAdmin',['App\Models\User',$user]))
          <td>
              <a class="btn btn-warning" href="{{route('games.edit',$game->id)}}">Editar</a>     
          </td>

          <td>
          <form action="{{route('games.destroy',$game->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
          </td>
  @endif
          @endif
          @endif
        </tr>
        @endforeach

      </table>


      



    </div>
  </div>
</div>






<?php
$contador = 1;

?>
<div class="col-md-4">
  @if(auth()->user()!=null)
<table class="table table-striped table-dark " style="display: flex;align-items:center" id="contenedorVotaciones" >
        <tr>
          <td>NOMBRE</td>
          <td>DESCRIPCION</td>
          <td>opcion 1</td>
          <td>opcion 2</td>
<td></td>
        </tr>

        @foreach($votacionesList as $votacion)
        <tr>
    



        @if($votacion->participantes==null)
     
          <td>{{$votacion->nombre}}</td>
          <td>{{$votacion->descripcion}}</td>
          <td>{{$votacion->nombreopcion1}}</td>
          <td>{{$votacion->nombreopcion2}}</td>
          <td><button class="btn btn-info votaciones" href="{{route('votaciones.edit',$votacion->id)}}" id="votar{{$votacion->id}}">Votard</button></td>
          
        @endif



        @if($votacion->participantes!=null)
          @if(!in_array($user->id,json_decode($votacion->participantes))){
     
          <td>{{$votacion->nombre}}</td>
          <td>{{$votacion->descripcion}}</td>
          <td>{{$votacion->nombreopcion1}}</td>
          <td>{{$votacion->nombreopcion2}}</td>
          <td><button class="btn btn-info votaciones" href="{{route('votaciones.edit',$votacion->id)}}" id="votar{{$votacion->id}}">Votar s</button></td>
          @endif
        @endif
       
          <!--http://proyecto.local/votaciones/1/edit-->
        </tr>
        {{$contador++}}
        @endforeach


       
      </table>
      @endif
</div>

@endsection






@section('adminnavbar')
@if($user!=null)
@if(auth()->user()->can('permisosAdmin',['App\Models\User',$user]))
<nav class="navbar navbar-light bg-dark fixed-top" id="navbaradmin">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Herramientas de administrador</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Administrador</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('users.index') }}">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('votaciones.index') }}">Votaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>

@endif
@endif
@endsection