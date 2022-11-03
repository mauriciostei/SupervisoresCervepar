@props([
    'label' => '',
    'name',
    'value',
    'checked' => false
])

<div {{ $attributes->merge(['class' => '']) }}>
    <input class="form-check-input me-2" type="checkbox" value="{{$value}}" name="{{$name}}" @checked($checked)>
    {{$label}}
</div>