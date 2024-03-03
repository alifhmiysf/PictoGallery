<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="<?= base_url('/img/PI (3).png') ?>" rel="icon" type="image/png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('/custom/registerstyle.css') ?>">
  <link href="<?= base_url('/css/bootstrap.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&family=Prata&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">

  <title>PictoGallery</title>
</head>

<body>

  <header class="p-3 mb-3  navbar-light bg-primary mb-5">
    <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-start">
      <a href="<?= base_url('/') ?>" style="text-decoration: none;">
        <div style="display: flex; align-items: center;">
          <h1 style="font-family: 'Prata', serif; margin-right: 10px; color: white;">PI</h1>
          <p style="font-family: 'Open Sans', sans-serif; margin: 0; color: white; vertical-align: middle;">
            PictoGallery</p>
        </div>
      </a>

      <nav id="navmenu" class="navmenu justify-content-md-end">
        <ul style="list-style: none; display: flex; margin: 0;">
          <li style="margin-left: auto;"><a href="<?= base_url('/') ?>" class="active" style="color: white; text-decoration: none;">Home</a></li>
        </ul>
      </nav><!-- End Nav Menu -->
    </div>
  </header>



  <div class="container">
    <div class="row justify-content-md-center mb-5">
      <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
        <div class="bg-white p-4 p-md-5 rounded shadow-lg">
          <div class="row">
            <div class="col-12">
              <div class="text-center mb-5">
                <h2 class="text-center text-primary">REGISTER</h2>
              </div>
            </div>
          </div>
          <form action="<?= base_url('authcontroller/valid_register') ?>" method="post">

            <?php if (isset($email_sent) && $email_sent === true) : ?>
              <div class="alert alert-success" role="alert">
                Email berhasil dikirim! Silakan cek email Anda untuk instruksi lebih lanjut.
              </div>
            <?php endif; ?>

            <div class="row gy-3 gy-md-4 overflow-hidden justify-content-center">
              <div class="col-6">
                <div class="input-group border-0">
                  <p class="text-danger">
                    <?= isset($validation) ? $validation->showError('username') : '' ?>
                  </p>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control border-0" id="username" name="username" placeholder="Username" ">
                    <label for=" username">Username<span class="text-danger">*</span></label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="input-group border-0">
                  <p class="text-danger">
                    <?= isset($validation) ? $validation->showError('password') : '' ?>
                  </p>

                  <div class="form-floating mb-3">
                    <input type="password" class="form-control border-0" id="password" name="password" placeholder="Password">
                    <label for="password">Password<span class="text-danger">*</span></label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="input-group border-0">
                  <p class="text-danger">
                    <?= isset($validation) ? $validation->showError('alamat') : '' ?>
                  </p>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control border-0" id="alamat" name="alamat" placeholder="Alamat">
                    <label for="alamat">Alamat<span class="text-danger">*</span></label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="input-group border-0">
                  <p class="text-danger">
                    <?= isset($validation) ? $validation->showError('NamaLengkap') : '' ?>
                  </p>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control border-0" id="NamaLengkap" name="NamaLengkap" placeholder="Nama Lengkap">
                    <label for="NamaLengkap">Nama Lengkap<span class="text-danger">*</span></label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <p class="text-danger">
                  <?= isset($validation) ? $validation->showError('email') : '' ?>
                </p>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control border-0" id="email" name="email" placeholder="Email">
                  <label for="email">Email<span class="text-danger">*</span></label>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-6">
                  <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Register</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <div class="row">
            <div class="col-12">
              <hr class="mt-5 mb-4 border-secondary-subtle">
              <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                <p>Sudah mempunyai akun? <span><a href="/pictogallery/auth/login" class="link-secondary text-decoration-none text-primary">Login</a></span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="<?= base_url('/js/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>

</body>

</html>