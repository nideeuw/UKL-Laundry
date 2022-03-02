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
    $jenis=$_POST['jenis'];
    $harga=$_POST['harga'];

    if(empty($jenis)){
        echo "<script>alert('pilihan paket tidak boleh kosong');
        location.href='tambah_paket.php';</script>";
    } elseif (empty($harga)) {
        echo "<script>alert('harga tidak boleh kosong');
        location.href='tambah_paket.php';</script>";
    } else {
        include "../koneksi.php";

        $insert=mysqli_query($conn, "insert into paket (jenis,harga) value ('".$jenis."','".$harga."')");
        if ($insert) {
            echo "<script>alert('Sukses menambahkan paket');
            location.href='tampil_paket.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan paket');location.href='tambah_paket.php';</script>";
        }
    }
}
?>