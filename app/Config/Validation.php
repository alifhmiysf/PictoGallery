<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $foto = [
        'judul' => [
            'rules' => 'required|min_length[5]',
            'errors' => [
                'required' => 'Judul wajib diisi.',
                'min_length' => 'Judul minimal harus memiliki panjang 5 karakter.'

            ],
        ],
        'deskripsi' => [
            'rules' => 'required|min_length[5]|alpha_space',
            'errors' => [
                'required' => 'Deskripsi wajib diisi.',
                'min_length' => 'Deskripsi minimal harus memiliki panjang 5 karakter.'

            ],
        ],
        'LokasiFile' => [
            'rules' => 'uploaded[LokasiFile]|max_size[LokasiFile,5120]|mime_in[LokasiFile,image/png,image/jpg,image/jpeg]',
            'errors' => [
                'uploaded' => 'Pilih gambar untuk diunggah.',
                'max_size' => 'Ukuran gambar tidak boleh lebih dari 5 MB.',
                'mime_in' => 'Format gambar yang diperbolehkan: png, jpg, jpeg.'
            ],
        ],
    ];

    public $register = [
        'username' => [
            'rules' => 'required|min_length[3]|alpha|is_unique[user.username]',
            'errors' => [
                'required' => 'Username wajib diisi.',
                'min_length' => 'Username minimal harus memiliki panjang 3 karakter.',
                'alpha' => 'Username harus berupa huruf tanpa angka.',
                'is_unique' => 'Username sudah digunakan. Harap pilih username yang lain.'
            ],
        ],
        // 'password' => [
        //     'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/]',
        //     'errors' => [
        //         'required' => 'Password wajib diisi.',
        //         'min_length' => 'Password minimal harus memiliki panjang 8 karakter.',
        //         'regex_match' => 'Password harus mengandung setidaknya satu huruf kecil, satu huruf besar, satu angka, dan satu karakter khusus.'
        //     ],
        // ],
        'password' => [
            'rules' => 'required|min_length[6]', // Mengubah panjang minimum menjadi 6 karakter
            'errors' => [
                'required' => 'Password wajib diisi.',
                'min_length' => 'Password minimal harus memiliki panjang 6 karakter.' // Ubah pesan error agar sesuai dengan aturan baru
            ],
        ],
        
        'email' => [
            'rules' => 'required|valid_email|is_unique[user.email]',
            'errors' => [
                'required' => 'Email wajib diisi.',
                'valid_email' => 'Format email tidak valid.',
                'is_unique' => 'Email sudah digunakan. '
            ],
        ],
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat wajib diisi.'
            ],
        ],
        'NamaLengkap' => [
            'rules' => 'required|min_length[3]|regex_match[/^[a-zA-Z\s]*$/]',
            'errors' => [
                'required' => 'Nama Lengkap wajib diisi.',
                'min_length' => 'Nama Lengkap minimal harus memiliki panjang 3 karakter.',
                'regex_match' => 'Nama Lengkap tidak boleh mengandung simbol atau angka.'
            ],
        ],
        
    ];


    public $login = [
        'username' => [
            'rules' => 'required', // Aturan: Wajib diisi
            'errors' => [
                'required' => 'Username wajib diisi.',
            ],
        ],
        'password' => [
            'rules' => 'required', // Aturan: Wajib diisi
            'errors' => [
                'required' => 'Password wajib diisi.',
            ],
        ],
    ];


    public $album = [
        'NamaAlbum' => [
            'rules' => 'required|min_length[1]',
            'errors' => [
                'required' => 'Judul Album wajib diisi',
                'min_length' => 'Judul ALbum minimal 1 huruf'
            ],
        ],
        'deskripsi' => [
            'rules' => 'required|min_length[1]',
            'errors' => [
                'required' => 'Deskripsi Album wajib diisi',
                'min_length' => 'Deskripsi ALbum minimal 1 huruf'
            ],
        ]
    ];

    public $edit_album = [
        'NamaAlbum' => [
            'rules' => 'required|min_length[1]',
            'errors' => [
                'required' => 'Judul Album wajib diisi',
                'min_length' => 'Judul ALbum minimal 1 huruf'
            ],
        ],
        'deskripsi' => [
            'rules' => 'required|min_length[1]',
            'errors' => [
                'required' => 'Deskripsi Album wajib diisi',
                'min_length' => 'Deskripsi ALbum minimal 1 huruf'
            ],
        ]
    ];




    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
