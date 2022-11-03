@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('users.store')}}">
        @csrf

        <h3>Nuevo Usuario</h3>

        <x-forms.select label="Perfil del Usuario" name="perfiles_id" :data=$perfiles class="mb-3"/>

        <x-forms.input name="name" class="mb-3" label="Nombre del Usuario" value="{{old('name')}}"/>

        <x-forms.input type="email" name="email" class="mb-3" label="Correo Electrónico" value="{{old('email')}}"/>

        <x-forms.input type="password" name="password" class="mb-3" label="Contraseña de inicio" value="{{old('password')}}"/>

        <h4>Sectores Asociados</h4>

        <ul class="list-group mb-3">
            @forelse($sectores as $index => $item)
                <li class="list-group-item">
                    <x-forms.checkbox name="sectores[]" value="{{$item->id}}" label="{{$item->nombre}}"/>
                </li>
            @empty
                <li class="list-group-item text-center text-muted">Sin Sectores disponibles</li>
            @endforelse
        </ul>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection