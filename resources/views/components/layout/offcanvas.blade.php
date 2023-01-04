@props([
    'titulo' => '',
    'identificador'
])

<div {{ $attributes->merge(['class' => 'offcanvas']) }} tabindex="-1" id="{{$identificador}}">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title"> {{$titulo}} </h5>
      <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        {{$slot}}
    </div>
</div>