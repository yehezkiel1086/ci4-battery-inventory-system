<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Production extends Migration
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
            'production_date' => [
                'type' => 'DATE',
            ],
            'production_total' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'shift' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'operator' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('battery_id', 'batteries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('productions');
    }

    public function down()
    {
        // If table exists, drop it
        $this->forge->dropTable('productions', true);
    }
}
