<?php

include ("connect.php");

// Mengambil data dari formulir
$nama = $_POST['nama'];
$jeniskelamin = $_POST['jeniskelamin'];
$usia = $_POST['usia'];
$email = $_POST['email'];

// Menyimpan data ke dalam database
$sql = "INSERT INTO visitor (nama, jeniskelamin, usia, email) VALUES ('$nama', '$jeniskelamin', '$usia', '$email')";

if ($conn->query($sql) === TRUE) {
    header("Location: home.php"); 
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
