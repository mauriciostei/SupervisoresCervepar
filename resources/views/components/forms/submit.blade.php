@props([
    'text',
])

<input type="submit" value="{{ $text }}" {{ $attributes->merge(['class' => 'btn btn-myColor bg-gradient shadow']) }} />
