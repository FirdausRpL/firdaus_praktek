<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['userid'])) {
    //Untuk bisa like harus login dulu
    header("location:index.php");
} else {
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];
    //Cek apakah user sudah pernah like foto ini apa belum

    $ceksuka = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid' and userid='$userid'");

    if (mysqli_num_rows($ceksuka) == 1) {
        while ($row = mysqli_fetch_array($ceksuka)) {
            $likeid = $row['likeid'];
            mysqli_query($conn, "delete from likefoto where likeid='$likeid'");
            header("location:home.php");
        }
    } else {
        $tanggallike = date("Y-m-d");
        mysqli_query($conn, "insert into likefoto values('','$fotoid','$userid','$tanggallike')");
        header("location:home.php");
    }
}
