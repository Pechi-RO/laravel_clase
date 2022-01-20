@extends('layouts.uno')
@section('titulo')
Inicio Posts
@endsection
@section('cabecera')
Listado de Posts @if(isset($flag)) Categoria: {{$id}} @endif
@endsection
@section('contenido')


  <div class="mb-4">
  <a href="{{route('posts.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus"></i>Nuevo Post</a>
@if(isset($flag))
<a href="{{route('posts.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver todos</a>
@endif
</div>
<x-tabla1>

          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Info
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Título
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Resumen
                </th>
                
                <th scope="col" colspan="2">
                 Acciones
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                  
                
                @foreach($posts as $item)
                <td class="px-6 py-4">
                  <a href="{{route('posts.show',$item)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                  <i class="fas fa-info"></i></a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                 {{$item->titulo}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$item->resumen}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$item->contenido}}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{route('posts.edit',$item)}}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i></a>
                  
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <form action="{{route('posts.destroy',$item)}}" method="POST" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-trash"></i></button>
                </form>
                </td>
                </tr>
                @endforeach
                
              {{$posts->links()}}
</x-tabla1>
@endsection