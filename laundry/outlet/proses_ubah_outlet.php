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
    $id_outlet=$_POST['id_outlet'];
    $cabang=$_POST['cabang'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];

    if (empty($cabang)) {
        echo "<script>alert('nama cabang tidak boleh kosong');location.href='tampil_outlet.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('alamat tidak boleh kosong');location.href='tampil_outlet.php';</script>";
    } elseif (empty($telp)) {
        echo "<script>alert('telp tidak boleh kosong');location.href='tampil_outlet.php';</script>";
    } else {
        include "../koneksi.php";
        
            $update=mysqli_query($conn, "update outlett set cabang='".$cabang."',alamat='".$alamat."',telp='".$telp."' where id_outlet = '".$id_outlet."' ");
            if ($update) {
                echo "<script>alert('Sukses update outlet');location.href='tampil_outlet.php';</script>";
            } else {
                echo "<script>alert('Gagal update outlet');location.href='tampil_outlet.php';</script>";
            }
    }
}
?>