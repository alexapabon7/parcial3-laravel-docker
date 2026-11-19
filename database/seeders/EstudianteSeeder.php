<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        $estudiantes = [
            ['nombre' => 'Laura Gómez',     'correo' => 'laura.gomez@example.com',     'programa' => 'Ingeniería Informática'],
            ['nombre' => 'Carlos Pérez',    'correo' => 'carlos.perez@example.com',    'programa' => 'Ingeniería Industrial'],
            ['nombre' => 'María Rodríguez', 'correo' => 'maria.rodriguez@example.com', 'programa' => 'Administración de Empresas'],
            ['nombre' => 'Andrés Torres',   'correo' => 'andres.torres@example.com',   'programa' => 'Contaduría Pública'],
            ['nombre' => 'Sofía Martínez',  'correo' => 'sofia.martinez@example.com',  'programa' => 'Ingeniería Informática'],
        ];

        foreach ($estudiantes as $e) {
            Estudiante::firstOrCreate(['correo' => $e['correo']], $e);
        }
    }
}
