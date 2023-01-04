@extends('layouts.base')

@section('content')

<nav class="navbar navbar-expand-lg bg-transparent mb-2 p-0">
    <div class="container-fluid">
        <div>
            <img src="{{asset('img/logo.png')}}" width="120"/>
        </div>
        <div class="d-flex flex-row">
            <button class="d-flex d-lg-none me-3 btn btn-myColor rounded-0 border-0 shadow" data-bs-toggle="offcanvas" data-bs-target="#offCanvasMenu">|</button>

            <button class="btn btn-transparent rounded-0 border-0 shadow-none text-myTextColor" data-bs-toggle="offcanvas" data-bs-target="#offCanvasUsuario">
                <img src="{{ asset(Auth::user()->avatar) }}" width="30" class="rounded-circle me-3" />
                {{Auth::user()->name}}
            </button>
        </div>
    </div>
</nav>

<div class="d-flex flex-row justify-content-between">
    <div class="d-none d-lg-flex w-lg-10 ms-3 mt-3">
        <x-menu.container/>
    </div>
    <div class="w-100 w-lg-90 mx-3 mt-2">
        @yield('contenido')
    </div>
</div>

<x-layout.offcanvas identificador="offCanvasMenu" titulo="Menu de navegación" class="offcanvas-start">
    <x-menu.container/>
</x-layout.offcanvas>

<x-layout.offcanvas identificador="offCanvasUsuario" titulo="Menu de Usuario" class="offcanvas-end">

    <div class="d-flex flex-column flex-lg-row justify-content-between mb-5">
        <a href="{{ route('miPerfil.show', Auth::user()->id) }}" class="btn btn-myColor shadow mb-3 mb-lg-0">Mi Perfil</a>
        @if(Auth::user()->vigilancia_actual)
            <a href="{{ route('finalizarVigilancia', Auth::user()->vigilancia_actual->id) }}" class="btn btn-myColor shadow">Culminar Vigilancia</a>
        @else
            <a href="{{ route('logout') }}" class="btn btn-myColor shadow mt-2 mt-lg-0">Cerrar Sistema</a>
        @endif
    </div>

    <x-layout.anomalias-list/>

</x-layout.offcanvas>

@endsection