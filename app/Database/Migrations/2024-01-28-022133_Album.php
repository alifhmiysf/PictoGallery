<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Album extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idalbum' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'NamaAlbum' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'TanggalDibuat' => [
                'type' => 'DATE',
            ],
            'userid' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
        ]);

        $this->forge->addKey('idalbum', true);
        $this->forge->addForeignKey('userid', 'user', 'id'); 
        $this->forge->createTable('album');
    }

    public function down()
    {
        $this->forge->dropTable('album');
    }
}
