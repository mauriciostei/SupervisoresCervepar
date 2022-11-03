@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-mostrar titulo="Vista de Solución" link="soluciones.edit" :model=$solucion/>

<br/>

<div class="card">
    <div class="card-body">

        <div class="d-flex flex-row justify-content-between mb-3">
            <h3>Vista de Solución</h3>
            <a href="{{route('soluciones.edit', $solucion->id)}}">Editar</a>
        </div>

        <table class="table table-hover table-sm">
            <tr>
                <th>Enunciado:</th>
                <td> {{$solucion->nombre}} </td>
            </tr>
        </table>

        <h4>Problemas Asociados</h4>

        <ul class="list-group">
            @forelse($solucion->problemas as $item)
                <li class="list-group-item">
                    {{$item->nombre}}
                </li>
            @empty
                <li class="list-group-item text-center text-muted">Sin problemas Asociados!</li>
            @endforelse
        </ul>

    </div>
</div>

@endsection