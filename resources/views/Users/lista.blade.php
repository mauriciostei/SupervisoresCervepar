@extends('layouts.admin')

@section('contenido')

<x-vistas.cabecera-lista titulo="Lista de Usuarios" link="users.create" model="Users"/>

<br/>

<div class="card">
    <div class="card-body">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $item)
                    <tr>
                        <td> {{$item->name}} </td>
                        <td> {{$item->email}} </td>
                        <td>
                            <x-auxiliares.link link="{{route('users.show', $item->id)}}" texto="Ver"/>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center text-muted" colspan="100">Sin registros encontrados!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>

@endsection