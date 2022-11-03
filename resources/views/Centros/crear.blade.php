@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('centros.store')}}">
        @csrf

        <h3>Nuevo Centro</h3>

        <x-forms.input name="nombre" class="mb-3" label="Nombre del Centro" value="{{old('nombre')}}"/>
        <x-forms.input name="siglas" class="mb-3" label="Siglas del Centro" value="{{old('siglas')}}"/>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection