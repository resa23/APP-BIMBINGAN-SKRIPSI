<?php
include_once('koneksi.php');

if (isset($_POST['daftar'])) {


    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $npm = $_POST['npm'];
    $nip = $_POST['nip'];
    $jurusan = $_POST['jurusan'];

    if (($npm == "" || $npm == null) && ($nip == "" || $nip == null)) {
        echo "<script>alert(' Tolong isi NPM atau NIP anda ! .');location='register.php'</script>";
        die;
    }
    if (($jurusan == "" || $jurusan == null) && ($nip == "" || $nip == null)) {
        echo "<script>alert(' Tolong isi Jurusan anda ! .');location='register.php'</script>";
        die;
    }
    if ($nama == "" || $nama == null) {
        echo "<script>alert(' Tolong isi nama anda ! .');location='register.php'</script>";
        die;
    }

    if ($email == "" || $email == null) {
        echo "<script>alert(' Tolong isi email anda ! .');location='register.php'</script>";
        die;
    }
    if ($password == "" || $password == null) {
        echo "<script>alert(' Tolong isi password anda ! .');location='register.php'</script>";
        die;
    }



    // Upload Foto Profil  //

    $targetDir = "../assets/uploads/";
    if ($_FILES['foto']['size'] == 0) {
        // foto is empty (and not an error)
        $newFileName = "default.png";
        $targetFilePath = $targetDir . $newFileName;
    } else {
        $fileName = basename($_FILES["foto"]["name"]);
        $temp = explode(".", $fileName);
        $newFileName = uniqid() . "." . end($temp);
        $targetFilePath = $targetDir . $newFileName;
        move_uploaded_file($_FILES['foto']['tmp_name'], $targetFilePath);
    }

    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg');

    if (in_array($fileType, $allowTypes)) {
        // Upload file to server

        $query1 = "INSERT INTO user(nama , email , pass , foto) VALUES('$nama', '$email', '$password', '$newFileName')";

        $res1 = $mysqli->query($query1);

        if (!$res1) {
            echo "<script>alert('Akun sudah pernah dibuat! Silahkan gunakan yang lain .');location='register.php'</script>";
        }

        if ($npm != "") {

            $table = "mahasiswa";
            $query2 = "INSERT INTO $table(npm , jurusan , id_user) VALUES ( '$npm', '$jurusan', '$mysqli->insert_id')";
        } else if ($nip != "") {

            $table = "dosen";
            $query2 = "INSERT INTO $table(nip , id_user) VALUES ('$nip', '$mysqli->insert_id')";
        }

        $res2 = $mysqli->query($query2);

        if (!$res2) {
            $mysqli->query("DELETE FROM user WHERE id='$mysqli->insert_id'");
            echo "<script>alert('Akun sudah pernah dibuat! Silahkan gunakan yang lain .');location='register.php'</script>";
        } else {
            echo "<script>alert('Register telah selesai , silahkan login.');location='../index.php'</script>";
        }
    } else {
        echo "<script>alert('Tipe File Tidak Sesuai.');location='register.php'</script>";
    }
}
