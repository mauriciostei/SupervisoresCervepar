@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('soluciones.update', $solucion->id)}}">
        @method('PUT')
        @csrf

        <h3>Editar Observación</h3>

        <x-forms.textarea name="nombre" class="mb-3" label="Enunciado de la solución" value="{{old('nombre', $solucion->nombre)}}"/>

        <h4>Tareas Asociadas</h4>

        <ul class="list-group mb-3">
            @forelse($problemas as $index => $item)
                <li class="list-group-item">
                    <x-forms.checkbox name="problemas[]" value="{{$item->id}}" label="{{$item->nombre}}" checked="{{in_array($item->id, $solucion->problemas->pluck('id')->toArray())}}"/>
                </li>
            @empty
                <li class="list-group-item text-center text-muted">Sin Problemas disponibles</li>
            @endforelse
        </ul>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection