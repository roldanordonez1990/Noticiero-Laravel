<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
           Detalle del usuario
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('user/'.$users->id)}}" method="" enctype="">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" value="{{$users->name}}" name="name" placeholder="Nombre" readonly>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="{{$users->apellido}}" placeholder="Apellido" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="{{$users->email}}" name="email" placeholder="Email" readonly>
            </div>
            <div class="form-group">
                <label for="pais">País</label>
                <input type="pais" class="form-control" value="{{$users->pais}}" name="pais" placeholder="Pais" readonly>
            </div>
        </form>
    @endsection
</x-app-layout>