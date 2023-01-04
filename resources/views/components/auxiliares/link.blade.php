@props([
    'link',
    'texto'
])

<a href="{{$link}}" {{ $attributes->merge(['class' => 'text-myTextColor']) }}>{{$texto}}</a>