<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['role']=="owner") {
    echo "<script>location.href='../login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title></title>
    <style>
      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-floating:focus-within {
        z-index: 2;
      }
      .form-signin input[type="nama"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="alamat"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .form-signin input[type="jenis_kelamin"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .form-signin input[type="tlp"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
    <main class="form-signin">
        <h3 class="text-center">Tambah Transaksi</h3>
        <form action="tambah_transaksi.php" method="get">
            Jumlah Transaksi :
            <div class="d-flex">
                <input type="number" name="total_paket" id="total_paket" class="form-control" value="<?=$_GET['total_paket'] ? $_GET['total_paket'] : 1  ?>" min="1" />
                <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
        </form>
        <form action="proses_tambah_transaksi.php" method="post">
        User :
        <input type="text" name="id_user" value="<?=$_SESSION['nama']?>" class="form-control" disabled>
        <input type="hidden" name="id_user" value="<?=$_SESSION['id']?>" class="form-control">
            Member :
            <select name="id_member" class="form-control">
                <option></option>
                <?php
                
                include "../koneksi.php";
                $qry_member=mysqli_query($conn,"select * from member");
                while($data_member=mysqli_fetch_array($qry_member)){
                    echo '<option value="'.$data_member['id'].'">'.$data_member['nama'].'</option>';
                }
                ?>
                </select>
            
            Tanggal :
            <input type="date" name="tgl" value="" class="form-control">
    
            Batas Waktu :
            <input type="date" name="batas_waktu" value="" class="form-control">
    
            Tanggal Bayar :
            <input type="date" name="tgl_bayar" value="" class="form-control">
            
            Status :
            <select name="status" class="form-control">
                <option></option>
                <option value="baru">Baru</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
                <option value="diambil">Diambil</option>
            </select>
            
            Dibayar :
            <select name="dibayar" class="form-control">
                <option></option>
                <option value="dibayar">dibayar</option>
                <option value="belum_dibayar">belum dibayar</option>
            </select>
            
            <?php for($index = 0; $index < ($_GET['total_paket'] ? $_GET['total_paket'] : 1); $index++) : ?>
                Jenis Paket :
                <select name="id_paket[]" class="form-control">
                    <option></option>
                    <?php
                    
                    include "../koneksi.php";
                    $qry_paket=mysqli_query($conn,"select * from paket");
                    while($data_paket=mysqli_fetch_array($qry_paket)){
                        echo '<option value="'.$data_paket['id'].'">'.$data_paket['jenis'].'-'.$data_paket['harga'].'</option>';
                    }
                    ?>
                    </select>
                    
                    QTY :
                    <input type="text" name="qty[]" value="" class="form-control">
            <?php endfor; ?>
            <input type="submit" name="simpan" value="Tambah" class="btn btn-primary">
        </form>
    </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous"></script>
    </body>
    </html>