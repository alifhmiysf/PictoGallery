<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AuthModel;
use CodeIgniter\Email\Email;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->AuthModel = new AuthModel();
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    

    public function valid_register()
    {
        $data = $this->request->getPost();

        // Menjalankan validasi
        if ($this->validation->withRequest($this->request)->run($data, 'register')) {
            // Validasi berhasil
            $password = password_hash($data['password'], PASSWORD_BCRYPT);

            // Memanggil model dan menyimpan data
            $AuthModel = new AuthModel();
            $token = bin2hex(random_bytes(16)); // Menghasilkan token acak
            $tokenHash = password_hash($token, PASSWORD_BCRYPT); // Enkripsi token
            $defaultProfilePhoto = '/img/default.png';
            // Simpan data pengguna beserta token konfirmasi
            $AuthModel->save([
                'username' => $data['username'],
                'password' => $password,
                'email' => $data['email'],
                'alamat' => $data['alamat'],
                'NamaLengkap' => $data['NamaLengkap'],
                'email_token' => $token,
                'is_confirmed' => '0', // Tandai akun sebagai belum dikonfirmasi
                'profile_photo' => $defaultProfilePhoto, // Foto profil default
            ]);

            // Kirim email konfirmasi
            $email_send = $this->sendConfirmationEmail($data['email'], $token);
            if ($email_send) {
                $data['email_sent'] = true; // Menambahkan pesan bahwa email berhasil dikirim ke dalam data
            } else {
                $data['email_sent'] = false; // Menambahkan pesan bahwa gagal mengirim email ke dalam data
            }
        }

        // Mengembalikan view 'register' dengan data yang sesuai
        $data['validation'] = $this->validation; // Menyimpan objek validation di data untuk diakses di view
        return view('register', $data);
    }



    private function sendConfirmationEmail($emailTo, $token)
    {
        $email = \Config\Services::email();

        // Siapkan isi email
        $email->setFrom('alifahmiyusuf631@gmail.com', 'Ali');
        $email->setTo($emailTo);
        $email->setSubject('Konfirmasi Pendaftaran');
        $message = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Konfirmasi Pendaftaran</title>
            <style>
                body { background-color: #f8f9fa; }
                .container { max-width: 600px; margin: auto; padding: 20px; }
                .btn-container { text-align: center; margin-top: 20px; }
                .btn-primary { background-color: #007bff; border-color: #007bff; padding: 10px 20px; color: #fff; text-decoration: none; border-radius: 5px; }
                .btn-primary:hover { background-color: #0056b3; border-color: #0056b3; }
                h2 { color: #343a40; text-align: center; }
                p { color: #6c757d; text-align: justify; }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Selamat datang di Situs PictoGallery!</h2>
                <p >
                    Terima kasih telah mendaftar. Untuk menyelesaikan proses pendaftaran dan mengaktifkan akun Anda, silakan klik tautan di bawah ini:
                </p>
                <div class="btn-container">
                <a href="' . base_url("/auth/confirmRegistration/$token") . '" style="text-align: center; display: inline-block; background-color: #007bff; border: 1px solid #007bff; color: #fff; padding: 10px 20px; text-decoration: none;">Konfirmasi Sekarang</a>
                </div>
                <p style="text-align: center;">Jika Anda tidak mendaftar untuk akun ini, Anda dapat mengabaikan email ini.</p>
            </div>
        </body>
        </html>


        ';

        $email->setMessage($message);
        // Kirim email
        if ($email->send()) {
            return true; // Email berhasil dikirim
        } else {
            return false; // Gagal mengirim email
        }
    }






    public function confirmRegistration($token)
    {

        // var_dump($token); 
        // die();
        $AuthModel = new AuthModel();

        // Temukan pengguna dengan token yang sesuai
        $user = $AuthModel->where('email_token', $token)->first();

        if ($user) {
            // Konfirmasi akun
            $AuthModel->update($user['id'], ['is_confirmed' => '1', 'email_token' => null]);

            // Set sesi pengguna
            $this->session->set([
                'isLogin' => true,
                'id' => $user['id'],
                'username' => $user['username'],
            ]);

            echo 'Berhasil konfirmasi. Redirect ke login...';
            return redirect()->to('/pictogallery/auth/login');
        } else {
            echo 'Gagal konfirmasi. Redirect ke register...';
            return redirect()->to('/pictogallery/auth/register');
        }
    }


    public function valid_login()
    {
        $data = $this->request->getPost();

        // Menjalankan validasi
        if ($this->validation->withRequest($this->request)->run($data, 'login')) {
            $user = $this->AuthModel->where('username', $data['username'])->first();
            // var_dump($user['password']);
            // var_dump($data['password']);
            // var_dump(password_verify($data['password'],$user['password']));
            // die ;
            if ($user && password_verify($data['password'], $user['password'])) {
                // Periksa apakah akun sudah dikonfirmasi
                if ($user['is_confirmed'] == '1') {
                    $this->session->set([
                        "isLogin" => TRUE,
                        "id" => $user['id'],
                        "username" => $user['username'],
                    ]);
                    return redirect()->to('/pictogallery/homepage');
                } else {
                    session()->setFlashdata('error', 'Akun belum dikonfirmasi. Silakan cek email Anda untuk melakukan konfirmasi.');
                    return redirect()->to('/pictogallery/auth/login');
                }
            } else {
                session()->setFlashdata('error', 'Username atau password salah');
                return redirect()->to('/pictogallery/auth/login');
            }
        } else {
            // Validasi gagal, tangani sesuai kebutuhan
            $data['validation'] = $this->validation; // Menyimpan objek validation di data untuk diakses di view
            return view('login', $data);
        }
    }



    public function signOut()
    {
        // Hapus semua data sesi pengguna
        $this->session->destroy();

        // Redirect ke halaman login atau halaman lain yang sesuai
        return redirect()->to('/');
    }
}
