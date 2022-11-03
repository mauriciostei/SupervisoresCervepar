@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('perfiles.store')}}">
        @csrf

        <h3>Nuevo Perfil</h3>

        <x-forms.input name="nombre" class="mb-3" label="Nombre del Perfil" value="{{old('nombre')}}"/>

        <h4>Permisos del Perfil</h4>

        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Modulo</th>
                    <th>Ver</th>
                    <th>Crear</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permisos as $index => $item)
                    <tr>
                        <td> {{ucfirst($item->nombre)}} </td>
                        <td>
                            @if($item->ver)
                                <x-forms.checkbox value="1" name="permisos[{{$item->id}}][ver]"/>
                            @endif
                        </td>
                        <td>
                            @if($item->crear)
                                <x-forms.checkbox value="1" name="permisos[{{$item->id}}][crear]"/>
                            @endif
                        </td>
                        <td>
                            @if($item->editar)
                                <x-forms.checkbox value="1" name="permisos[{{$item->id}}][editar]"/>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-forms.submit text="Guardar"/>
    
    </form>
</div>

@endsection