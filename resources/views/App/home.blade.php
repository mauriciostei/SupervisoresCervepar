@extends('layouts.admin')

@section('contenido')

<div class="d-flex flex-column-reverse flex-lg-row justify-content-between">

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
        {{-- <x-layout.anomalias-list/> --}}

        <h4>Alertas Activas</h4>

        <ul class="list-group list-group-flush">
            @forelse($alertas as $item)
                <li class="list-group-item list-group-item-action">
                    <div class="d-flex flex-row justify-content-between mb-3">
                        <div>Sensor: {{$item->sensores->nombre}}</div>
                        <small class="text-muted"> {{$item->created_at}} </small>
                    </div>
                    <div>Problema: {{$item->problemas->nombre}}</div>
                    <div>Observaciones {{$item->observaciones}}</div>
                    @if($item->users_id)
                        <div>Agente: {{$item->users->name}}</div>
                    @endif

                    <div class="mt-2 d-flex flex-row justify-content-between">
                        <div>
                            @if($item->users_id)
                                @if($item->users_id == Auth::user()->id)
                                    <a href="{{ route('anomalias.edit', $item->id) }}" class="mt-3">Actualizar Anomalía</a>
                                @endif
                            @else
                                <a href="{{ route('anomalias.iniciar', $item->id) }}" class="mt-3">Iniciar Trabajos</a>
                            @endif
                        </div>
                    
                       <div>
                            @if($item->prioridad == 'Baja')
                            <div class="badge bg-success bg-gradient p-2 shadow"> {{$item->prioridad}} </div>
                            @endif
                            @if($item->prioridad == 'Media')
                                <div class="badge bg-warning bg-gradient text-dark p-2 shadow"> {{$item->prioridad}} </div>
                            @endif
                            @if($item->prioridad == 'Alta')
                                <div class="badge bg-danger bg-gradient p-2 shadow"> {{$item->prioridad}} </div>
                            @endif
                       </div>
                        
                    </div>

                </li>
            @empty
                <li class="list-group-item text-center text-muted">Sin alertas por trabajar!</li>
            @endforelse
        </ul>
        {{$alertas->links()}}

    </div>
</div>

</div>

@endsection