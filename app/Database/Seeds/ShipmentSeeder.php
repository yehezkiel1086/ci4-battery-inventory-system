<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'battery_id'  => 1, // Astra GS MF NS60
                'date_sent'   => '2023-10-01',
                'destination' => 'Japan',
                'total_sent'  => 50,
            ],
            [
                'battery_id'  => 2, // Yuasa YTZ6V
                'date_sent'   => '2023-10-05',
                'destination' => 'Germany',
                'total_sent'  => 100,
            ],
            [
                'battery_id'  => 3, // Trojan T-105
                'date_sent'   => '2023-10-10',
                'destination' => 'United States',
                'total_sent'  => 20,
            ],
            [
                'battery_id'  => 1, // Astra GS MF NS60
                'date_sent'   => '2023-10-12',
                'destination' => 'Japan',
                'total_sent'  => 30,
            ],
            [
                'battery_id'  => 4, // Optima BlueTop D34M
                'date_sent'   => '2023-10-15',
                'destination' => 'England',
                'total_sent'  => 15,
            ],
            [
                'battery_id'  => 5, // Forklift Battery 48V
                'date_sent'   => '2023-10-20',
                'destination' => 'Germany',
                'total_sent'  => 5,
            ],
        ];

        // Using Query Builder to insert data
        $this->db->table('shipments')->insertBatch($data);
    }
}
