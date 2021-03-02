<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Edita tu noticia
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('noticia/'.$notices->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="fecha">Fecha</label>
                @error('fecha')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <input type="date" class="form-control" value="{{$notices->fecha}}" name="fecha" placeholder="Fecha">
            </div>
            <div class="form-group">
                <label for="titulo">Título</label>
                @error('titulo')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <input type="text" class="form-control" name="titulo" value="{{$notices->titulo}}"
                       placeholder="Título de la noticia">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" class="form-control">
                    @if($notices->categoria == 1)
                        <option value="1" selected>Deportes</option>
                        <option value="2">Actualidad</option>
                        <option value="3">Ciencia</option>
                    @endif
                    @if($notices->categoria == 2)
                        <option value="2" selected>Actualidad</option>
                        <option value="1">Deportes</option>
                        <option value="3">Ciencia</option>

                    @endif
                    @if($notices->categoria == 3)
                        <option value="3" selected>Ciencia</option>
                        <option value="1">Deportes</option>
                        <option value="2">Actualidad</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                @error('descripcion')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <label for="descripcion">Noticia</label>
                <textarea type="text" class="form-control" value="{{$notices->descripcion}}" name="descripcion"
                          placeholder="Escribe tu noticia">{{$notices->descripcion}}</textarea>
            </div>
            <div class="form-group">
                <label for="foto">Imagen de la noticia</label>
                <img class="rounded float-left" width="10%" src="{{asset($url.$notices->imagen)}}">
                <input type="file" class="form-control" name="imagen" value="" placeholder="Imagen de la noticia">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    @endsection
</x-app-layout>