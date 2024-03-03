<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\AuthModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->FotoModel = new \App\Models\FotoModel();
        $this->AuthModel = new \App\Models\AuthModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }
    public function index(): string
    {
        return view('landingpage');
    }
    public function profile()
    {
        if (!$this->session->get('isLogin')) {
            // Jika belum, redirect ke halaman login
            return redirect()->to('/pictogallery/auth/login');
        }
        $userid = session()->get('id');
        $user = $this->AuthModel->find($userid);
        $fotomodel = $this->FotoModel->where('userid', $userid)->findAll();


        $data = [
            'user' => $user,
            'fotomodel' => $fotomodel
        ];

        return view('profile', $data);
    }

    public function settings()
    {
        if (!$this->session->get('isLogin')) {
            // Jika belum, redirect ke halaman login
            return redirect()->to('/pictogallery/auth/login');
        }
        $loggedInUserId = session()->get('id');
        $user = $this->AuthModel->find($loggedInUserId);

        // Menyiapkan data untuk ditampilkan di view
        $data = [
            'user' => $user
        ];

        // Menampilkan view 'profilesettings' dengan data yang telah dipersiapkan
        return view('profilesettings', $data);
    }


    public function edit_account()
    {
        // Mengambil data dari form yang dikirimkan
        $data = $this->request->getPost();

        // Mendapatkan ID pengguna yang sedang login
        $userId = session()->get('id');

        // Mengambil data pengguna berdasarkan ID
        $user = $this->AuthModel->find($userId);

        // Validasi data yang dikirimkan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'is_unique[user.username,id,' . $userId . ']|min_length[5]',
            'email' => 'valid_email|is_unique[user.email,id,' . $userId . ']'
        ]);

        if (!$validation->run($data)) {
            // Jika validasi gagal, kembalikan dengan pesan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Persiapan data untuk pembaruan
        $updatedData = [
            'username' => $data['username'],
            'NamaLengkap' => $data['fullname'],
            'alamat' => $data['address'],
            'email' => $data['email']
        ];

        // Cek apakah ada file foto profil yang diunggah
        $profilePhoto = $this->request->getFile('profile_photo');

        // Periksa apakah file 'profile_photo' telah diunggah
        if ($profilePhoto && $profilePhoto->isValid() && !$profilePhoto->hasMoved()) {
            // Lakukan operasi upload dan pembaruan data
            $newProfilePhotoName = $profilePhoto->getRandomName();
            $profilePhoto->move(ROOTPATH . 'public/img/', $newProfilePhotoName);

            // Simpan nama file foto profil yang baru ke dalam database
            $updatedData['profile_photo'] = '/img/' . $newProfilePhotoName;
        }

        // Lakukan proses update data pengguna
        $this->AuthModel->update($userId, $updatedData);

        // Update session dengan username baru
        session()->set('username', $data['username']);

        // Periksa apakah username berubah, jika ya, perbarui ID pengguna di session
        if ($user['username'] !== $data['username']) {
            session()->set('id', $userId);
        }

        // Redirect pengguna ke halaman tertentu setelah berhasil melakukan edit
        return redirect()->to('/pictogallery/profile-settings')->with('success', 'Akun berhasil diperbarui');
    }



    public function updatePassword()
    {
        $session = session();
        $data = $this->request->getPost();
    
        // Validasi bahwa password baru dan konfirmasi password cocok
        if ($data['new_password'] !== $data['confirm_password']) {
            session()->setFlashdata('error', 'Password baru dan konfirmasi password tidak cocok.');
            return redirect()->back();
        }
    
        // Mengambil ID pengguna yang sedang login dari sesi
        $userId = $session->get('id');
    
        // Mengambil data pengguna berdasarkan ID
        $AuthModel = new AuthModel();
        $user = $AuthModel->find($userId);
    
        if (!$user) {
            session()->setFlashdata('error', 'Pengguna tidak ditemukan.');
            return redirect()->back();
        }
    
        // Hash password baru
        $newPasswordHash = password_hash($data['new_password'], PASSWORD_BCRYPT);
    
        // Update password di database
        $AuthModel->update($userId, ['password' => $newPasswordHash]);
    
        // Set flashdata untuk menampilkan notifikasi bahwa password telah berhasil diperbarui
        session()->setFlashdata('success', 'Password berhasil diperbarui.');
    
        // Redirect ke halaman profil atau dashboard
        return redirect()->to('/pictogallery/profile-settings'); // Sesuaikan dengan URL tujuan
    }
    
}
