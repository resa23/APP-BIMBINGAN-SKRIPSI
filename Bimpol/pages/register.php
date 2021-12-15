<?php
session_start();
if (isset($_SESSION['id_mhs'])) {
    header('Location: mahasiswa/index.php');
} else if (isset($_SESSION['id_dosen'])) {
    header('Location: dosen/index.php');
}

include_once("config.php");

?>

<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="../assets/img/favicon.png">
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- My fonts  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chela+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <style>
        nav {
            font-family: 'Chela One', cursive;
        }

        form label,
        form h4 {
            font-family: 'Balsamiq Sans', cursive;
        }
    </style>


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" style="margin-left: 100px;" href="#"> B I M P O L </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">

                        <a class="nav-link active" style="margin-left:700px;" aria-current="page" href="<?php echo BASE_URL ?>"> HOME </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL ?>#login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <form enctype="multipart/form-data" action="register-submit.php" method="post">
                    <div class="mb-3">
                        <h4>Register</h4>
                    </div>
                    <div class="form-group">
                        <label for="role">Pilih Role</label>
                        <select class="form-control role" id="role" name="role">
                            <option value="1">Mahasiswa</option>
                            <option value="2">Dosen</option>
                        </select>
                    </div>
                    <div class="form-group npm">
                        <label for="npm">NPM</label>
                        <input type="text" class="form-control" id="npm" placeholder="NPM" name="npm">
                    </div>
                    <div class="form-group nip" style="display: none;">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
                    </div>
                    <div class="form-group jurusan">
                        <label for="Jurusan"> Jurusan </label>
                        <input type="text" class="form-control" id="jurusan" placeholder="jurusan" name="jurusan">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <input type="file" name="foto" id="foto">

                    <button type="submit" class="btn btn-primary mt-3" name="daftar">Daftar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
        $('.role').on('change', function() {
            var role = $('.role').val();
            if (role == "1") {
                $('.nip').css("display", "none");
                $('.npm').css("display", "block");
                $('.jurusan').css("display", "block");
            } else {
                $('.nip').css("display", "block");
                $('.npm').css("display", "none");
                $('.jurusan').css("display", "none");
            }
        });
    </script>
</body>

</html>