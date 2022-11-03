@props([
    'type' => 'text',
    'label' => '',
    'name',
    'value' => '',
])

<div {{ $attributes->merge(['class' => 'form-floating']) }}>
    <input type="{{$type}}" class="form-control" id="input{{$name}}" name="{{$name}}" value="{{$value}}"/>
    <label for="input{{$name}}"> {{$label}} </label>
    @error($name)
        <div class="text-center text-danger"> {{$message}} </div>
    @enderror
</div>