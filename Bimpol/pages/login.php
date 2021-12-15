<?php
include_once('koneksi.php');

if (isset($_POST['tbl_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query1 = "SELECT *, user.id as user_id, dosen.id as dosen_id FROM user INNER JOIN dosen ON user.id = dosen.id_user WHERE email = '$email' AND pass = '$password'";
    $query2 = "SELECT *, user.id as user_id, mahasiswa.id as mhs_id FROM user INNER JOIN mahasiswa ON user.id = mahasiswa.id_user WHERE email = '$email' AND pass = '$password'";

    $res1 = $mysqli->query($query1);
    $res2 = $mysqli->query($query2);

    if ($res1->num_rows > 0) {
        $row = $res1->fetch_assoc();
        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['id_dosen'] = $row['dosen_id'];
        echo "<script>alert('Login Berhasil !');location='../dosen/index.php'</script>";
    } else if ($res2->num_rows > 0) {
        $row = $res2->fetch_assoc();
        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['id_mhs'] = $row['mhs_id'];
        echo "<script>alert('Login Berhasil !');location='../mahasiswa/index.php'</script>";
    } else {
        echo "<script>alert('Email atau Password Salah !');location='../index.php'</script>";
    }
}
