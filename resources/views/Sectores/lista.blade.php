@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-lista titulo="Lista de Sectores" link="sectores.create" model="Sectores"/>

<br/>

<div class="card">
    <div class="card-body">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Centro</th>
                    <th>Grupo Encargado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($sectores as $item)
                    <tr>
                        <td> {{$item->nombre}} </td>
                        <td> {{$item->centros->nombre}} </td>
                        <td> {{$item->perfiles->nombre}} </td>
                        <td>
                            <a href="{{route('sectores.show', $item->id)}}">Ver</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center text-muted" colspan="100">Sin registros encontrados!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$sectores->links()}}
    </div>
</div>

@endsection