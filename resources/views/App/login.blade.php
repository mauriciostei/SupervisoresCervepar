@extends('layouts.base')

@section('content')

<div class="card w-90 w-lg-25 mx-auto mt-5 shadow">
    <form method="POST" action="{{ route('tryLogin') }}" class="card-body d-flex flex-column align-items-center">
        @csrf

        <h3 class="mb-3 font-weight-bold">Bienvenido</h3>

        <img src="{{ asset('img/logo.png') }}" width="200" class="mb-3"/>

        <x-forms.input type="email" name="email" label="Correo Electrónico" value="{{ old('email') }}" class="w-100 mb-3"/>

        <x-forms.input type="password" name="password" label="Contraseña de Usuario" class="w-100 mb-3"/>

        <x-forms.submit text="Ingresar"/>

    </form>
</div>

@endsection