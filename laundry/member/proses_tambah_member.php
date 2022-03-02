<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SESSION['role']=="owner") {
        echo "<script>location.href='../login.php';</script>";
    }

if ($_POST) {
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $tlp=$_POST['tlp'];

    if(empty($nama || $alamat || $jenis_kelamin || $tlp)){
        echo "<script>alert('Semua Data Harap Diisi! Silakan Isi Dengan Benar!');
        location.href='tambah_member.php';</script>";
    } else {
        include "../koneksi.php";

        $insert=mysqli_query($conn, "insert into member (nama,alamat,jenis_kelamin,tlp) value ('".$nama."','".$alamat."','".$jenis_kelamin."','".$tlp."')");

        if ($insert) {
            echo "<script>alert('Sukses menambahkan member');
            location.href='tampil_member.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan member'); location.href='tambah_member.php';</script>";
        }
    }
}
?>