@props([
    'label' => '',
    'selected' => '',
    'name',
    'data',
])

<div {{ $attributes->merge(['class' => 'form-floating']) }}>
    <select name="{{$name}}" id="select{{$name}}" class="form-control">
        <option value="">**Seleccione una opción**</option>
        @foreach($data as $item)
            <option value="{{ $item->id }}" @selected($item->id == $selected) > {{$item->nombre}} </option>
        @endforeach
    </select>
    <label for="select{{$name}}"> {{$label}} </label>
    @error($name)
        <div class="text-center text-danger"> {{$message}} </div>
    @enderror
</div>