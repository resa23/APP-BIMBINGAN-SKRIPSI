<?php

include_once("../pages/koneksi.php");
include_once("../pages/config.php");

if (isset($_POST['unduh'])) {

    $laporan = $_POST['download'];
    $query = "SELECT *, laporan.id as id_laporan FROM mahasiswa INNER JOIN laporan ON mahasiswa.id = laporan.id_mhs WHERE laporan.id = '$laporan'";
    $res = $mysqli->query($query);

    if ($res) {
        $data = $res->fetch_assoc();
        $file = "../assets/laporan/" . $data['file'];
        $temp = explode(".", $data['file']);
        $name = "../assets/laporan/" . $data['npm'] . "_bimbingan." . end($temp);



        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($name) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }
}
