@extends('layouts.uno')
@section('titulo')
Editar Categoría
@endsection
@section('cabecera')
Editar Categoría:{{$category->id}}
@endsection
@section('contenido')
<div class="bg-gray-300 rounded py-4 px-2">
    <form action="{{route('categories.update')}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre categorias</label>
        <input type="text" value="{{$category->nombre}}" name="nombre" id="nombre" class="py-1 px-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="nombre">
        @error('nombre')
        <p class="text-sm text-orange-900 mt-1">*** {{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">descripcion categorias</label>
        <input type="text" value="{{$category->descripcion}}" name="descripcion" id="descripcion" class="py-1 px-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="descripcion" required>
        @error('descripcion')
        <p class="text-sm text-orange-900 mt-1">*** {{$message}}</p>
        @enderror
    </div>
    <div class="mt-2">
        <button type="submit" class="bg-green hover:bg-green-700 text-white font-bold"><i class="fas fa-edit"></i>Editar</button>
        <a href="{{route('categories.index')}}"><i class="fas fa-backward"></i></a>
    </div>
    </form>

</div>

@endsection