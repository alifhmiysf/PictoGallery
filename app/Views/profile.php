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

    <header class="p-3 mb-3 navbar-light bg-primary mb-5">

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



    <div class="container text-center mt-5">
        <div class="profile-picture">
            <img class="rounded-circle border border-4" style="width: 250px; height: 250px;" src="<?= base_url() . $user['profile_photo'] ?>" alt="Profile Photo">
        </div>
        <div class="profile-info mt-3">
            <h3 class="profile-name"><?= $user['NamaLengkap'] ?></h3>
            <p class="profile-username"><?= $user['username'] ?></p>
            <div class="mt-3">
                <a href="<?= base_url('/pictogallery/profile-settings') ?>" class="btn btn-primary">Lihat Profil</a>
            </div>
        </div>
    </div>




    <!-- Garis -->
    <hr class="my-4">

    <!-- Card Section -->
    <!-- Card Section -->
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php if ($fotomodel) : ?>
                <?php foreach ($fotomodel as $mf) : ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= base_url('uploads/' . $mf['LokasiFile']); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $mf['Judul'] ?></h5>
                                <p class="card-text"><?= $mf['Deskripsi'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center">Tidak ada foto yang ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>







    <script src="<?= base_url('/js/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
</body>

</html>