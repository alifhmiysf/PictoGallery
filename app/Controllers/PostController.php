<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FotoModel;
use App\Models\CommentModel;

class PostController extends BaseController
{
    public function __construct()
    {
        $this->FotoModel = new \App\Models\FotoModel();
        $this->validation = \Config\Services::validation();
        $this->AlbumModel = new \App\Models\AlbumModel();
        $this->KomenModel = new \App\Models\CommentModel();
        $this->AuthModel = new \App\Models\AuthModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if (!$this->session->get('isLogin')) {
            // Jika belum, redirect ke halaman login
            return redirect()->to('/pictogallery/auth/login');
        }
        // Ambil id pengguna dari sesi
        $userId = session()->get('id');

        // Ambil data pengguna dari model berdasarkan id pengguna
        $user = $this->AuthModel->find($userId);
        $userk = $this->AuthModel->findAll();
        // Periksa apakah data pengguna ditemukan
        if (!$user) {
            // Jika tidak ditemukan, lakukan penanganan kesalahan sesuai kebutuhan
            // Misalnya, arahkan pengguna kembali ke halaman login
            return redirect()->to('/pictogallery/auth/login');
        }

        // Ambil data foto dari model
        $dataf = $this->FotoModel->findAll();

        // Acak urutan data foto
        shuffle($dataf);

        // Ambil semua komentar dari model
        $komen = $this->KomenModel->findAll();

        // Ambil data album yang dimiliki oleh pengguna yang sedang login
        $album = $this->AlbumModel->where('userid', $userId)->findAll();

        // Kirim data ke view
        $data = [
            'dataf' => $dataf,
            'album' => $album, // Kirim data album ke view
            'komen' => $komen,
            'user' => $user,
            'userk' => $userk
        ];

        return view('/beranda', $data);
    }






    public function create()
    {
        if (!$this->session->get('isLogin')) {
            // Jika belum, redirect ke halaman login
            return redirect()->to('/pictogallery/auth/login');
        }
        $judul = $this->request->getPost('judul');
        $deskripsi = $this->request->getPost('deskripsi');
        $LokasiFile = $this->request->getFile('LokasiFile');
        $albumid = $this->request->getPost('albumid');
        $userid = $this->request->getPost('userid');
        $TanggalUnggahan = date('Y-m-d H:i:s');

        $data = [ // Menyusun data dalam bentuk array
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'LokasiFile' => $LokasiFile
            // Sisipkan data lainnya sesuai kebutuhan Anda
        ];

        if ($this->validation->run($data, 'foto')) { // Memanggil metode run dengan data dalam bentuk array
            // Validasi berhasil
            $newName = null;

            if ($LokasiFile && $LokasiFile->isValid() && !$LokasiFile->hasMoved()) {
                $newName = $LokasiFile->getRandomName();
                $LokasiFile->move(ROOTPATH . 'public/uploads/', $newName);
            }

            $userid = session()->get('id');
            $data = [
                'Judul' => $judul,
                'Deskripsi' => $deskripsi,
                'tanggalunggahan' => $TanggalUnggahan,
                'LokasiFile' => ($newName !== null) ? $newName : '',
                'albumid' => $albumid,
                'userid' => $userid
            ];

            $this->FotoModel->insert($data);
            return redirect()->to(site_url('/pictogallery/homepage'));
        } else {
            // Validasi gagal, kirim pesan kesalahan validasi ke view
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }
    }



    public function update($idfoto)
    {
        if (!$this->session->get('isLogin')) {
            // Jika belum, redirect ke halaman login
            return redirect()->to('/pictogallery/auth/login');
        }
        $model = new FotoModel();

        // Temukan data foto berdasarkan ID
        $fotoData = $model->find($idfoto);

        // Periksa apakah data foto ditemukan
        if (!$fotoData) {
            return redirect()->to(site_url('/pictogallery/homepage'));
        }

        // Persiapkan data yang ingin diperbarui
        $data = [];

        // Memeriksa dan memproses file jika ada yang diunggah
        $LokasiFile = $this->request->getFile('LokasiFile');
        if ($LokasiFile && $LokasiFile->isValid() && !$LokasiFile->hasMoved()) {
            $newName = $LokasiFile->getRandomName();
            $LokasiFile->move(ROOTPATH . 'public/uploads/', $newName);
            $data['LokasiFile'] = $newName;
        }

        // Periksa apakah ada judul yang dikirim melalui formulir
        $judul = $this->request->getPost('judul');
        if (!empty($judul)) {
            $data['Judul'] = $judul;
        }

        // Periksa apakah ada deskripsi yang dikirim melalui formulir
        $deskripsi = $this->request->getPost('deskripsi');
        if (!empty($deskripsi)) {
            $data['Deskripsi'] = $deskripsi;
        }

        // Update data dalam database
        $model->update($idfoto, $data);

        // Redirect ke halaman beranda setelah pembaruan
        return redirect()->to(site_url('/pictogallery/album'));
    }





    public function hapus($idfoto)
    {
        if (!$this->session->get('isLogin')) {
            // Jika belum, redirect ke halaman login
            return redirect()->to('/pictogallery/auth/login');
        }
        $model = new FotoModel();

        // Temukan data foto berdasarkan ID
        $fotoData = $model->find($idfoto);

        // Periksa apakah data foto ditemukan
        if (!$fotoData) {
            return redirect()->to(site_url('/pictogallery/homepage'));
        }

        // Hapus komentar terkait dengan foto
        $KomenModel = new CommentModel();
        $KomenModel->where('foto_id', $idfoto)->delete();

        // Hapus data foto dari database
        $model->delete($idfoto);

        // Redirect ke halaman beranda setelah penghapusan
        return redirect()->back();
    }



    public function postingan()
    {
        if (!$this->session->get('isLogin')) {
            // Jika belum, redirect ke halaman login
            return redirect()->to('/pictogallery/auth/login');
        }
        $userid = session()->get('id');
        $userk = $this->AuthModel->findAll();
        // Ambil data foto yang terkait dengan pengguna yang sedang login
        $dataf = $this->FotoModel->where('userid', $userid)->findAll();

        $user = $this->AuthModel->find($userid);
        // Ambil data album untuk pengguna yang sedang login
        $album = $this->AlbumModel->where('userid', $userid)->findAll();

        // Ambil semua data komentar
        $komen = $this->KomenModel->findAll();

        // Kirim data ke view
        $data = [
            'user' => $user,
            'datafoto' => $dataf,
            'album' => $album,
            'dataf' => $dataf,
            'komen' => $komen,
            'userk' => $userk
        ];

        return view('/album', $data);
    }
}
