@extends('layouts.admin')

@section('contenido')

<div class="card">
    <form class="card-body" method="POST" action="{{route('perfiles.update', $perfil->id)}}">
        @method('PUT')
        @csrf

        <h3>Editar Perfil</h3>

        <x-forms.input name="nombre" class="mb-3" label="Nombre del Perfil" value="{{old('nombre', $perfil->nombre)}}"/>

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
                                <x-forms.checkbox value="1" name="permisos[{{$item->id}}][ver]" checked="{{ $perfil->permisos->where('id', $item->id)->first()->pivot->ver }}"/>
                            @endif
                        </td>
                        <td>
                            @if($item->crear)
                                <x-forms.checkbox value="1" name="permisos[{{$item->id}}][crear]" checked="{{ $perfil->permisos->where('id', $item->id)->first()->pivot->crear }}"/>
                            @endif
                        </td>
                        <td>
                            @if($item->editar)
                                <x-forms.checkbox value="1" name="permisos[{{$item->id}}][editar]" checked="{{ $perfil->permisos->where('id', $item->id)->first()->pivot->editar }}"/>
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