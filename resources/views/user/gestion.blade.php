<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
           Listado de todos los usuarios registrados
        </h2>
    </x-slot>

    @section('content')
        <table class="table">
            <thead class="bg-dark">
            <tr class="text-white" >
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Apellido</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">País</th>
                <th scope="col" class="text-center">Detalle</th>
                <th scope="col" class="text-center">Editar</th>
                <th scope="col" class="text-center">Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($gestion as $u)
                <tr>
                    <td scope="row" class="text-center">{{$u->id}}</td>
                    <td scope="row" class="text-center">{{$u->name}}</td>
                    <td scope="row" class="text-center">{{$u->apellido}}</td>
                    <td scope="row" class="text-center">{{$u->email}}</td>
                    <td scope="row" class="text-center">{{$u->pais}}</td>
                    <td class="text-center"><a href="{{url('user/'.$u->id)}}" class="" ><i class="far fa-eye"></i></a></td>
                    <td class="text-center"><a href="{{url('user/'.$u->id.'/edit')}}" class="" ><i class="far fa-edit"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="{{url('user/'.$u->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="" name="borrar"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endsection
</x-app-layout>
