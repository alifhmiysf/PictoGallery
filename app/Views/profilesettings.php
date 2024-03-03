<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?= base_url('/img/PI (3).png') ?>" rel="icon" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('/custom/profilestyle.css') ?>">
    <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&family=Prata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <title>PictoGallery</title>
</head>

<body>

    <header class="p-3 navbar-light bg-primary ">

        <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">
            <a href="<?= base_url('/pictogallery/homepage') ?>" style="text-decoration: none;">
                <div style="display: flex; align-items: center;">
                    <h1 style="font-family: 'Prata', serif; margin-right: 10px; color: white;">PI</h1>
                    <p style="font-family: 'Open Sans', sans-serif; margin: 0; color: white; vertical-align: middle;">
                        PictoGallery</p>
                </div>
            </a>

            <nav id="navmenu" class="navmenu justify-content-md-end">
                <ul class="list-unstyled d-flex align-items-center m-0">
                    <li class="nav-item" style="color: white;">
                        <a href="<?= base_url('/pictogallery/homepage') ?>" class="nav-link text-light">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                                <img src="<?= base_url() . $user['profile_photo'] ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="<?= base_url('/pictogallery/profile') ?>">Profile</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/pictogallery/auth/signOut') ?>">Sign out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('success') ?>
        </div>
    <?php endif; ?>
    <div class="container profile-section mb-3 mt-5">
        <h1 class="text-center mt-3 mb-3 judul">Pengaturan Profile</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/edit-account" enctype="multipart/form-data" method="post">
                    <!-- Field lainnya -->
                    <!-- Di dalam file view Anda -->
                    <?php if (session()->has('errors')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <!-- Looping pesan kesalahan validasi -->
                                <?php foreach (session('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mt-4 text-center text-md-start"> <!-- Menambah kelas untuk mengatur posisi foto di tengah pada tampilan mobile -->
                            <img class="rounded-circle border border-4" style="width: 150px; height: 150px;" src="<?= base_url() . $user['profile_photo'] ?>" alt="Profile Photo">
                        </div>
                        <div class="col-6 mt-5">
                            <label for="profile-photo" class="form-label">Ganti Foto Profil</label>
                            <input type="file" class="form-control" id="profile-photo" name="profile_photo">
                        </div>

                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control border custom-input" value="<?= $user['username'] ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="fullname" class="form-label">Nama Lengkap</label>
                            <input type="text" id="fullname" name="fullname" class="form-control border custom-input" value="<?= $user['NamaLengkap'] ?>">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea type="text" name="address" id="address" cols="10" rows="10" class="form-control border custom-input"><?= $user['alamat'] ?></textarea>
                        </div>

                        <div class="col-md-6 mt-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control border custom-input mb-3" value="<?= $user['email'] ?>">
                        </div>
                    </div>
                    <!-- Tombol Simpan -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changePasswordModal<?= $user['id'] ?>">
                        Ganti Password
                    </button>
                    <button type="submit" class="btn btn-primary">Simpan Ubahan</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="changePasswordModal<?= $user['id'] ?>" tabindex="-1" aria-labelledby="changePasswordModalLabel<?= $user['id'] ?>" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel<?= $user['id'] ?>">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/update-password" method="POST">

                    <!-- Di bagian view, misalnya pada halaman profil -->
                    <?php if (session()->has('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session('error') ?>
                        </div>
                    <?php endif; ?>



                    <!-- Input tersembunyi untuk ID pengguna -->
                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="new-password" class="col-form-label">Password Baru:</label>
                            <input type="password" class="form-control" id="new-password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="col-form-label">Konfirmasi Password:</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>




    <script src="<?= base_url('/js/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
</body>

</html>