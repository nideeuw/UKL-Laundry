<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SESSION['role']=="owner") {
        echo "<script>location.href='../login.php';</script>";
    }
    if($_GET['id']){
    include "../koneksi.php";
        $qry_dtl_transaksi = mysqli_query($conn, "delete from detil_transaksi where id_transaksi='".$_GET['id']."'");
        $qry_hapus=mysqli_query($conn,"delete from transaksi where id='".$_GET['id']."'");
            if($qry_hapus){
                echo "<script>alert('Sukses hapus transaksi');location.href='tampil_transaksi.php';</script>";
            } else {
                echo "<script>alert('Gagal hapus transaksi');location.href='tampil_transaksi.php';</script>";
            }
    }
?>