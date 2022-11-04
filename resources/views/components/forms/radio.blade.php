@props([
    'label' => '',
    'name',
    'value' => '',
])


<div class="form-check">
    <input class="form-check-input" type="radio" name="{{$name}}" id="form{{$name}}" value="{{$value}}">
    <label class="form-check-label" for="form{{$name}}"> {{$label}} </label>
</div>