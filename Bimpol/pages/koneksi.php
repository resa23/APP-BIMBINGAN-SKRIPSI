<?php
$mysqli = new mysqli("localhost", "root", "", "bimbingan_skripsi");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
