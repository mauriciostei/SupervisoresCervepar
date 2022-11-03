@extends('layouts.admin')

@section('contenido')

<div class="d-flex flex-column flex-lg-row justify-content-between">


    <div class="card w-100 w-lg-50 me-0 me-lg-2 h-100">
        <form class="card-body" method="POST" enctype="multipart/form-data" action="{{ route('miPerfil.actualizar', $user->id) }}">
            @csrf
            @method('PUT')

            <h4>Actualizar datos de usuario</h4>

            <x-forms.input name="name" value="{{ old('name', $user->name) }}" label="Nombre de usuario" class="mb-3"/>

            <x-forms.input type="email" name="email" value="{{ old('email', $user->email) }}" label="Correo de usuario" class="mb-3"/>

            <x-forms.input type="file" name="avatar" label="Avatar de Usuario" class="mb-3" />

            <x-forms.submit text="Actualizar"/>
        
        </form>
    </div>

    <div class="card w-100 w-lg-50 ms-0 ms-lg-2 mt-2 mt-lg-0 h-100">
        <form class="card-body" method="POST" action="{{ route('miPerfil.password', $user->id) }}">
            @csrf
            @method('PUT')

            <h4>Actualizar contraseña de usuario</h4>

            <x-forms.input type="password" name="actual" label="Ingrese contraseña de usuario actual" class="mb-3"/>

            <x-forms.input type="password" name="nuevo" label="Ingrese nueva contraseña de usuario" class="mb-3"/>

            <x-forms.input type="password" name="confirmacion" label="Repita nueva contraseña de usuario" class="mb-3"/>

            <x-forms.submit text="Actualizar"/>
        
        </form>
    </div>


</div>

@endsection