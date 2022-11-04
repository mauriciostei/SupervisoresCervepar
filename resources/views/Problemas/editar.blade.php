@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('problemas.update', $problema->id)}}">
        @method('PUT')
        @csrf

        <h3>Editar Tarea</h3>

        <x-forms.textarea name="nombre" class="mb-3" label="Enunciado del problema" value="{{old('nombre', $problema->nombre)}}"/>

        <h4>Observaciones Asociadas</h4>

        <ul class="list-group mb-3">
            @forelse($soluciones as $index => $item)
                <li class="list-group-item">
                    <x-forms.checkbox name="soluciones[]" value="{{$item->id}}" label="{{$item->nombre}}" checked="{{in_array($item->id, $problema->soluciones->pluck('id')->toArray())}}"/>
                </li>
            @empty
                <li class="list-group-item text-center text-muted">Sin Soluciones disponibles</li>
            @endforelse
        </ul>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection