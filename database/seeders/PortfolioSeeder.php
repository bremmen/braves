<?php

namespace Database\Seeders;

use App\Models\PortfolioProject;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            ['title' => 'Complejo Residencial Los Pinos', 'description' => 'Construcción de 120 viviendas con diseño moderno y sostenible.', 'category' => 'residencial', 'year' => '2023', 'icon' => 'fa-home', 'order' => 1],
            ['title' => 'Centro Comercial Plaza Central', 'description' => 'Mega centro comercial de 25,000 m² con estacionamiento subterráneo.', 'category' => 'comercial', 'year' => '2022', 'icon' => 'fa-store', 'order' => 2],
            ['title' => 'Planta Industrial TechCorp', 'description' => 'Complejo industrial de 15,000 m² con tecnología de punta.', 'category' => 'industrial', 'year' => '2023', 'icon' => 'fa-industry', 'order' => 3],
            ['title' => 'Torres del Mar', 'description' => 'Edificio de apartamentos de lujo con vista al mar.', 'category' => 'residencial', 'year' => '2022', 'icon' => 'fa-building', 'order' => 4],
            ['title' => 'Hospital San Rafael', 'description' => 'Centro médico especializado con 200 camas y tecnología avanzada.', 'category' => 'comercial', 'year' => '2021', 'icon' => 'fa-hospital', 'order' => 5],
            ['title' => 'Centro Logístico Norte', 'description' => 'Complejo de almacenes y distribución de 30,000 m².', 'category' => 'industrial', 'year' => '2023', 'icon' => 'fa-warehouse', 'order' => 6],
        ];

        foreach ($projects as $project) {
            PortfolioProject::updateOrCreate(
                ['title' => $project['title']],
                $project
            );
        }
    }
}
