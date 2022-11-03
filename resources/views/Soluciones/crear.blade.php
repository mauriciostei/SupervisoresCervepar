@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('soluciones.store')}}">
        @csrf

        <h3>Nueva Solución</h3>

        <x-forms.textarea name="nombre" class="mb-3" label="Enunciado de la solución" value="{{old('nombre')}}"/>

        <h4>Problemas Asociados</h4>

        <ul class="list-group mb-3">
            @forelse($problemas as $index => $item)
                <li class="list-group-item">
                    <x-forms.checkbox name="problemas[]" value="{{$item->id}}" label="{{$item->nombre}}"/>
                </li>
            @empty
                <li class="list-group-item text-center text-muted">Sin Problemas disponibles</li>
            @endforelse
        </ul>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection