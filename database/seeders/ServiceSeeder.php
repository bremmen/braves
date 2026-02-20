<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['name' => 'Construcción Residencial e Industrial', 'order' => 1],
            ['name' => 'Metalúrgica', 'order' => 2],
            ['name' => 'Electricidad', 'order' => 3],
            ['name' => 'Sanitaria', 'order' => 4],
            ['name' => 'Remodelación', 'order' => 5],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['name' => $service['name']],
                $service
            );
        }
    }
}
