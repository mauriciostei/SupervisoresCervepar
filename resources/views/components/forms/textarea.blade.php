@props([
    'label' => '',
    'name',
    'value' => '',
])

<div {{ $attributes->merge(['class' => 'form-floating']) }}>
    <textarea class="form-control" id="input{{$name}}" name="{{$name}}">{{$value}}</textarea>
    <label for="input{{$name}}"> {{$label}} </label>
    @error($name)
        <div class="text-center text-danger"> {{$message}} </div>
    @enderror
</div>