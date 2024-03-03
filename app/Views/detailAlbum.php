<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?= base_url('/img/PI (3).png') ?>" rel="icon" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('/custom/berandastyle.css') ?>">
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
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>

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
                        <a href="<?= base_url('/pictogallery/album') ?>" class="nav-link text-light">Album</a>
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


    <!-- Di dalam view detailAlbum -->
    <?php if (isset($emptyAlbumMessage)) : ?>
        <div class="alert alert-info" role="alert">
            <?= $emptyAlbumMessage ?>
        </div>
    <?php endif; ?>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($detailFotoAlbum as $row) : ?>
                <div class="col">
                    <div class="card">
                        <img src="<?= base_url('uploads/' . $row['LokasiFile']); ?>" class="card-img-top" style="height: 300px; background-size: cover" alt="..." data-bs-toggle="modal" data-bs-target="#myModal<?= $row['idfoto'] ?>" />
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php foreach ($detailFotoAlbum as $row) : ?>
        <!-- Modals -->
        <div class="modal fade" id="myModal<?= $row['idfoto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $row['idfoto'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Left column for text -->
                                    <img src="<?= base_url('uploads/' . $row['LokasiFile']); ?>" class="img-fluid mb-5" alt="Image 1" />
                                    <div class="position-absolute bottom-0 start-0 mb-1 ms-4 mt-3 d-flex align-items-center ">
                                        <form action="<?= site_url('LikeController/like/' . $row['idfoto']) ?>" method="post" class="mr-2">
                                            <button type="submit" class="btn btn-light">
                                                <i class="fas fa-thumbs-up"></i>
                                                <?= $row['JumlahLike'] ?>
                                            </button>
                                        </form>
                                        <form action="<?= site_url('LikeController/unlike/' . $row['idfoto']) ?>" method="post" class="mr-2">
                                            <button type="submit" class="btn btn-light ms-2">
                                                <i class="fas fa-thumbs-down"></i> <!-- Icon untuk unlike -->
                                                Unlike
                                            </button>
                                        </form>


                                    </div>
                                </div>






                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="confirmDeleteModal<?= $row['idfoto'] ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel<?= $row['idfoto'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel<?= $row['idfoto'] ?>">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus foto ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form method="post" action="/album/hapusFotoDariAlbum">
                                                    <input type="hidden" name="id_foto" value="<?= $row['idfoto'] ?>">
                                                    <input type="hidden" name="id_album" value="<?= $album['idalbum'] ?>">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <!-- Right column for image -->
                                    <h1 class="text-center"><?= $row['Judul'] ?></h1>
                                    <p><?= $row['Deskripsi'] ?></p>
                                    <div class="border p-3 mb-2" style="max-height: 200px; overflow-y: auto;">
                                        <?php foreach ($komen as $comment) : ?>
                                            <?php if ($comment['foto_id'] == $row['idfoto']) : ?>
                                                <div class="d-flex align-items-start mb-3 position-relative">
                                                    <?php foreach ($userk as $userItem) : ?>
                                                        <?php if ($userItem['id'] == $comment['user_id']) : ?>
                                                            <img src="<?= base_url() . $userItem['profile_photo'] ?>" style="width: 60px; height: 60px; border-radius: 50%;" class="mr-3" alt="">
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <div class="mb-4">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <?php foreach ($userk as $userItem) : ?>
                                                                <?php if ($userItem['id'] == $comment['user_id']) : ?>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $userItem['username'] ?></p>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                            <?php if ($comment['user_id'] == session()->get('id')) : ?>
                                                                <button class="btn btn-transparent position-absolute end-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 0; background-color: transparent;">
                                                                    <i class="fas fa-ellipsis-h" style="color: black;"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: white;">
                                                                    <!-- Link untuk memunculkan modal edit -->
                                                                    <li><a class="dropdown-item" href="<?= $comment['komentar_id'] ?>" data-bs-toggle="modal" data-bs-target="#editModal<?= $comment['komentar_id'] ?>">Edit</a></li>
                                                                    <!-- Link untuk memunculkan modal hapus -->
                                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $comment['komentar_id'] ?>">Delete</a></li>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </div>
                                                        <!-- Memanjangkan div komentar ke bawah jika konten terlalu panjang -->
                                                        <div style="max-width: 400px; word-wrap: break-word;">
                                                            <p style="margin-top: -8px; margin-left: 20px;">
                                                                <?= $comment['isi_komentar'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                    <?php if (!empty($komen)) : ?>
                                        <?php foreach ($komen as $comment) : ?>
                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal<?= $comment['komentar_id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $comment['komentar_id'] ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel<?= $comment['komentar_id'] ?>">Edit Komentar</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form untuk mengedit komentar -->
                                                            <form action="<?= base_url('comment/update/' . $comment['komentar_id']) ?>" method="post">
                                                                <div class="mb-3">
                                                                    <label for="editCommentInput" class="form-label">Komentar Baru</label>
                                                                    <textarea class="form-control" id="editCommentInput" name="commentInput" rows="3" required><?= $comment['isi_komentar'] ?></textarea>
                                                                </div>
                                                                <input type="hidden" name="commentId" id="editCommentId">
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <!-- Modal Delete -->
                                    <?php if (!empty($komen)) : ?>
                                        <?php foreach ($komen as $comment) : ?>
                                            <div class="modal fade" id="deleteModal<?= $comment['komentar_id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $comment['komentar_id'] ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel<?= $comment['komentar_id'] ?>">Hapus Komentar</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Konfirmasi penghapusan komentar -->
                                                            <p>Apakah Anda yakin ingin menghapus komentar ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- Form untuk menghapus komentar -->
                                                            <form action="<?= base_url('comment/delete/' . $comment['komentar_id']) ?>" method="post">
                                                                <input type="hidden" name="commentId" id="deleteCommentId">
                                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>


                                    <form id="commentForm" action="<?= site_url('comment/create/' . $row['idfoto']) ?>" method="post">
                                        <div class="input-group mb-5">
                                            <input type="text" class="form-control" placeholder="Add a Comment" id="commentInput" name="commentInput" required />
                                            <button class="btn btn-primary " type="submit" id="submitBtn">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </form>


                                    <button type="button" class="btn btn-danger position-absolute bottom-0 end-0 mb-3 me-3" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?= $row['idfoto'] ?>">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>






    <script src="<?= base_url('/js/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
</body>

</html>