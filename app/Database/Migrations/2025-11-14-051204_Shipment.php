<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Shipment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'battery_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'date_sent' => [
                'type' => 'DATE',
            ],
            'destination' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'total_sent' => [
                'type' => 'INT',
                'constraint' => 11,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('battery_id', 'batteries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('shipments');
    }

    public function down()
    {
        // If table exists, drop it
        $this->forge->dropTable('shipments', true);
    }
}
