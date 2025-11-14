<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'battery_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'available_stock' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ]
        ]);
        $this->forge->addPrimaryKey('battery_id');
        $this->forge->addForeignKey('battery_id', 'batteries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('inventories');
    }

    public function down()
    {
        // If table exists, drop it
        $this->forge->dropTable('inventories', true);
    }
}
