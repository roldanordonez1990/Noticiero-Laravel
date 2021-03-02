<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ciencia y Tecnología
        </h2>
    </x-slot>

    @section('content')
        <table class="table">
            <thead class="bg-dark">
            <tr class="text-white" >
                <th class="text-center">#</th>
                <th class="text-center">Título de la noticia</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($ciencias as $f)
                <tr>
                    <td class="text-center"><a href="{{url('noticia/'.$f->id)}}" class="" >{{$f->id}}</a></td>
                    <td class="text-center"><a href="{{url('noticia/'.$f->id)}}" class="" >{{$f->titulo}}</a> </td>
                    <td><img src="../resources/imagenLogo/atomo.png" width="40px"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endsection
</x-app-layout>
