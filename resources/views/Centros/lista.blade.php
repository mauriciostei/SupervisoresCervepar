@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-lista titulo="Lista de Centros" link="centros.create" model="Centros"/>

<br/>

<div class="card">
    <div class="card-body">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Siglas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($centros as $item)
                    <tr>
                        <td> {{$item->nombre}} </td>
                        <td> {{$item->siglas}} </td>
                        <td>
                            <x-auxiliares.link link="{{route('centros.show', $item->id)}}" texto="Ver"/>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center text-muted" colspan="100">Sin registros encontrados!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$centros->links()}}
    </div>
</div>

@endsection