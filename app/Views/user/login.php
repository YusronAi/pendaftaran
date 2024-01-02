<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap core CSS-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title><?php $title; ?></title>
</head>

<body class="body">
  <div class="container text-center">
    <form action="/auth" method="post">
      <div class="mb-md-5 mt-md-4 pb-3">

        <img class="mb-3
            " src="img/permata.png" alt="" style="width: 45%;">
        <h2 class="fw-bold mb-2 text-uppercase">RUMAH SAKIT PERMATA</h2>

        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-danger" style="color: blue;" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php endif; ?>

        <div class="form-outline form-white mb-4 text-center">
          <input type="text" name="username" id="typeEmailX" class="form-control form-control-lg" style="text-align: center; background-color: pink;" placeholder="USERNAME" />
        </div>

        <div class="form-outline form-white mb-4">
          <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" placeholder="PASSWORD" style="text-align: center; background-color: pink;" />
        </div>

        <button class="btn btn-outline-light btn-lg px-5" type="submit" style="background-color: pink;">Login</button>
      </div>

      <div class="text-center text-lg-start">
        <p class="small fw-bold pt-1 mb-0">Don't have an account? <a href="/registrasi" class="link-danger">Register</a></p>
      </div>
    </form>
  </div>
</body>

</html>