@extends('layouts.uno')
@section('titulo')
Crear Post
@endsection
@section('cabecera')
Nueva Post
@endsection
@section('contenido')
@if(session('mensaje'))
<x-alerta1>{{session('mensaje')}}</x-alerta1>
@endif
<div class="bg-gray-300 rounded py-4 px-2">
    <form action="{{route('posts.store')}}" method="POST">
    @csrf
    <div>
        <label for="tit" class="block text-sm font-medium text-gray-700 mb-2">titulo post</label>
        <input type="text" name="titulo" id="tit" class="py-1 px-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="titulo">
        @error('titulo')
        <p class="text-sm text-orange-900 mt-1">*** {{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="res" class="block text-sm font-medium text-gray-700 mb-2">resumen post</label>
        <input type="text" name="resumen" id="res" class="py-1 px-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="resumen" required>
        @error('resumen')
        <p class="text-sm text-orange-900 mt-1">*** {{$message}}</p>
        @enderror
    </div>
    <div class="mt-2">
        <label for="cont" class="block text-sm font-medium text-gray-700 mb-2" >Contenido Post</label>
<textarea name="contenido" id="cont" class="py-1 px-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
    @error('resumen')
        <p class="text-sm text-orange-900 mt-1">*** {{$message}}</p>
        @enderror    
</div>
    <div class="mt-2">
<label for="cat" class="block text-sm font-medium text-gray-700 mb-2">Categoria Post</label>
<select name="category_id" class="py-1 px-2 focus:ring-indigo-500 focus:border-indigo-500">
    @foreach($categorias as $item)
    <option value="{{$item->id}}">{{$item->nombre}}</option>
    @endforeach
</select>
    </div>
    <div class="mt-2">
        <button type="submit" class="bg-green hover:bg-green-700 text-white font-bold"><i class="fas fa-save"></i></button>
        <a href="{{route('posts.index')}}"><i class="fas fa-backward"></i></a>
    </div>
    </form>

</div>

@endsection