<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BatterySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Astra GS MF NS60',
                'type' => 'Maintenance Free',
                'capacity' => '45 Ah',
                'voltage' => '12V',
                'price' => 750000,
                'category_id' => 1, // Automotive
            ],
            [
                'name' => 'Yuasa YTZ6V',
                'type' => 'AGM',
                'capacity' => '5 Ah',
                'voltage' => '12V',
                'price' => 250000,
                'category_id' => 2, // Motorcycle
            ],
            [
                'name' => 'Trojan T-105',
                'type' => 'Flooded Lead-Acid',
                'capacity' => '225 Ah',
                'voltage' => '6V',
                'price' => 2500000,
                'category_id' => 5, // Deep Cycle
            ],
            [
                'name' => 'Optima BlueTop D34M',
                'type' => 'AGM',
                'capacity' => '55 Ah',
                'voltage' => '12V',
                'price' => 3500000,
                'category_id' => 4, // Marine
            ],
            [
                'name' => 'Forklift Battery 48V',
                'type' => 'Lead-Acid',
                'capacity' => '600 Ah',
                'voltage' => '48V',
                'price' => 50000000,
                'category_id' => 3, // Industrial
            ],
        ];

        $this->db->table('batteries')->insertBatch($data);
    }
}
