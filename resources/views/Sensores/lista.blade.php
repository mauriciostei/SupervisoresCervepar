@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-lista titulo="Lista de Sensores" link="sensores.create" model="Sensores"/>

<br/>

<div class="card">
    <div class="card-body">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Sector</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($sensores as $item)
                    <tr>
                        <td> {{$item->nombre}} </td>
                        <td> {{$item->sectores->nombre}} </td>
                        <td>
                            <x-auxiliares.link link="{{route('sensores.show', $item->id)}}" texto="Ver"/>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center text-muted" colspan="100">Sin registros encontrados!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$sensores->links()}}
    </div>
</div>

@endsection