<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Foto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idfoto' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Judul' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'Deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'TanggalUnggahan' => [
                'type' => 'DATETIME',
            ],
            'LokasiFile' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'userid' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'JumlahLike' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
        ]);

        $this->forge->addKey('idfoto', true);

        // Tambahkan foreign key dan aturan ON DELETE CASCADE
    $this->forge->addForeignKey('userid', 'user', 'id', '', 'CASCADE'); 
        $this->forge->createTable('foto');
    }

    public function down()
    {
        $this->forge->dropTable('foto');
    }
}
