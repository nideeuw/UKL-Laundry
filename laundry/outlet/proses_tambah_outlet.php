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
    $cabang=$_POST['cabang'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];

    if(empty($cabang)){
        echo "<script>alert('nama cabang tidak boleh kosong');
        location.href='tambah_outlet.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('alamat tidak boleh kosong');
        location.href='tambah_outlet.php';</script>";
    } else {
        include "../koneksi.php";

        $insert=mysqli_query($conn, "insert into outlett (cabang,alamat,telp) value ('".$cabang."','".$alamat."','".$telp."')");

        if ($insert) {
            echo "<script>alert('Sukses menambahkan outlet');
            location.href='tampil_outlet.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan outlet');
            location.href='tambah_outlet.php';</script>";
        }
    }
}
?>