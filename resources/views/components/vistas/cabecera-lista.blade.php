@props([
    'titulo',
    'link',
    'model'
])

<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
            <h3> {{$titulo}} </h3>
            @can('create', "\App\Models\/$model")
                <a href="{{route($link)}}" class="btn btn-myColor shadow">Nuevo</a>
            @endcan
        </div>
    </div>
</div>