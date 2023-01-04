@props([
    'route',
    'label'
])

<a href="{{route($route)}}" class="text-decoration-none text-myTextColor px-2 my-1 @if(Route::current()->getName()==$route) text-dark font-bold lead @else text-muted text-opacity-25 @endif">{{$label}}</a>