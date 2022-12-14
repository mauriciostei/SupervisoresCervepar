@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-lista titulo="Lista de Tareas" link="problemas.create" model="Problemas"/>

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
                @forelse($problemas as $item)
                    <tr>
                        <td> {{$item->nombre}} </td>
                        <td>
                            <x-auxiliares.link link="{{route('problemas.show', $item->id)}}" texto="Ver"/>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center text-muted" colspan="100">Sin registros encontrados!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$problemas->links()}}
    </div>
</div>

@endsection