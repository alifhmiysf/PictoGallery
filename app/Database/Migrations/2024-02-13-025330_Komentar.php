<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Komentar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'komentar_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'foto_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'isi_komentar' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'tanggal_komentar' => [
                'type' => 'DATETIME',
            ]
        ]);

        $this->forge->addKey('komentar_id', true);
        $this->forge->addForeignKey('user_id', 'user', 'id');  // Menggunakan 'user_id' sebagai kunci asing
        $this->forge->addForeignKey('foto_id', 'foto', 'idfoto');  // Menggunakan 'foto_id' sebagai kunci asing
        $this->forge->createTable('komentar_foto');
    }

    public function down()
    {
        $this->forge->dropTable('komentar_foto');
    }
}
