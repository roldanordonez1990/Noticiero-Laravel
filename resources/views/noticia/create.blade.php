<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        Añade una nueva noticia
        </h2>
    </x-slot>

    @section('content')
        <form action="{{route("noticia.store")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="fecha">Fecha</label>
                @error('fecha')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <input type="date" class="form-control" name="fecha" placeholder="Fecha">
            </div>
            <div class="form-group">
                <label for="titulo">Título</label>
                @error('titulo')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <input type="text" class="form-control" name="titulo" placeholder="Título de la noticia">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                @error('categoria')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <select name="categoria" class="form-control">
                    <option value="1">Deportes</option>
                    <option value="2">Actualidad</option>
                    <option value="3">Ciencia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Noticia</label>
                @error('descripcion')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <textarea type="text" class="form-control" name="descripcion" placeholder="Escribe tu noticia"></textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen de la noticia</label>
                @error('imagen')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <input type="file" class="form-control" name="imagen" placeholder="Sube tu imagen">
            </div>
            <button type="submit" class="btn btn-primary">Subir noticia</button>
        </form>
    @endsection
</x-app-layout>