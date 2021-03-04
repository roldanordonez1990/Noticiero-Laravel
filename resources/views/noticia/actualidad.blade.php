<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Actualidad y Sociedad
        </h2>
    </x-slot>

    @section('content')
        <table class="table">
            <thead class="bg-dark">
            <tr class="text-white">

                <th class="text-center">Título de la noticia</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($actualidades as $f)
                <tr>
                    <td class="text-center"><a href="{{url('noticia/'.$f->id)}}" class="">{{$f->titulo}}</a></td>
                    <td><img src="../resources/imagenLogo/mundo.png" width="35px"></td>

                </tr>
            @endforeach
            @if($actualidades == "[]")
                <td class="text-danger text-center">No existen noticias actualmente</td>
            @endif
            </tbody>
        </table>
    @endsection
</x-app-layout>
