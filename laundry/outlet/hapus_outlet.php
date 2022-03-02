<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SESSION['role']=="kasir") {
        echo "<script>location.href='../login.php';</script>";
    } elseif ($_SESSION['role']=="owner") {
        echo "<script>location.href='../login.php';</script>";
    }

    if($_GET['id_outlet']){
    include "../koneksi.php";
        $qry_hapus=mysqli_query($conn,"delete from outlett where id_outlet='".$_GET['id_outlet']."'");
            if($qry_hapus){
                echo "<script>alert('Sukses hapus cabang');location.href='tampil_outlet.php';</script>";
            } else {
                echo "<script>alert('Gagal hapus cabang');location.href='tampil_outlet.php';</script>";
            }
    }
?>