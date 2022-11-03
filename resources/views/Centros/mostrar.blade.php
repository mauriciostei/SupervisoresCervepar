@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-mostrar titulo="Vista de Centro" link="centros.edit" :model=$centro/>

<br/>

<div class="card">
    <div class="card-body">

        <table class="table table-hover table-sm">
            <tr>
                <th>Nombre:</th>
                <td> {{$centro->nombre}} </td>
            </tr>
            <tr>
                <th>Siglas:</th>
                <td> {{$centro->siglas}} </td>
            </tr>
        </table>

    </div>
</div>

@endsection