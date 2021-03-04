@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Página no encontrada'))

@section('image')
    <style>
        #apartado-derecho{
            text-align:center;
        }
        ul{
            text-decoration: none !important;
            list-style: none;
            color: black;
            font-weight: bold;
        }
    </style>
    <div id="apartado-derecho" style="background-color: #F5716C;" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
        <h2>Vuelve a nuestra página</h2>
        <ul>
            <li><a href="noticia">Inicio</a></li>
        </ul>
    </div>
@endsection

@section('message', __('No hemos encontrado la página que buscas'))