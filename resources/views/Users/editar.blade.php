@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('users.update', $user->id)}}">
        @method('PUT')
        @csrf

        <h3>Editar Usuario</h3>

        <x-forms.select label="Perfil del Usuario" name="perfiles_id" :data=$perfiles class="mb-3" selected="{{$user->perfiles_id}}"/>

        <x-forms.input name="name" class="mb-3" label="Nombre del Usuario" value="{{old('name', $user->name)}}"/>

        <x-forms.input type="email" name="email" class="mb-3" label="Correo Electrónico" value="{{old('email', $user->email)}}"/>

        <h4>Sectores Asociados</h4>

        <ul class="list-group mb-3">
            @forelse($sectores as $index => $item)
                <li class="list-group-item">
                    <x-forms.checkbox name="sectores[]" value="{{$item->id}}" label="{{$item->nombre}}" checked="{{in_array($item->id, $user->sectores->pluck('id')->toArray())}}"/>
                </li>
            @empty
                <li class="list-group-item text-center text-muted">Sin Sectores disponibles</li>
            @endforelse
        </ul>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection