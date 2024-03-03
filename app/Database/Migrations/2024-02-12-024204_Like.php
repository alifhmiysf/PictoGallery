<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Like extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'LikeID' => [
                'type' => 'INT',
                'constraint' =>11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'fotoid' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'userid' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'TanggalLike' => [
                'type' => 'DATE',
            ],
        ]);
        $this->forge->addKey('LikeID', true);
        $this->forge->addForeignKey('fotoid', 'foto', 'idfoto', 'CASCADE', 'CASCADE'); // Menambahkan kunci kebilitasan
        $this->forge->addForeignKey('userid', 'user', 'id', 'CASCADE', 'CASCADE'); // Menambahkan kunci kebilitasan
        $this->forge->createTable('likeFoto');
    }

    public function down()
    {
        $this->forge->dropTable('LikeFoto');
    }
}
