@extends('layouts.uno')
@section('titulo')
Inicio Posts
@endsection
@section('cabecera')
Listado de Posts
@endsection
@section('contenido')
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
                  
                <td class="px-6 py-4 whitespace-nowrap">
                 Info
                </td>
                @foreach($posts as $item)
                <td class="px-6 py-4 whitespace-nowrap">
                 {{$item->titulo}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$item->resumen}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$item->contenido}}
                  </td>
                @endforeach
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    Borrar<br>
                    Editar
                </td>
              </tr>

              {{$posts->links()}}
</x-tabla1>

@endsection