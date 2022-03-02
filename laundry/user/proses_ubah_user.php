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
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    if (empty($nama)) {
        echo "<script>alert('nama tidak boleh kosong');location.href='tampil_user.php';</script>";
    } elseif (empty($role)) {
        echo "<script>alert('role tidak boleh kosong');location.href='tampil_user.php';</script>";
    } else {
        include "../koneksi.php";
            $update=mysqli_query($conn, "update user set nama='".$nama."',username='".$username."',password='".md5($password)."',role='".$role."' where id = '".$id."' ");
            
            if ($update) {
                echo "<script>alert('Sukses update user');location.href='tampil_user.php';</script>";
            } else {
                echo "<script>alert('Gagal update user');location.href='tampil_user.php';</script>";
            }
    }
}
?>