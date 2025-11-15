<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'battery_id'      => 1,
                'available_stock' => 50,
            ],
            [
                'battery_id'      => 2,
                'available_stock' => 75,
            ],
            [
                'battery_id'      => 3,
                'available_stock' => 20,
            ],
            [
                'battery_id'      => 4,
                'available_stock' => 30,
            ],
            [
                'battery_id'      => 5,
                'available_stock' => 15,
            ],
        ];

        // Using Query Builder to insert data
        $this->db->table('inventories')->insertBatch($data);
    }
}
