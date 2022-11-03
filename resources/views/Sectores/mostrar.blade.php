@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-mostrar titulo="Vista de Sector" link="sectores.edit" :model=$sector/>

<br/>

<div class="card">
    <div class="card-body">
        
        <table class="table table-hover table-sm">
            <tr>
                <th>Grupo Encargado:</th>
                <td> {{$sector->perfiles->nombre}} </td>
            </tr>
            <tr>
                <th>Centro de Distribución:</th>
                <td> {{$sector->centros->nombre}} </td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td> {{$sector->nombre}} </td>
            </tr>
        </table>

    </div>
</div>

@endsection