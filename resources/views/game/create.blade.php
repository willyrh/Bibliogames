@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{route('proyects.index')}}" class="btn btn-primary">Index</a>
            <h1 style="background-color: white;border: 2px solid grey; text-align: center" class="bordesredondeados">Crear videojuego</h1>
            

            <hr>
            <!--Errores formulario-->
            @if($errors->any())
            <div class="alert alert-danger">
                <h4>Por favor, corrige los siguientes errores:</h4>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}<br></li>
                    @endforeach
                </ul>
            </div>
            @endif


            <div class="card-body p-5 shadow-5 text-center cardregister">
          
                <br>
                <form action="{{route('games.store')}}" method="post" enctype="multipart/form-data" id="formulariocrearvideojuegos">
                    @csrf
                    <!--Nombre juegos-->

                    <div class="row align-self-center">
                        <div class="col col-md-4 mb-8 ">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">Nombre</label>
                                <input type="text" id="form3Example1" class="form-control  bordesredondeados " name="nombre" />
                            </div>
                        </div>
                    </div>
                    <!--Descripcion juego-->
                    <div class=" mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="form3Example2">Descripcion</label>
                          
                            <textarea class="form-control bordesredondeados" rows="2" name="descripcion"  style="min-height: 150px"></textarea>
                        </div>
                    </div>
                    <!--Año de lanzamiento del juego -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="anyoLanzamiento">Año de lanzamiento</label>
                            <input type="text" id="anyoLanzamiento" class="form-control bordesredondeados" name="anyoLanzamiento" "/>

                        </div>
                        <!--Precio del juego -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="formpassword">Precio</label>
                            <input type="text" id="precio" class="form-control  bordesredondeados" name="precio" />

                        </div>
                    </div>
                    <!--Generos del juego -->
                    <div class="row">
                        <div class="form-outline mb-4 col-md-6">
                            <label for="precio">Generos</label><br>
                            <select class="form-select" name="generos[]" multiple>
                                <option value="accion">accion</option>
                                <option value="aventura">aventura</option>
                                <option value="rpg">rpg</option>
                                <option value="misterio">misterio</option>
                                <option value="peleas">peleas</option>
                                <option value="puzles">puzles</option>
                                <option value="metroivania">metroivania</option>
                                <option value="arcade">arcade</option>
                                <option value="simulacion">simulacion</option>
                                <option value="musica">musica</option>
                                <option value="estrategia">estrategia</option>
                                <option value="historia">historia</option>
                            </select>

                        </div>
                        <!--Plataformas del juego -->
                        <div class="form-outline mb-4 col-md-6">
                            <label for="precio">Plataformas</label><br>
                            <select class="form-select" name="plataformas[]" multiple>
                                <option value="PC">pc</option>
                                <option value="PS1">PS1</option>
                                <option value="PS2">PS2</option>
                                <option value="PS3">PS3</option>
                                <option value="PS4">PS4</option>
                                <option value="PS5">PS5</option>
                                <option value="Xbox">xbox</option>
                                <option value="Xbox360">Xbox360</option>
                                <option value="XboxOne">XboxOne</option>
                                <option value="XboxSeriesX">XboxSeriesX</option>
                                <option value="Nintendo64">Nintendo64</option>
                                <option value="Gameboy">Gameboy</option>
                                <option value="NintendoDS">Nintendo ds</option>
                                <option value="Nintendo3ds">nintendo 3ds</option>
                                <option value="Wii">wii</option>
                                <option value="WiiU">wiiu</option>
                                <option value="NintendoSwitch">nintendo switch</option>
                            </select>




                        </div>
                    </div>
                    <!--Imagen del juego-->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Imagen del videojuego</label>
                        <input class="form-control" type="file" id="imagenjuego" name="imagenjuego">
                    </div>
                    <!--boton crear juego-->
                    <input type="submit" value="Crear" class="btn btn-success">



                </form>
            </div>






        </div>
    </div>
</div>
@endsection