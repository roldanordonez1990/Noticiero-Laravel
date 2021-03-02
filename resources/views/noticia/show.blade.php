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
                        <h4 class="card-title">{{$notices->titulo}}</h4>
                        <p>{{$notices->fecha}} | Por: {{$notices->user_id}}</p>
                        <p class="card-text">{{$notices->descripcion}}</p>
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-2">
                                <a href="{{url('noticia/'.$notices->id.'/edit')}}" class="pl-5"><i class="far fa-edit pl-5"></i></a>
                            </div>
                            <div class="col-2">
                                <form action="{{url('noticia/'.$notices->id)}}" method="post" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="pl-5" name="borrar"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
    @endsection
</x-app-layout>
