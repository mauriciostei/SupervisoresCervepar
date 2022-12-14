@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-lista titulo="Lista de Observaciones" link="soluciones.create" model="Centros"/>

<br/>

<div class="card">
    <div class="card-body">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Enunciado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($soluciones as $item)
                    <tr>
                        <td> {{$item->nombre}} </td>
                        <td>
                            <x-auxiliares.link link="{{route('soluciones.show', $item->id)}}" texto="Ver"/>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center text-muted" colspan="100">Sin registros encontrados!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$soluciones->links()}}
    </div>
</div>

@endsection