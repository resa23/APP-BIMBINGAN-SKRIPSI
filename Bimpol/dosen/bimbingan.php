<?php session_start();
if (!isset($_SESSION['id_dosen'])) {
    echo "<script>alert('Anda Belum Login !!');location='../index.php';</script>";
}


include_once("../pages/koneksi.php");

$email = $_SESSION['email'];
$query = "SELECT * FROM user INNER JOIN dosen ON user.id = dosen.id_user WHERE email = '$email'";
$res = $mysqli->query($query);
$data = $res->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> DOSEN </title>
    <link rel="icon" href="../assets/img/favicon.png">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-book-reader"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> BIMPOL </sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Beranda </span></a>
            </li>

            <!-- Nav Item - Persetujuan Skripsi -->
            <li class="nav-item active ">
                <a class="nav-link" href="bimbingan.php" style="color: gray;">
                    <i class="fas fa-book-reader" style="color: gray;"></i>
                    <span> bimbingan </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Profil -->
            <li class="nav-item active">
                <a class="nav-link" href="profil.php">
                    <i class="fas fa-user-alt"></i>
                    <span> Profil </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $data['nama']; ?></span>
                                <img class="img-profile rounded-circle" src="../assets/uploads/<?= $data['foto']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Data Mahasiswa Bimbingan
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> Nama </th>
                                            <th> Npm </th>
                                            <th> Tanggal Kirim </th>
                                            <th> Opsi </th>


                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                        $dosen_id = $_SESSION['id_dosen'];
                                        $result = $mysqli->query("SELECT *, laporan.id as laporan_id FROM user INNER JOIN mahasiswa ON user.id = mahasiswa.id_user INNER JOIN laporan ON mahasiswa.id = laporan.id_mhs WHERE id_dosen = '$dosen_id'");
                                        $sql = $result->fetch_all(MYSQLI_ASSOC);

                                        foreach ($sql as $laporan) {
                                        ?>


                                            <tr>
                                                <td> <?= $laporan['nama']; ?> </td>
                                                <td> <?= $laporan['npm']; ?> </td>
                                                <td> <?= $laporan['created_at']; ?> </td>

                                                <td>
                                                    <form action="download.php" method="POST" style="display: inline-block;">
                                                        <input type="hidden" name="download" value="<?= $laporan['laporan_id']; ?>">
                                                        <button class="btn btn-success" type="submit" name="unduh"> Download </button>
                                                    </form>

                                                    <?php

                                                    if ($laporan['pesan'] != "") {  ?>

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" disabled>
                                                            Pesan
                                                        </button>
                                                        <i style="color: red;" class="fas fa-check-circle"></i>
                                                        SUDAH DI CEK !

                                                    <?php } else { ?>


                                                        <!-- Button trigger modal -->

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Pesan
                                                        </button>

                                                    <?php } ?>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"> Pesan dan Penilaian </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="input-group">
                                                                        <form action="pesan.php" method="POST">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"> Pesan</span>
                                                                            </div>
                                                                            <input type="hidden" name="id_laporan" value="<?= $laporan['laporan_id']; ?>">
                                                                            <textarea class="form-control" name="pesan" aria-label="With textarea"></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> batal </button>
                                                                    <button type="submit" class="btn btn-primary" name="kirim"> kirim </button>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="..//pages/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>