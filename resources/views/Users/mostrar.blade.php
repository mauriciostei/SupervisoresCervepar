@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-mostrar titulo="Vista de Usuario" link="users.edit" :model=$user/>

<br/>

<div class="card">
    <div class="card-body">

        <table class="table table-hover table-sm">
            <tr>
                <th>Perfil:</th>
                <td> {{$user->perfiles->nombre}} </td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td> {{$user->name}} </td>
            </tr>
            <tr>
                <th>Correo:</th>
                <td> {{$user->email}} </td>
            </tr>
        </table>

        <h4 class="pt-3">Lista de Sectores Asociados</h4>

        <ul class="list-group">
            @forelse($user->sectores as $item)
                <li class="list-group-item"> {{$item->nombre}} </li>
            @empty
                <li class="list-group-item text-center text-muted">Sin sectores asociados!</li>
            @endforelse
        </ul>

    </div>
</div>

@endsection