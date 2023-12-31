@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <!--Lista de votaciones que podrán ver todos los usuarios logeados, independientemente de que la votacion esté activa/inactiva-->

            <!--Mensajes de alerta-->
            @if($message = Session::get('votacioncreada'))
            <script>
                iziToast.success({
                    title: 'Operación exitosa',
                    message: '{{$message}}',
                });
            </script>
            @endif
            @if($message = Session::get('votacioneliminada'))
            <script>
                iziToast.success({
                    title: 'Operación exitosa',
                    message: '{{$message}}',
                });
            </script>
            @endif


            @if($votacionesList==null || $votacionesList=='[]')

            <div id="contenedorsinresenyas">


                <div class="alert alert-warning" role="alert">
                    <h2>Vaya, parece que actualmente no hay reseñas</h2>
                </div>
                <img src="{{asset('imagenes/resenyasnoencontradas.png')}}" class="img-responsive" width="200px" height="200px" style="margin-left:33%" />
            </div>
            @endif


            @if($votacionesList!=null || $votacionesList!='[]')

            <!--Lista de votaciones-->
            <h1 style="background-color: white;text-align:center; border: 2px solid grey" class="bordesredondeados">Lista de votaciones</h1>




            <table class="table table-striped table-hover" id="tablavotaciones">
                <tr>

                    <td>Titulo</td>

                    <td>Descripcion</td>
                    <td>Nombre opcion 1</td>
                    <td>Nombre opcion 2</td>
                    <td></td>
                    <td></td>
                </tr>
                <!--Recorre las votaciones-->
                @foreach($votacionesList as $votacion)

                <tr>

                    <!--Nombre/titulo de la votacion-->
                    <td>{{$votacion->nombre}}</td>
                    <!--Descripcion de la votacion-->
                    <td style="max-width: 300px;overflow-wrap:break-word !important;">{{$votacion->descripcion}}</td>
                    <!--Nombre de la opcion 1 de la votacion -->
                    <td>{{$votacion->nombreopcion1}}</td>
                    <!--Nombre de la opcion 2 de la votacion -->
                    <td>{{$votacion->nombreopcion2}}</td>

                    <td>

                    </td>
                    <!--Boton para mostrar detalles de la votacion -->
                    <td> <a class="btn btn jello-horizontal" href="{{ route('votaciones.show',$votacion->id) }}" style="background-color: #9AD3E6"><span class="fa fa-eye"></span>&nbsp;</a></td>



                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
</div>
@endsection