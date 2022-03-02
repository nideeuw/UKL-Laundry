<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SESSION['role']=="kasir") {
        echo "<script>location.href='../login.php';</script>";
    } elseif ($_SESSION['role']=="owner") {
        echo "<script>location.href='../login.php';</script>";
    }

if ($_POST) {
    $id=$_POST['id'];
    $jenis=$_POST['jenis'];
    $harga=$_POST['harga'];

    if (empty($jenis)) {
        echo "<script>alert('pilihan jenis paket tidak boleh kosong');location.href='tampil_paket.php';</script>";
    } elseif (empty($harga)) {
        echo "<script>alert('harga tidak boleh kosong');location.href='tampil_paket.php';</script>";
    } else {
        include "../koneksi.php";
            $update=mysqli_query($conn, "update paket set jenis='".$jenis."',harga='".$harga."' where id = '".$id."' ");
            if ($update) {
                echo "<script>alert('Sukses update paket');location.href='tampil_paket.php';</script>";
            } else {
                echo "<script>alert('Gagal update paket');location.href='tampil_paket.php';</script>";
            }
    }
}
?>