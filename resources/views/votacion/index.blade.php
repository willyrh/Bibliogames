@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if($message = Session::get('votacioncreada'))
            <div class="alert alert-success">
                <h4>{{$message}}</h4>
            </div>
            @endif
            @if($message = Session::get('votacioneliminada'))
            <div class="alert alert-success">
                <h4>{{$message}}</h4>
            </div>
            @endif


            <h1>Lista votaciones</h1>

            <a class="btn btn-success" href="{{ route('votaciones.create') }}" class="btn btn">Nueva votacion</a>

            <table class="table table-striped table-hover" id="tablavotaciones">
                <tr>
                    <td>id</td>
                    <td>nombre</td>

                    <td>descipcion</td>
                    <td>nombreopcion1</td>
                    <td>nombreopcion2</td>
                    <td>participantes</td>
                </tr>
                @foreach($votacionesList as $votacion)

                <tr>
                    <td>{{$votacion->id}}</td>
                    <td>{{$votacion->nombre}}</td>

                    <td>{{$votacion->descripcion}}</td>
                    <td>{{$votacion->nombreopcion1}}</td>
                    <td>{{$votacion->nombreopcion2}}</td>
                    <td>{{$votacion->participantes}}</td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>
                        <form action="{{route('votaciones.destroy',$votacion->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                    </td>
                    @if($votacion->activo==1)
                    <td>
                        <form action="{{route('votaciones.cerrarvotacion',$votacion->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" value="Cerrar votacion" class="btn btn-transparent"><span class="fa fa-toggle-on fa-2x"></span>&nbsp;</button>
                        </form>
                    </td>
                    @else

                    <td>
                        <form action="{{route('votaciones.activarvotacion',$votacion->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" value="activar votacion" class="btn btn-transparent"><span class="fa fa-toggle-off fa-2x"></span>&nbsp;</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection