<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\App;
use App\Models\AlbumModel;
use App\Models\AlbumFotoModel;

class AlbumController extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->AlbumModel = new \App\Models\AlbumModel();
        $this->FotoModel = new \App\Models\FotoModel();
        $this->AlbumFotoModel = new \App\Models\AlbumFotoModel();
        $this->AuthModel = new \App\Models\AuthModel();
        $this->KomenModel = new \App\Models\CommentModel();
    }

    public function tambahAlbum()
    {
        // Periksa apakah pengguna telah login
        if (!session()->get('isLogin')) {
            // Jika belum, arahkan pengguna kembali ke halaman login
            return redirect()->to('/pictogallery/auth/login');
        }

        // Ambil data yang dikirimkan melalui POST
        $userid = session()->get('id');
        $namaAlbum = $this->request->getPost('namaAlbum');
        $deskripsiAlbum = $this->request->getPost('deskripsiAlbum');

        // Validasi data jika diperlukan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'NamaAlbum' => 'required|min_length[5]',
            'deskripsi' => 'required|min_length[5]'
        ]);

        // Lakukan validasi
        if (!$validation->run(['NamaAlbum' => $namaAlbum, 'deskripsi' => $deskripsiAlbum], 'album')) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data album ke dalam database
        $albumModel = new AlbumModel();
        $data = [
            'NamaAlbum' => $namaAlbum,
            'deskripsi' => $deskripsiAlbum,
            'userid' => $userid, // Masukkan userid dari session
            // Tambahkan field lainnya jika ada
        ];

        $albumModel->insert($data);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->to('/pictogallery/album');
    }


    public function editAlbum()
    {
        // Ambil data yang diterima dari form
        $albumId = $this->request->getPost('album_id');
        $namaAlbum = $this->request->getPost('edit_nama_album');
        $deskripsiAlbum = $this->request->getPost('edit_deskripsi_album');

        // Validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'NamaAlbum' => 'required|min_length[5]',
            'deskripsi' => 'required|min_length[5]'
        ]);

        // Validasi edit album
        if (!$validation->run(['NamaAlbum' => $namaAlbum, 'deskripsi' => $deskripsiAlbum], 'edit_album')) {
            return redirect()->back()->withInput()->with('edit_album_errors', $validation->getErrors());
        }




        // Panggil model untuk melakukan update data album
        $albumModel = new AlbumModel();
        $albumModel->update($albumId, [
            'NamaAlbum' => $namaAlbum,
            'deskripsi' => $deskripsiAlbum
        ]);

        // Redirect ke halaman atau berikan respons sesuai kebutuhan
        return redirect()->to('/pictogallery/album');
    }



    public function deleteAlbum($albumId)
    {
        // Panggil model untuk menghapus data album berdasarkan ID
        $albumModel = new AlbumModel();
        $albumModel->delete($albumId);

        // Redirect ke halaman atau berikan respons sesuai kebutuhan
        return redirect()->to('/pictogallery/album');
    }






    public function simpanFoto()
    {

        // Ambil data yang dikirimkan melalui POST
        $idFoto = $this->request->getPost('idFoto');
        $idAlbum = $this->request->getPost('idAlbum');

        // Lakukan validasi sebelum menyimpan foto ke dalam album
        $albumFotoModel = new AlbumFotoModel();
        $isAlreadySaved = $albumFotoModel->isAlreadySaved($idFoto, $idAlbum);

        if ($isAlreadySaved) {
            // Jika foto sudah disimpan dalam album, berikan pesan error atau arahkan ke halaman yang sesuai
            return redirect()->back()->with('error', 'Foto sudah ada dalam album.');
        }

        // Lakukan operasi untuk menyimpan foto ke dalam album yang dipilih
        $albumFotoModel->simpanFotoKeAlbum($idFoto, $idAlbum);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back();
    }



    public function detail($idalbum)
    {

        $userid = session()->get('id');
        $userk = $this->AuthModel->findAll();
        // Ambil data album berdasarkan idAlbum
        $album = $this->AlbumModel->find($idalbum);
        $komen = $this->KomenModel->findAll();
        if (!$album) {
            // Jika album tidak ditemukan, mungkin Anda ingin menangani kasus ini
            // misalnya, dengan menampilkan pesan error atau mengarahkan pengguna ke halaman lain
            return redirect()->to('/error-page');
        }

        // Ambil foto-foto yang terkait dengan album
        $fotoAlbum = $this->AlbumFotoModel->where('id_album', $idalbum)->findAll();
        $user = $this->AuthModel->find($userid);
        // Mengumpulkan ID foto-foto yang terkait dengan album
        $idFotoAlbum = array_column($fotoAlbum, 'id_foto');

        // Ambil detail foto-foto yang terkait dengan album
        $detailFotoAlbum = [];
        if (!empty($idFotoAlbum)) {
            $detailFotoAlbum = $this->FotoModel->whereIn('idfoto', $idFotoAlbum)->findAll();
        }

        // Kirim data album dan detail foto-foto ke view
        $data = [
            'user' => $user,
            'album' => $album,
            'detailFotoAlbum' => $detailFotoAlbum,
            'komen' => $komen,
            'userk' => $userk
        ];

        // Jika tidak ada foto yang terkait dengan album
        if (empty($idFotoAlbum)) {
            // Tambahkan pesan bahwa album kosong ke dalam data
            $data['emptyAlbumMessage'] = 'Album ini masih kosong. Silakan tambahkan foto ke dalam album ini.';
        }

        return view('detailAlbum', $data);
    }

    public function hapusFotoDariAlbum()
    {
        $id_foto = $this->request->getPost('id_foto');
        $id_album = $this->request->getPost('id_album');

        // Panggil fungsi untuk menghapus foto dari album
        $albumFotoModel = new AlbumFotoModel();
        $albumFotoModel->hapusFotoDariAlbum($id_foto, $id_album);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back();
    }
}
