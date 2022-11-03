<?php

namespace Database\Seeders;

use App\Models\Perfiles;
use App\Models\Permisos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilesSeeder extends Seeder
{
    public function run()
    {
        $perfil = new Perfiles();
        $perfil->nombre = 'Admin';
        $perfil->save();

        $permisos = new Permisos();
        $permisos->nombre = 'users';
        $permisos->ver = true;
        $permisos->crear = true;
        $permisos->editar = true;
        $permisos->save();
        $perfil->permisos()->attach($permisos->id, ['ver' => true, 'crear' => true, 'editar' => true]);

        $permisos = new Permisos();
        $permisos->nombre = 'perfiles';
        $permisos->ver = true;
        $permisos->crear = true;
        $permisos->editar = true;
        $permisos->save();
        $perfil->permisos()->attach($permisos->id, ['ver' => true, 'crear' => true, 'editar' => true]);

        $permisos = new Permisos();
        $permisos->nombre = 'centros';
        $permisos->ver = true;
        $permisos->crear = true;
        $permisos->editar = true;
        $permisos->save();
        $perfil->permisos()->attach($permisos->id, ['ver' => true, 'crear' => true, 'editar' => true]);

        $permisos = new Permisos();
        $permisos->nombre = 'sectores';
        $permisos->ver = true;
        $permisos->crear = true;
        $permisos->editar = true;
        $permisos->save();
        $perfil->permisos()->attach($permisos->id, ['ver' => true, 'crear' => true, 'editar' => true]);

        $permisos = new Permisos();
        $permisos->nombre = 'sensores';
        $permisos->ver = true;
        $permisos->crear = true;
        $permisos->editar = true;
        $permisos->save();
        $perfil->permisos()->attach($permisos->id, ['ver' => true, 'crear' => true, 'editar' => true]);

        $permisos = new Permisos();
        $permisos->nombre = 'problemas';
        $permisos->ver = true;
        $permisos->crear = true;
        $permisos->editar = true;
        $permisos->save();
        $perfil->permisos()->attach($permisos->id, ['ver' => true, 'crear' => true, 'editar' => true]);

        $permisos = new Permisos();
        $permisos->nombre = 'soluciones';
        $permisos->ver = true;
        $permisos->crear = true;
        $permisos->editar = true;
        $permisos->save();
        $perfil->permisos()->attach($permisos->id, ['ver' => true, 'crear' => true, 'editar' => true]);
    }
}
