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
                @if($item->users_id == Auth::user()->id)
                    <a href="{{ route('anomalias.edit', $item->id) }}" class="mt-3">Actualizar Anomalía</a>
                @endif
            @else
                <a href="{{ route('anomalias.iniciar', $item->id) }}" class="mt-3">Iniciar Trabajos</a>
            @endif
        </li>
    @empty
        <li class="list-group-item text-center text-muted">Sin alertas por trabajar!</li>
    @endforelse
</ul>
{{$alertas->links()}}