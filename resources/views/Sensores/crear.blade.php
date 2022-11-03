@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('sensores.store')}}">
        @csrf

        <h3>Nuevo Sensor</h3>

        <x-forms.select name="sectores_id" label="Sector del sensor" :data=$sectores class="mb-3"/>

        <x-forms.input name="nombre" class="mb-3" label="Nombre del Sector" value="{{old('nombre')}}"/>

        <x-forms.input name="codigo" class="mb-3" label="Código del Sector" value="{{old('codigo')}}"/>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection