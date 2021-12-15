<?php

include_once("../pages/koneksi.php");
include_once("../pages/config.php");

if (isset($_POST['kirim'])) {
    $laporan = $_POST['id_laporan'];
    $isi = $_POST['pesan'];
    $query = "UPDATE laporan SET pesan ='$isi' WHERE id ='$laporan'";
    $res = $mysqli->query($query);

    if ($res) {
        echo "<script>alert(' BERHASIL DIKIRIM ! ');location='" . BASE_URL . "dosen/bimbingan.php'</script>";
    } else {
        echo "<script>alert(' GAGAL DIKIRIM ! ');location='" . BASE_URL . "dosen/bimbingan.php'</script>";
    }
}
