@props([
    'titulo',
    'model',
    'link',
])

<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between mb-3">
            <h3> {{$titulo}} </h3>
            @can('update', $model)
                <a href="{{route($link, $model->id)}}">Editar</a>
            @endcan
        </div>
    </div>
</div>