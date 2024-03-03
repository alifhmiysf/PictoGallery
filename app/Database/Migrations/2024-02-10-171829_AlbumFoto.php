<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlbumFoto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_album' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_foto' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_album', 'album', 'idalbum', false, 'CASCADE');
        $this->forge->addForeignKey('id_foto', 'foto', 'idfoto', 'CASCADE', 'CASCADE');

        $this->forge->createTable('album_foto');
    }

    public function down()
    {
        $this->forge->dropTable('album_foto');
    }
}
