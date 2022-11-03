@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('centros.update', $centro->id)}}">
        @method('PUT')
        @csrf

        <h3>Editar Centro</h3>

        <x-forms.input name="nombre" class="mb-3" label="Nombre del Centro" value="{{old('nombre', $centro->nombre)}}"/>
        <x-forms.input name="siglas" class="mb-3" label="Siglas del Centro" value="{{old('siglas', $centro->siglas)}}"/>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection