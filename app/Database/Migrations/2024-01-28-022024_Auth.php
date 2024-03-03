<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Auth extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'profile_photo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
            ],
            'NamaLengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => 250,
            ],
            'email_token' => [ // Kolom untuk menyimpan token konfirmasi
                'type'       => 'VARCHAR',
                'constraint' => 255, // Sesuaikan sesuai kebutuhan
                'null'       => true, // Agar dapat diisi null jika belum dikonfirmasi
            ],
            'is_confirmed' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
            ],
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
