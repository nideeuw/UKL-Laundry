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

    if (empty($tgl)) {
        echo "<script>alert ('tanggal tidak boleh kosong');
        location.href='tambah_transaksi.php';</script>";
    } elseif (empty($batas_waktu)) {
        echo "<script>alert ('batas_waktu tidak boleh kosong');
        location.href='tambah_transaksi.php';</script>";
    } elseif (empty($tgl_bayar)) {
        echo "<script>alert ('tanggal bayar tidak boleh kosong');
        location.href='tambah_transaksi.php';</script>";
    } else {
        include "../koneksi.php";
        $insert=mysqli_query($conn, "insert into transaksi (id_user, id_member, tgl, batas_waktu, tgl_bayar, status, dibayar)
        value ('".$id_user."','".$id_member."','".$tgl."','".$batas_waktu."', '".$tgl_bayar."','".$status."','".$dibayar."')") or die(mysqli_error($conn));

        $id_transaksi = mysqli_insert_id($conn);

        for($i=0; $i<count($qty); $i++){
            $insert=mysqli_query($conn, "insert into detil_transaksi (id_transaksi, id_paket, qty) value ('".$id_transaksi."','".$id_paket[$i]."','".$qty[$i]."')") or die(mysqli_error($conn));
        }
        if ($insert) {
            echo "<script>alert ('Sukses menambahkan transaksi'); location.href='tampil_transaksi.php';</script>";
        } else {
            echo "<script>alert ('Gagal menambahkan transaksi'); location.href='tambah_transaksi.php';</script>";
        }
    }
}
?>