<?php
session_start();
if (isset($_SESSION['id_mhs'])) {
  header('Location: mahasiswa/index.php');
} else if (isset($_SESSION['id_dosen'])) {
  header('Location: dosen/index.php');
}



include_once("pages/config.php");


?>
<!doctype html>
<html lang="en">

<head>
  <link rel="icon" href="assets/img/favicon.png">
  <title> B I M P O L </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- my css -->
  <link rel="stylesheet" href="assets/css/styles.css">

  <!-- My Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Chela+One&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
  <style>
    nav,
    .hero {
      font-family: 'Chela One', cursive;

    }

    .hero {
      text-shadow: 2px 2px black;
    }

    h3,
    h4 {
      font-family: 'Balsamiq Sans', cursive;
    }

    .col-centered {
      display: inline-block;
      float: none;
      /* reset the text-align */
      text-align: left;
      /* inline-block space fix */
      margin-right: -4px;
      text-align: center;
    }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
      <a class="navbar-brand" style="margin-left: 50px;" href="#"> B I M P O L</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">

            <a class="nav-link active" style="margin-left:700px;" aria-current="page" href="#"> HOME </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>pages/register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div id="carouselExampleCaptions" class="carousel slide hero" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/gambar2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Selamat Datang Di Bimbingan Online Poltekpos</h5>
          <p>Sistem Bimbingan Skripsi Online ini dapat digunakan oleh mahasiswa dan dosen , untuk mempermudah proses bimbingan skripsi.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/gambar4.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Selamat Datang Di Bimbingan Online Poltekpos</h5>
          <p>Sistem Bimbingan Skripsi Online ini dapat digunakan oleh mahasiswa dan dosen , untuk mempermudah proses bimbingan skripsi.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/siswa2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Selamat Datang Di Bimbingan Online Poltekpos</h5>
          <p>Sistem Bimbingan Skripsi Online ini dapat digunakan oleh mahasiswa dan dosen , untuk mempermudah proses bimbingan skripsi.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container mb-5 mt-5" id="login">
    <div class="row justify-content-center">
      <div class="col col-centered">
        <h3>LOGIN</h3>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col col-centered">
        <h4>SILAKAN LOGIN TERLEBIH DAHULU</h4>

      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-4 bg-warning justify-content-center pb-5">
        <div class="row">
          <h1><i class="bi bi-people-fill mx-auto pl-3"></i></h1>

        </div>
        <div class="row">
          <div class="container">
            <form action="pages/login.php" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>

              <button type="submit" class="btn btn-primary" name="tbl_login">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>