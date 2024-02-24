<?php
include "koneksi.php";
session_start();

$judulfoto = $_POST['judulfoto'];
$deskripsifoto = $_POST['deskripsifoto'];
$albumid = $_POST['albumid'];
$tanggalunggah = date("Y-m-d");
$userid = $_SESSION['userid'];
$foto = $_FILES['lokasifile']['name'];
$tmp = $_FILES['lokasifile']['tmp_name'];
$lokasi = 'gambar/';
$namafoto = rand() . '-' . $foto;

move_uploaded_file($tmp, $lokasi . $namafoto);

$sql = mysqli_query($conn, "insert into foto values('','$judulfoto','$deskripsifoto','$tanggalunggah','$namafoto','$albumid','$userid')");

echo "<script> 
            alert('tambah data berhasil');
            location.href='foto.php';
            </script>";
