@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('sensores.update', $sensor->id)}}">
        @method('PUT')
        @csrf

        <h3>Editar Sensores</h3>


        <x-forms.select name="sectores_id" label="Sector del sensor" :data=$sectores class="mb-3" selected="{{$sensor->sectores_id}}"/>

        <x-forms.input name="nombre" class="mb-3" label="Nombre del Sector" value="{{old('nombre', $sensor->nombre)}}"/>

        <x-forms.input name="codigo" class="mb-3" label="Código del Sector" value="{{old('codigo', $sensor->codigo)}}"/>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection