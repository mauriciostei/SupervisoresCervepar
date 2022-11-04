<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Centros;
use App\Models\Problemas;
use App\Models\Sectores;
use App\Models\Sensores;
use App\Models\Soluciones;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PerfilesSeeder::class,
            UsersSeeder::class,
        ]);

        // Datos Temporales para las pruebas a realizarse
        
        $centros = new Centros();
        $centros->nombre = 'Centro de Guarambare';
        $centros->siglas = 'CDG';
        $centros->save();

            $sectores = new Sectores();
            $sectores->centros_id = $centros->id;
            $sectores->perfiles_id = 1;
            $sectores->nombre = 'Entrada';
            $sectores->save();

                $sensores = new Sensores();
                $sensores->sectores_id = $sectores->id;
                $sensores->nombre = 'Entrada Principal 1';
                $sensores->codigo = 'ENT1';
                $sensores->save();

                $sensores = new Sensores();
                $sensores->sectores_id = $sectores->id;
                $sensores->nombre = 'Entrada Principal 2';
                $sensores->codigo = 'ENT2';
                $sensores->save();

            $sectores = new Sectores();
            $sectores->centros_id = $centros->id;
            $sectores->perfiles_id = 1;
            $sectores->nombre = 'Salida';
            $sectores->save();

                $sensores = new Sensores();
                $sensores->sectores_id = $sectores->id;
                $sensores->nombre = 'Salida Principal 1';
                $sensores->codigo = 'SAL1';
                $sensores->save();

                $sensores = new Sensores();
                $sensores->sectores_id = $sectores->id;
                $sensores->nombre = 'Salida Principal 2';
                $sensores->codigo = 'SAL2';
                $sensores->save();

        $user = User::find(1);
        $user->sectores()->attach([1,2]);

        $problemas = new Problemas();
        $problemas->nombre = 'Incendio Iniciado';
        $problemas->save();

        $problemas = new Problemas();
        $problemas->nombre = 'Personal con el teléfono';
        $problemas->save();

        $problemas = new Problemas();
        $problemas->nombre = 'Otros';
        $problemas->save();

        $soluciones = new Soluciones();
        $soluciones->nombre = 'Correr con el matafuegos';
        $soluciones->save();
        $soluciones->problemas()->attach([1,3]);

        $soluciones = new Soluciones();
        $soluciones->nombre = 'Putear al personal';
        $soluciones->save();
        $soluciones->problemas()->attach([2,3]);

        $soluciones = new Soluciones();
        $soluciones->nombre = 'Correr en circulo y hacerse bolina';
        $soluciones->save();
        $soluciones->problemas()->attach([1,2,3]);
    }
}
