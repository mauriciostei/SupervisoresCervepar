@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('sectores.store')}}">
        @csrf

        <h3>Nuevo Sector</h3>

        <x-forms.select name="perfiles_id" label="Grupo encargado del sector" :data=$perfiles class="mb-3"/>

        <x-forms.select name="centros_id" label="Centro para el sector" :data=$centros class="mb-3"/>

        <x-forms.input name="nombre" class="mb-3" label="Nombre del Sector" value="{{old('nombre')}}"/>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection