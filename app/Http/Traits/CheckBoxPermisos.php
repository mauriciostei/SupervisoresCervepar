<?php

namespace App\Http\Traits;

use App\Models\Permisos;

trait CheckBoxPermisos{

    public function RequestToPermisos($object){
        $result = [];
        $permisos = Permisos::all();
        foreach($permisos as $permiso):

            $ver = $object[$permiso->id]["ver"] ?? "0";
            $crear = $object[$permiso->id]["crear"] ?? "0";
            $editar = $object[$permiso->id]["editar"] ?? "0";

            $result[$permiso->id] = Array('ver' => $ver, 'crear' => $crear, 'editar' => $editar);

        endforeach;

        return $result;
    }

}