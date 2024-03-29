<x-app-layout>
    <x-slot name="header">
    </x-slot>

    @section('content')
        <div class="row">
            <div class="col-2"></div>
            <div class="col-10">
                <div class="card text-center" style="width:750px">
                    <div class="card-body">
                        <img class="card-img-bottom" src="{{asset($url.$notices->imagen)}}" alt="Card image"
                             style="width:100%">
                        <h4 class="card-title"><strong>{{$notices->titulo}}</strong></h4>
                      {{--@foreach($usu as $u)
                            @if($notices->user_id == $u->id)--}}
                                <p><strong>{{$notices->fecha}} | Por: {{$notices->usuariosNoticia->name}} {{$notices->usuariosNoticia->apellido}}</strong></p>
                            {{--@endif--}}
                       {{--@endforeach--}}
                        <p class="card-text">{{$notices->descripcion}}</p>
                        {{--Con esta línea comprobamos si el usuario está logueado y si su rol es admin para mostrar el contenido--}}
                        @if(Auth::check() && Auth::user()->roles->contains(1))
                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-2">
                                    <a href="{{url('noticia/'.$notices->id.'/edit')}}" class="pl-5"><i
                                                class="far fa-edit pl-5"></i></a>
                                </div>
                                <div class="col-2">
                                    <form action="{{url('noticia/'.$notices->id)}}" method="post" class="form-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="pl-5" name="borrar"><i
                                                    class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
        </div>
    @endsection
</x-app-layout>
