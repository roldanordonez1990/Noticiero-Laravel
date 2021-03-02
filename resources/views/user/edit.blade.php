<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
           Edita al usuario
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('user/'.$users->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                @error('name')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <input type="text" class="form-control" value="{{$users->name}}" name="name" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                @error('apellido')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <input type="text" class="form-control" name="apellido" value="{{$users->apellido}}" placeholder="Apellido">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="{{$users->email}}" name="email" placeholder="Email" readonly>
            </div>
            <div class="form-group">
                <label for="pais">País</label>
                @error('pais')
                <spam class="text-danger">{{$message}}</spam>
                @enderror
                <input type="pais" class="form-control" value="{{$users->pais}}" name="pais" placeholder="Pais">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    @endsection
</x-app-layout>