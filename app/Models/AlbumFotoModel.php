<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumFotoModel extends Model
{
    protected $table            = 'album_foto';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_album', 'id_foto'];

    protected bool $allowEmptyInserts = false;

    public function simpanFotoKeAlbum($idFoto, $idAlbum)
    {
        $data = [
            'id_foto' => $idFoto,
            'id_album' => $idAlbum
        ];

        $this->insert($data);
    }


    public function isAlreadySaved($idFoto, $idAlbum)
    {
        // Lakukan query untuk memeriksa apakah entri sudah ada dalam tabel album_foto
        $query = $this->db->table('album_foto')
            ->where('id_foto', $idFoto)
            ->where('id_album', $idAlbum)
            ->countAllResults();

        // Jika jumlah hasil query lebih dari 0, berarti entri sudah ada
        return ($query > 0) ? true : false;
    }

    public function foto()
    {
        return $this->belongsTo(FotoModel::class, 'id_foto', 'idfoto');
    }

    public function album()
    {
        return $this->belongsTo(AlbumModel::class, 'id_album', 'idalbum');
    }

    public function hapusFotoDariAlbum($idFoto, $idAlbum)
    {
        // Lakukan query untuk menghapus foto dari album yang dipilih
        $this->where('id_foto', $idFoto)->where('id_album', $idAlbum)->delete();
    }

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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
