<?php

include_once("../pages/koneksi.php");
include_once("../pages/config.php");

if (isset($_POST['hapus'])) {
    $laporan = $_POST['id_laporan'];
    $query = "DELETE FROM laporan WHERE id ='$laporan'";
    $res = $mysqli->query($query);
    if ($res) {
        echo "<script>alert('File Berhasil Dihapus!');location='" . BASE_URL . "mahasiswa/persetujuan.php'</script>";
    } else {
        echo "<script>alert(' FILE GAGAL DIHAPUS ! ');location='" . BASE_URL . "mahasiswa/persetujuan.php'</script>";
    }
}
