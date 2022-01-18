@extends('layouts.uno')
@section('titulo')
Detalle post
@endsection
@section('cabecera')
Detalle Post
@endsection
@section('contenido')

<div class="mx-auto w-3/4 shadow-lg rounded bg-gray-200">
    <div class="px-6 py-4">
<div class="font-bold text-xl mb-2 text-center">{{$post->titulo}}</div>
<p class="text-gray-700">{{$post->resumen}}</p>
<p class="text-gray-500 mt-4">{{$post->contenido}}</p>
<div class="mx-auto mt-2">
    <a href="{{route('posts.index1',$post->category_id)}}" class="py-2 px-2 rounded-full bg-green-400 hover:bg-green-700 font-bold">
    <!--Con la linea siguiente llamamos a la tabla categoria y en ella llamamos al nombre de la categoria-->
    {{$post->category->nombre}}</a>
</div>
<div class="mx-auto mt-2">
    <a href="{{route('posts.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold"><i class="fas fa-backward"></i>Volver</a>

</div>
</div>
</div>
@endsection