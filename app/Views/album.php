<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?= base_url('/img/PI (3).png') ?>" rel="icon" type="image/png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('/custom/albumstyle.css') ?>">
  <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
  <link href="<?= base_url('/css/all.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
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
    /* Contoh CSS untuk font dan warna */
    body {
      font-family: "Open Sans", sans-serif;
      color: #333;
      /* Warna teks */
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Mulish", sans-serif;
      color: #333;
      /* Warna judul */
    }

    .navbar-light {
      background-color: #007bff;
      /* Warna latar navbar */
    }

    .btn-primary {
      background-color: #007bff;
      /* Warna latar tombol primary */
      border-color: #007bff;
      /* Warna border tombol primary */
      color: #fff;
      /* Warna teks tombol primary */
    }

    /* Contoh CSS untuk Navbar */
    .navbar-light {
      background-color: #007bff;
    }

    .navbar-light .navbar-brand,
    .navbar-light .navbar-nav .nav-link {
      color: #fff;
    }

    .navbar-light .navbar-nav .nav-link:hover {
      color: #0056b3;
    }

    .navbar-light .navbar-nav .nav-item.dropdown:hover .dropdown-menu {
      display: block;
    }



    .atas,
    .header-atas {
      background-color: white;
      border: 0;
      /* Mengatur warna latar belakang menjadi putih dan menghilangkan border luar card */
    }

    /* Desktop Navigation Custom Styles */
    @media (min-width: 1024px) {
      .d-flex .navmenu {
        margin-left: auto;
      }
    }


    .ButtonUnggah button {
      background-color: #007bff;
      /* Warna latar belakang */
      color: #ffffff;
      /* Warna teks */
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: transform 0.2s ease, background-color 0.2s ease;
    }

    .ButtonUnggah button:hover {
      transform: translateY(-3px);
      /* Tombol naik sedikit ketika dihover */
      background-color: #063f9c;
      /* Warna latar belakang berubah menjadi hitam */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Efek bayangan saat dihover */
    }

    /* Gaya untuk latar belakang modal */
    .modal-content {
      background-color: #ffffff;
      /* Warna latar belakang tetap putih */
      border-radius: 10px;
      /* Sudut melengkung */
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      /* Bayangan */
    }

    /* Gaya untuk header modal */


    /* Gaya untuk tombol close */
    .btn-close {
      color: #ffffff;
      /* Warna ikon close */
    }

    /* Gaya untuk tombol 'Batal' */
    .btn-secondary {
      background-color: #6c757d;
      /* Warna latar belakang */
      border-color: #6c757d;
      /* Warna border */
    }

    /* Gaya untuk tombol 'Simpan' */
    .btn-primary {
      background-color: #007bff;
      /* Warna latar belakang */
      border-color: #007bff;
      /* Warna border */
    }

    .cardtab2 {
      transition: box-shadow 0.3s;
    }

    .cardtab2:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transform: translateY(-5px);
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

  <div class="ButtonUnggah ms-4 mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAlbumModal">
      Tambah Album
    </button>
  </div>

  <!-- Modal Tambah Album -->
  <div class="modal fade" id="tambahAlbumModal" tabindex="-1" aria-labelledby="tambahAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-light text-light">
          <h5 class="modal-title" id="tambahAlbumModalLabel">Tambah Album</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger" role="alert">
              <?php foreach (session('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
              <?php endforeach ?>
            </div>
          <?php endif ?>
          <form id="formTambahAlbum" method="POST" action="<?= site_url('tambah-album') ?>">
            <div class="mb-3">
              <label for="namaAlbum" class="form-label">Nama Album</label>
              <input type="text" class="form-control" id="namaAlbum" name="namaAlbum" placeholder="Masukkan nama album" value="<?= old('namaAlbum') ?>">
            </div>
            <div class="mb-3">
              <label for="deskripsiAlbum" class="form-label">Deskripsi Album</label>
              <textarea class="form-control" id="deskripsiAlbum" name="deskripsiAlbum" rows="3" placeholder="Masukkan deskripsi album"><?= old('deskripsiAlbum') ?></textarea>
            </div>
            <!-- Tambahkan input lainnya sesuai kebutuhan -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" form="formTambahAlbum" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  </div>




  <div class="card text-center atas">
    <div class="card-header  header-atas">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="true" href="#" id="tab1">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="tab2">Unggahan</a>
        </li>
      </ul>
    </div>
    <div class="card-body">

      <!-- TAB 1 -->
      <div id="contentTab1">
        <div class="container">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($album as $albumItem) : ?>
              <div class="col">
                <div class="card position-relative ">
                  <div class="card-body">
                    <h5 class="card-title"><?= $albumItem['NamaAlbum'] ?></h5>
                    <p class="card-text"><?= $albumItem['deskripsi'] ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <a href="<?= base_url('pictogallery/album/detail/' . $albumItem['idalbum']) ?>" class="btn btn-primary">
                        <i class="fas fa-info-circle"></i> Detail
                      </a>
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $albumItem['idalbum'] ?>">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $albumItem['idalbum'] ?>">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

        </div>
      </div>

      <!-- Modal untuk edit -->
      <?php foreach ($album as $albumItem) : ?>
        <div class="modal fade" id="editModal<?= $albumItem['idalbum'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $albumItem['idalbum'] ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?= $albumItem['idalbum'] ?>">Edit Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="/album/editalbum" method="post">
                  <?php if (session()->has('edit_album_errors')) : ?>
                    <div class="alert alert-danger" role="alert">

                      <?php foreach (session('edit_album_errors') as $error) : ?>
                        <?= esc($error) ?>
                      <?php endforeach ?>

                    </div>
                  <?php endif ?>

                  <div class="mb-3">
                    <label for="editNamaAlbum<?= $albumItem['idalbum'] ?>" class="form-label">Nama Album</label>
                    <input type="text" class="form-control" id="editNamaAlbum<?= $albumItem['idalbum'] ?>" name="edit_nama_album" value="<?= $albumItem['NamaAlbum'] ?>" placeholder="Masukkan nama album">
                  </div>
                  <div class="mb-3">
                    <label for="editDeskripsiAlbum<?= $albumItem['idalbum'] ?>" class="form-label">Deskripsi Album</label>
                    <textarea class="form-control" id="editDeskripsiAlbum<?= $albumItem['idalbum'] ?>" name="edit_deskripsi_album" rows="3" placeholder="Masukkan deskripsi album"><?= $albumItem['deskripsi'] ?></textarea>
                  </div>
                  <input type="hidden" name="album_id" value="<?= $albumItem['idalbum'] ?>">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- Modal untuk hapus -->
      <?php foreach ($album as $albumItem) : ?>
        <div class="modal fade" id="deleteModal<?= $albumItem['idalbum'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $albumItem['idalbum'] ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel<?= $albumItem['idalbum'] ?>">Hapus Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus album ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="/album/delete/<?= $albumItem['idalbum'] ?>" type="button" class="btn btn-danger">Hapus</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- END TAB 1-->







      <!-- TAB 2 -->
      <div id="contentTab2" style="display: none">

        <!-- konten -->

        <div class="container mt-4">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($dataf as $row) : ?>
              <div class="col">
                <div class="card cardtab2 position-relative">
                  <img src="<?= base_url('uploads/' . $row['LokasiFile']); ?>" class="card-img-top" style="height: 300px; background-size: cover" alt="..." data-bs-toggle="modal" data-bs-target="#myModal<?= $row['idfoto'] ?>" />
                  <a data-bs-toggle="modal" href="#exampleModalToggle<?= $row['idfoto'] ?>" role="button">
                    <i class="fas fa-ellipsis-h position-absolute end-0 top-0 p-3" style="color: black;"></i>
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>



          <?php foreach ($dataf as $row) : ?>

            <!-- Modals -->
            <div class="modal fade" id="myModal<?= $row['idfoto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $row['idfoto'] ?>" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6">
                          <!-- Left column for text -->
                          <img src="<?= base_url('uploads/' . $row['LokasiFile']); ?>" class="img-fluid mb-5" alt="Image 1" />
                          <div class="position-absolute bottom-0 start-0 mb-1 ms-4 mt-3 d-flex align-items-center">
                            <form action="<?= site_url('LikeController/like/' . $row['idfoto']) ?>" method="post" class="mr-2">
                              <button type="submit" class="btn btn-light">
                                <i class="fas fa-thumbs-up"></i>
                                <?= $row['JumlahLike'] ?>
                              </button>
                            </form>
                            <form action="<?= site_url('LikeController/unlike/' . $row['idfoto']) ?>" method="post" class="mr-2">
                              <button type="submit" class="btn btn-light">
                                <i class="fas fa-thumbs-down"></i> <!-- Icon untuk unlike -->
                                Unlike
                              </button>
                            </form>
                            <button type="button" class="btn btn-light mr-2" data-bs-toggle="modal" data-bs-target="#saveModal<?= $row['idfoto'] ?>">
                              <i class="fas fa-save"></i> Save
                            </button>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <!-- Right column for image -->
                          <h1 class="text-center"><?= $row['Judul'] ?></h1>
                          <p><?= $row['Deskripsi'] ?></p>

                          <!-- Komentar -->
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
                                      <button class="btn btn-transparent position-absolute end-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 0; background-color: transparent;">
                                        <i class="fas fa-ellipsis-h" style="color: black;"></i>
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: white;">
                                        <!-- Link untuk memunculkan modal edit -->
                                        <li><a class="dropdown-item" href="<?= $comment['komentar_id'] ?>" data-bs-toggle="modal" data-bs-target="#editModal<?= $comment['komentar_id'] ?>">Edit</a></li>
                                        <!-- Link untuk memunculkan modal hapus -->
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $comment['komentar_id'] ?>">Delete</a></li>

                                      </ul>
                                    </div>
                                    <!-- Memanjangkan div komentar ke bawah jika konten terlalu panjang -->
                                    <div style="max-width: 400px; word-wrap: break-word;">
                                      <p style="margin-top: -8px; margin-left: 20px;">
                                        <?= $comment['isi_komentar'] ?>
                                      </p>
                                    </div>
                                  </div>
                                </div>


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


                                <!-- Modal Delete -->
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
                              <?php endif; ?>
                            <?php endforeach; ?>
                            <!-- akhir konten -->
                          </div>
                          <!-- End Komentar -->

                          <form id="commentForm" action="<?= site_url('comment/create/' . $row['idfoto']) ?>" method="post">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Add a Comment" id="commentInput" name="commentInput" required />
                              <button class="btn btn-primary" type="submit" id="submitBtn">
                                <i class="fas fa-paper-plane"></i>
                              </button>
                            </div>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="modal fade" id="saveModal<?= $row['idfoto'] ?>" tabindex="-1" aria-labelledby="saveModalLabel<?= $row['idfoto'] ?>" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <i class="fas fa-save"></i>
                    <h5 class="modal-title ms-2" id="saveModalLabel<?= $row['idfoto'] ?>">Simpan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <div class="row row-cols-2 row-cols-md-4 g-4">
                      <?php foreach ($album as $h) : ?>
                        <div class="col-12 mb-3">
                          <div class="card">
                            <div class="card-body">
                              <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0"><?= $h['NamaAlbum'] ?></h5>
                                <form action="/simpan-foto" method="POST" class="ms-2">
                                  <input type="hidden" name="idAlbum" value="<?= $h['idalbum'] ?>">
                                  <input type="hidden" name="idFoto" value="<?= $row['idfoto'] ?>">
                                  <button type="submit" class="btn btn-primary">Simpan ke Album</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <?php foreach ($datafoto as $row) : ?>
          <!-- Modal 1 -->
          <div class="modal fade" id="exampleModalToggle<?= $row['idfoto'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel<?= $row['idfoto'] ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header border-0">
                  <h5 class="modal-title" id="exampleModalToggleLabel<?= $row['idfoto'] ?>">Detail Unggahan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <img src="<?= base_url('uploads/' . $row['LokasiFile']); ?>" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="mb-3">
                        <h3><?= $row['Judul'] ?></h3>
                      </div>
                      <div class="mb-3 mt-4 text-lg-start text-start">
                        <p><?= $row['Deskripsi'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer border-0">
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalToggle2<?= $row['idfoto'] ?>" data-bs-dismiss="modal">Edit</button>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModals<?= $row['idfoto'] ?>">Hapus</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Modal 1 -->

          <!-- Modal 2 -->
          <div class="modal fade" id="exampleModalToggle2<?= $row['idfoto'] ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2<?= $row['idfoto'] ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header border-0">
                  <h5 class="modal-title " id="exampleModalToggleLabel2<?= $row['idfoto'] ?>">Edit Unggahan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                  <form action="<?= site_url('postcontroller/update/' . $row['idfoto']) ?>" method="post" enctype="multipart/form-data">


                    <input type="hidden" name="idfoto" value="<?= $row['idfoto'] ?>">

                    <div class="row">
                      <div class="col-md-12 mb-3 text-start">
                        <?= isset($validation) ? $validation->showError('judul') : '' ?>
                        <label for="judul" class="form-label ">
                          <h1>Judul</h1>
                        </label>
                        <input type="text" name="judul" class="form-control input-sm" style="max-width: 100%;" value="<?= $row['Judul'] ?>" required>

                      </div>
                      <div class="col-md-12 mb-3 text-start">
                        <?= isset($validation) ? $validation->showError('deskripsi') : '' ?>
                        <label for="deskripsi" class="form-label text-left">
                          <h1>Deskripsi</h1>
                        </label>
                        <textarea name="deskripsi" class="form-control input-sm" style="max-width: 100%;" required><?= $row['Deskripsi'] ?></textarea>

                      </div>
                      <div class="col-md-12 mb-3 text-start rounded-5">
                        <img src="<?= base_url('uploads/' . $row['LokasiFile']); ?>" class="card-img-top mb-4" style="width: 200px; height: 200px; background-size: cover" alt="...">
                        <input type="file" name="LokasiFile" class="form-control input-sm" style="max-width: 100%;">
                      </div>
                    </div>
                    <div class="modal-footer border-0">
                      <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer border-0">
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle<?= $row['idfoto'] ?>" data-bs-dismiss="modal">kembali</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Modal 2 -->

          <!-- Modal Hapus -->
          <div class="modal fade" id="hapusModals<?= $row['idfoto'] ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?= $row['idfoto'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header border-0">
                  <h5 class="modal-title" id="hapusModalLabel<?= $row['idfoto'] ?>">Hapus Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete this data?</p>
                </div>
                <div class="modal-footer border-0">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <a type="button" class="btn btn-danger" href="<?= site_url('postcontroller/hapus/' . $row['idfoto']) ?>">Delete</a>

                </div>
              </div>
            </div>
          </div>
          <!-- End Modal Hapus -->
        <?php endforeach; ?>













        <script src="<?= base_url('/custom/albumscript.js') ?>"></script>
        <script src="<?= base_url('/js/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
</body>

</html>