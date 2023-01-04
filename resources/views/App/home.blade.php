@extends('layouts.admin')

@section('contenido')

<div class="d-flex flex-column flex-lg-row justify-content-around">
    <div class="w-100 w-lg-45 h-100 mb-3 mb-lg-0">
        <div class="card w-100 h-100 mb-3">
            <div class="card-body">
                <h4>Estado de Vigilancia</h4>
        
                @if($user->vigilancia_actual)
                    <span class="badge bg-vigilanciaActiva text-dark mb-3">Vigilancia Activa</span>
                    <p class="mb-3">Vigilancia iniciada: {{ $user->vigilancia_actual->inicio }}</p>
                    <a href="{{ route('finalizarVigilancia', $user->vigilancia_actual->id) }}" class="btn btn-myColor shadow">Culminar Vigilancia</a>
                @else
                    <span class="badge bg-vigilanciaInactiva text-dark mb-3">Vigilancia Inactiva</span>
                    <br>
                    <a href="{{ route('iniciarVigilancia') }}" class="btn btn-myColor shadow">Iniciar Vigilancia</a>
                @endif
            </div>
        </div>
        <div class="card w-100 h-100">
            <div class="card-body">
                <h4>Puntos de control Asignados</h4>
    
                @if($user->vigilancia_actual)
                    <ul class="list-group">
                        @forelse($sensores as $item)
                            <li class="list-group-item list-group-item-action d-flex flex-row justify-content-between">
                                <div class="">
                                    {{$item->nombre}}
                                </div>
                                <a href="{{ route('anomalias.create', [$item->id, $user->vigilancia_actual->id]) }}" class="btn btn-nuevaAnomalia shadow">Registrar Anomalía</a>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Felicidades no hay nada por vigilar!</li>
                        @endforelse
                    </ul>
                @endif
    
            </div>
        </div>
    </div>
    <div class="w-100 w-lg-45 h-100">

        <div class="w-100 h-100 d-flex flex-row justify-content-around mb-4">
            <div class="w-33 text-myTextColor">
                <x-graph.desempenio/>
            </div>
            <div class="w-33 text-myTextColor">
                <x-graph.mayores-incidencias/>
            </div>
        </div>

        <div class="card w-100 h-100">
            <div class="card-body">
                <x-layout.anomalias-list/>
            </div>
        </div>

    </div>
</div>

{{-- <div class="d-flex flex-column-reverse flex-lg-row justify-content-between">

<div class="mt-2 mt-lg-0 w-100 w-lg-50 me-0 me-lg-2">
    <div class="card">
        <div class="card-body">
            <h4>Estado de Vigilancia</h4>
    
            @if($user->vigilancia_actual)
                <span class="badge bg-warning text-dark mb-3">Vigilancia Activa</span>
                <p class="mb-3">Vigilancia iniciada: {{ $user->vigilancia_actual->inicio }}</p>
                <a href="{{ route('finalizarVigilancia', $user->vigilancia_actual->id) }}" class="btn btn-myColor shadow">Culminar Vigilancia</a>
            @else
                <span class="badge bg-success mb-3">Vigilancia Inactiva</span>
                <br>
                <a href="{{ route('iniciarVigilancia') }}" class="btn btn-myColor shadow">Iniciar Vigilancia</a>
            @endif
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <h4>Puntos de control Asignados</h4>

            @if($user->vigilancia_actual)
                <ul class="list-group">
                    @forelse($sensores as $item)
                        <li class="list-group-item d-flex flex-row justify-content-between">
                            <div class="">
                                {{$item->nombre}}
                            </div>
                            <a href="{{ route('anomalias.create', [$item->id, $user->vigilancia_actual->id]) }}" class="btn btn-myColor shadow">Registrar Anomalía</a>
                        </li>
                    @empty
                        <li class="list-group-item text-center text-muted">Felicidades no hay nada por vigilar!</li>
                    @endforelse
                </ul>
            @endif

        </div>
    </div>
</div>

<div class="card w-100 w-lg-50 mt-2 mt-lg-0 ms-0 ms-lg-2 h-100">
    <div class="card-body">
        <x-layout.anomalias-list/>
    </div>
</div>

</div> --}}

@endsection