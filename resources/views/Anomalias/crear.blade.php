@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{ route('anomalias.store') }}">
        @csrf

        <h3 class="mb-3">Nueva Anomalía</h3>

        <table class="table table-hover table-sm mb-3">
            <tr>
                <td>Vigilante</td>
                <td> {{$vigilancia->users->name}} </td>
            </tr>
            <tr>
                <td>Sensor</td>
                <td> {{$sensor->nombre}}: {{$sensor->codigo}} </td>
            </tr>
        </table>

        <x-forms.input type="hidden" name="sensores_id" value="{{$sensor->id}}"/>
        <x-forms.input type="hidden" name="vigilancias_id" value="{{$vigilancia->id}}"/>

        <x-forms.select label="Problema observado" name="problemas_id" :data=$problemas class="mb-3"/>

        <x-forms.textarea label="Observaciones de la anomalía" name="observaciones" value="{{old('observaciones')}}" class="mb-3"/>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection