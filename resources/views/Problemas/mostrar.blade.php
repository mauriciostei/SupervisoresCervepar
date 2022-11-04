@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-mostrar titulo="Vista de Tarea" link="problemas.edit" :model=$problema/>

<br/>

<div class="card">
    <div class="card-body">

        <table class="table table-hover table-sm">
            <tr>
                <th>Enunciado:</th>
                <td> {{$problema->nombre}} </td>
            </tr>
        </table>

        <h4>Soluciones Asociadas</h4>

        <ul class="list-group">
            @forelse($problema->soluciones as $item)
                <li class="list-group-item">
                    {{$item->nombre}}
                </li>
            @empty
                <li class="list-group-item text-center text-muted">Sin soluciones Asociadas!</li>
            @endforelse
        </ul>

    </div>
</div>

@endsection