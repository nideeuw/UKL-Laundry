<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SESSION['role']=="owner") {
        echo "<script>location.href='../login.php';</script>";
    }

if ($_POST) {
    $id_user=$_POST['id_user'];
    $id_member=$_POST['id_member'];
    $tgl=$_POST['tgl'];
    $batas_waktu=$_POST['batas_waktu']; 
    $tgl_bayar=$_POST['tgl_bayar'];
    $status= $_POST['status'];
    $dibayar=$_POST['dibayar'];

    $id_paket =$_POST['id_paket'];
    $qty=$_POST['qty'];


    if (empty($id_paket)) {
        echo "<script>alert('pilihan jenis paket tidak boleh kosong');location.href='tampil_transaksi.php';</script>";
    } elseif (empty($status)) {
        echo "<script>alert('status tidak boleh kosong');location.href='tampil_transaksi.php';</script>";
    } else {
        include "../koneksi.php";
            $update=mysqli_query($conn, "update transaksi set id_member='".$id_member."',tgl='".$tgl."',batas_waktu='".$batas_waktu."',tgl_bayar='".$tgl_bayar."',status='".$status."',dibayar='".$dibayar."' where id = '".$id."' ");
            if ($update) {
                echo "<script>alert('Sukses update paket');location.href='tampil_transaksi.php';</script>";
            } else {
                echo "<script>alert('Gagal update paket');location.href='tampil_transaksi.php';</script>";
            }
    }
}
?>