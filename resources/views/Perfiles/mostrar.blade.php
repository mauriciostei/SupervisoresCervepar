@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-mostrar titulo="Vista de Perfil" link="perfiles.edit" :model=$perfil/>

<br/>

<div class="card">
    <div class="card-body">

        <table class="table table-hover table-sm">
            <tr>
                <th>Nombre:</th>
                <td> {{$perfil->nombre}} </td>
            </tr>
        </table>

        <h4 class="pt-3">Accesos del perfil</h4>

        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Modulo</th>
                    <th>Ver</th>
                    <th>Crear</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($perfil->permisos as $item)
                    <tr>
                        <td> {{ucfirst($item->nombre)}} </td>
                        <td> @if($item->pivot->ver) <span class="text-success font-weight-bold">✓</span> @endif </td>
                        <td> @if($item->pivot->crear) <span class="text-success font-weight-bold">✓</span> @endif </td>
                        <td> @if($item->pivot->editar) <span class="text-success font-weight-bold">✓</span> @endif </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center text-muted" colspan="100">Sin registros</th>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection