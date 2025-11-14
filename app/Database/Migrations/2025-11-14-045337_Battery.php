<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Battery extends Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'capacity' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'voltage' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'category_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('batteries');
    }

    public function down()
    {
        $this->forge->dropTable('batteries');
    }
}
