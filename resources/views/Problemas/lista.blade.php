@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-lista titulo="Lista de Problemas" link="problemas.create" model="Problemas"/>

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
                            <a href="{{route('problemas.show', $item->id)}}">Ver</a>
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