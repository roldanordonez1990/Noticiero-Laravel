<html>
<head></head>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    @section('content')
        @csrf
        <center><img src="{{asset('storage/img/titulo.png')}}" style="width: 490px;"></center>

        {{--<center><h4>{{__('Bienvenido')}} {{Auth::user()->name}}</h4></center>--}}
        <h3 class="text-center"><strong>¿Quiénes somos y qué hacemos?</strong></h3>
        <p class="text-justify"><strong>Noticiero</strong> es una web la cual te nutrirá de toda la información sobre diversos temas de
            actualidad. Los usuarios podrán disfrutar gratuitamente de las noticias más destacadas del mes y estar
            informados en todo momento.</p>
        <p class="text-justify">Si quieres formar parte de nosotros, sólo tienes que hacerte administrador pasando por un periodo de
            selección. Una vez superado, podrás trabajar para nosotros añadiendo tus propias noticias.</p>
        <div>
        <center><img src="{{asset('storage/img/news.png')}}" style="width: 1900px"></center>
        </div>
    @endsection

</x-app-layout>
</html>