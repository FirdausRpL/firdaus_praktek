<?php
include "koneksi.php";
session_start();

$albumid = $_GET['albumid'];

$sql = mysqli_query($conn, "delete from album where albumid='$albumid'");

if ($sql) {
    echo "<script> 
                    alert('hapus data berhasil');
                    location.href='album.php';
                    </script>";
} else {
    echo "<script> 
                    alert('hapus data tidak berhasil');
                    location.href='album.php';
                    </script>";
}
