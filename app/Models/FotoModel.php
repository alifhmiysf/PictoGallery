<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table            = 'foto';
    protected $primaryKey       = 'idfoto';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['Judul', 'Deskripsi', 'TanggalUnggahan', 'LokasiFile', 'userid', 'JumlahLike','TanggalUnggahan'];
    protected bool $allowEmptyInserts = false;

    public function album()
    {
        return $this->belongsTo(AlbumModel::class, 'id_album', 'idalbum');
    }

    public function getFoto($foto_id)
    {
        return $this->find($foto_id);
    }
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'TanggalUnggahan';
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
}
