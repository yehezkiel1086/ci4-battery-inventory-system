<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Automotive',
            ],
            [
                'name' => 'Motorcycle',
            ],
            [
                'name' => 'Industrial',
            ],
            [
                'name' => 'Marine',
            ],
            [
                'name' => 'Deep Cycle',
            ],
        ];

        // Using Query Builder to insert data
        $this->db->table('categories')->insertBatch($data);
    }
}
