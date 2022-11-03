@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-mostrar titulo="Vista de Sensores" link="sensores.edit" :model=$sensor/>

<br/>

<div class="card">
    <div class="card-body">

        {{-- <div class="d-flex flex-row justify-content-between mb-3">
            <h3>Vista de Sensores</h3>
            <a href="{{route('sensores.edit', $sensor->id)}}">Editar</a>
        </div> --}}

        <table class="table table-hover table-sm">
            <tr>
                <th>Nombre:</th>
                <td> {{$sensor->nombre}} </td>
            </tr>
            <tr>
                <th>Código:</th>
                <td> {{$sensor->codigo}} </td>
            </tr>
            <tr>
                <th>Sector del Sensor:</th>
                <td> {{$sensor->sectores->centros->nombre}}: {{$sensor->sectores->nombre}} </td>
            </tr>
        </table>

    </div>
</div>

@endsection