<?php

namespace App\Models;

use App\Database\Migrations\Auth;
use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'komentar_foto';
    protected $primaryKey       = 'komentar_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'foto_id', 'isi_komentar', 'tanggal_komentar'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_komentar';
    protected $updatedField  = '';
    protected $deletedField  = '';
    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    // CommentModel
public function findAllWithUser()
{
    // Fetch comments along with associated user information
    return $this->select('komentar_foto.*, user.username')
                ->join('user', 'user.id = komentar_foto.user_id')
                ->findAll();
}

}
