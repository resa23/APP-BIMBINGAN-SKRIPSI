<?php

include_once("../pages/koneksi.php");
include_once("../pages/config.php");

if (isset($_POST['unggah'])) {
    $id_dosen = $_POST['id_dosen'];
    $id_mhs = $_POST['id_mhs'];

    //FILE LAPORAN 

    $targetDir = "../assets/laporan/";
    $fileName = basename($_FILES['uploadLaporan']['name']);
    $temp = explode(".", $fileName);
    $newFileName = uniqid() . "." . end($temp);
    $targetFilePath = $targetDir . $newFileName;

    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowsTypes = array('pdf', 'docx', 'doc');

    date_default_timezone_set('Asia/Bangkok');
    $datetime = date_create()->format('Y-m-d H:i:s');


    if (in_array($fileType, $allowsTypes)) {

        if (move_uploaded_file($_FILES["uploadLaporan"]["tmp_name"], $targetFilePath)) {
            $query = "INSERT INTO laporan(file, created_at, id_mhs, id_dosen, pesan)  VALUES ('$newFileName' , '$datetime' , '$id_mhs' , '$id_dosen', '')";
            $res = $mysqli->query($query);
            if ($res) {
                echo "<script>alert(' Upload File Berhasil ');location='" . BASE_URL . "mahasiswa/Datadosen.php';</script>";
            } else {
                echo "<script>alert(' Terjadi Kesalahan. harap hubungi administrator ! ');windows.history.back();</script>";
            }
        }
    } else {
        echo "<script>alert(' Tipe File Tidak Sesuai.');windows.history.back();</script>";
    }
}
