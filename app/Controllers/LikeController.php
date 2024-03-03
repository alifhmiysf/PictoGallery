<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FotoModel;
use App\Models\LikeModel;

class LikeController extends BaseController
{
    public function __construct()
    {
        $this->FotoModel = new \App\Models\FotoModel();
        $this->LikeModel = new \App\Models\LikeModel();
    }

    // Di dalam controller
    public function index()
    {
        $fotoModel = new FotoModel();

        // Ambil semua data foto
        $data['dataf'] = $fotoModel->findAll();

        // Mengambil jumlah like untuk setiap foto
        $likeModel = new LikeModel();
        $data['jumlahLike'] = [];
        foreach ($data['dataf'] as $foto) {
            $data['jumlahLike'][$foto['idfoto']] = $likeModel->where('fotoid', $foto['idfoto'])->countAllResults();
        }

        return view('beranda', $data);
    }




    public function like($foto_id)
    {
        $fotoModel = new FotoModel();
        $likeModel = new LikeModel();

        // Mendapatkan userid dari session user_id
        $userid = session()->get('id');

        // Mengecek apakah pengguna sudah memberi like sebelumnya
        $already_liked = $likeModel->where('userid', $userid)->where('fotoid', $foto_id)->first();

        // Jika pengguna belum memberi like sebelumnya
        if (!$already_liked) {
            // Menambah entri like ke database
            $data = [
                'fotoid' => $foto_id,
                'userid' => $userid
            ];
            $likeModel->insert($data);

            // Mengupdate jumlah like pada entri foto yang sesuai
            $foto = $fotoModel->where('idfoto', $foto_id)->first();
            if ($foto) {
                $tambah_like = $foto['JumlahLike'] + 1;
                $fotoModel->update($foto_id, ['JumlahLike' => $tambah_like]);
            }
        }

        return redirect()->back(); // Redirect ke halaman sebelumnya
    }


    public function unlike($foto_id)
    {
        $likeModel = new LikeModel();
        $fotoModel = new FotoModel();

        // Mendapatkan userid dari session user_id
        $userId = session()->get('id');

        // Memeriksa apakah pengguna sudah menyukai foto tersebut sebelumnya
        $existingLike = $likeModel->where('userid', $userId)->where('fotoid', $foto_id)->first();

        // Jika tidak ada entri like yang sesuai, maka pengguna tidak bisa unlike
        if (!$existingLike) {
            return redirect()->back()->with('error', 'Anda tidak dapat unlike foto yang tidak Anda sukai.');
        }

        // Menghapus entri like dari database
        $likeModel->where('userid', $userId)->where('fotoid', $foto_id)->delete();

        // Mengurangi jumlah like pada entri foto yang sesuai
        $foto = $fotoModel->where('idfoto', $foto_id)->first();
        if ($foto) {
            $kurangi_like = $foto['JumlahLike'] - 1;
            $fotoModel->update($foto_id, ['JumlahLike' => $kurangi_like]);
        }

        return redirect()->back()->with('success', 'Anda berhasil menghapus like pada foto ini.');
    }
}
