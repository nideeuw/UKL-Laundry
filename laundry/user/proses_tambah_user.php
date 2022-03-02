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
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');
        location.href='tambah_user.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');
        location.href='tambah_user.php';</script>";
    } else {
        include "../koneksi.php";

        $insert=mysqli_query($conn, "insert into user (nama,username,password,role) value ('".$nama."','".$username."','".md5($password)."','".$role."')");

        if ($insert) {
            echo "<script>alert('Sukses menambahkan user');
            location.href='tampil_user.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan user');
            location.href='tambah_user.php';</script>";
        }
    }
}
?>