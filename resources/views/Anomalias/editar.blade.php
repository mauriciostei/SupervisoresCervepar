@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('anomalias.update', $anomalia->id)}}">
        @method('PUT')
        @csrf

        <h3 class="mb-3">Actualizar Anomalía</h3>

        <table class="table table-hover table-sm mb-3">
            <tr>
                <td>Responsable</td>
                <td> {{$anomalia->users->name}} </td>
            </tr>
            <tr>
                <td>Sensor</td>
                <td> {{$anomalia->sensores->nombre}}: {{$anomalia->sensores->codigo}} </td>
            </tr>
            <tr>
                <td>Problema</td>
                <td> {{$anomalia->problemas->nombre}} </td>
            </tr>
        </table>

        <x-forms.select label="Solución obtenida" name="soluciones_id" :data=$soluciones class="mb-3"/>

        <x-forms.textarea label="Observaciones de la anomalía" name="observaciones" value="{{old('observaciones', $anomalia->observaciones)}}" class="mb-3"/>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection