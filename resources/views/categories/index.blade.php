@extends('layouts.uno')
@section('titulo')
Inicio Categoría
@endsection
@section('cabecera')
Listado de Categorías
@endsection
@section('contenido')
@if(session('mensaje'))
<x-alerta1>{{session('mensaje')}}</x-alerta1>
@endif
<x-tabla1>
    <div class="mb-4">
    <a href="{{route('categories.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus"></i>Nueva categoria</a>
</div>
    <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Descripcion
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  
                </th>
                <th scope="col" colspan="2">
                  
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                  @foreach($categories as $item)
                  <td class="px-6 py-4">
                    <a href="{{route('posts.index1',$item->id)}}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">{{$item->id}}</a>
                  </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $item->id }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{$item->nombre}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{$item->descripcion}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="{{route('categories.edit',$item)}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i></a>
                </td> 
                <td class="px-6 py-4">
                    <form action="{{route('categories.destroy',$item)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach

</x-tabla1>
@endsection