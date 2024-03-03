<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use CodeIgniter\HTTP\ResponseInterface;

class CommentController extends BaseController
{
    public function __construct()
    {
        $this->CommentModel = new \App\Models\CommentModel();
        $this->FotoModel = new \App\Models\FotoModel();
        $this->UserModel = new \App\Models\AuthModel();
    }
    public function index()
    {
    }

    public function create($idfoto)
    {
        // Ambil data yang diperlukan untuk membuat komentar
        $user_id = session()->get('id');
        $isi_komentar = $this->request->getPost('commentInput');

        // Simpan komentar ke dalam database
        $CommentModel = new CommentModel();
        $data = [
            'isi_komentar' => $isi_komentar,
            'user_id' => $user_id,
            'foto_id' => $idfoto,
        ];
        $CommentModel->insert($data);

        return redirect()->back();
    }


    public function update($komentar_id)
    {
        $CommentModel = new CommentModel();

        // Ambil data yang diperlukan untuk mengupdate komentar
        $isi_komentar = $this->request->getPost('commentInput');

        // Temukan komentar berdasarkan komentar_id
        $comment = $CommentModel->find($komentar_id);

        // Mendapatkan id pengguna dari sesi
        $user_id = session()->get('id');

        // Lakukan pengecekan apakah komentar ditemukan dan apakah pengguna yang sedang login adalah pemilik komentar
        if ($comment === null || $comment['user_id'] !== $user_id) {
            // Komentar tidak ditemukan atau pengguna tidak memiliki izin untuk mengupdate komentar, kembalikan respons dengan pesan error
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengupdate komentar ini.');
        }

        // Perbarui komentar dengan data yang baru
        $data = [
            'isi_komentar' => $isi_komentar,
        ];
        $CommentModel->update($komentar_id, $data);

        // Redirect ke halaman beranda
        return redirect()->back();
    }
    public function delete($komentar_id)
    {
        
        // Temukan komentar yang akan dihapus
        $comment = $this->CommentModel->find($komentar_id);

        // Periksa apakah komentar ditemukan
        if ($comment === null) {
            // Komentar tidak ditemukan, kembalikan respons dengan pesan error
            return redirect()->back()->with('error', 'Komentar tidak ditemukan.');
        }

        // Mendapatkan id pengguna dari sesi
        $userId = session()->get('id');

        // Periksa apakah pengguna yang sedang login adalah pemilik komentar
        if ($comment['user_id'] !== $userId) {
            // Pengguna tidak memiliki izin untuk menghapus komentar, kembalikan respons dengan pesan error
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }

        // Hapus komentar dari database
        $this->CommentModel->delete($komentar_id);

        return redirect()->back();
    }
}
