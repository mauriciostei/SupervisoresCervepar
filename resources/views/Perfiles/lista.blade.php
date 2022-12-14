@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-lista titulo="Lista de Perfiles" link="perfiles.create" model="Perfiles"/>

<br/>

<div class="card">
    <div class="card-body">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($perfiles as $item)
                    <tr>
                        <td> {{$item->nombre}} </td>
                        <td>
                            <x-auxiliares.link link="{{route('perfiles.show', $item->id)}}" texto="Ver"/>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center text-muted" colspan="100">Sin registros encontrados!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$perfiles->links()}}
    </div>
</div>

@endsection