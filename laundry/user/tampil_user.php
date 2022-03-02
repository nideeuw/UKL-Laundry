<?php
include "../header.php";
    if ($_SESSION['role']=="kasir") {
        echo "<script>location.href='../login.php';</script>";
    } elseif ($_SESSION['role']=="owner") {
        echo "<script>location.href='../login.php';</script>";
    }
?>


    <h3 align=center>Tampil User</h3>
    <li class="nav-item">
    <a
    href="tambah_user.php" class="btn btn-secondary">Tambah</a>
    </li>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NAMA</th><th>USERNAME</th>
                <th>PASSWORD</th><th>ROLE</th><th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../koneksi.php";
            $qry_user=mysqli_query($conn,"select * from user");
            $no=0;
            while($data_user=mysqli_fetch_array($qry_user)){
                $no++;?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$data_user['nama']?></td>
                    <td><?=$data_user['username']?></td>
                    <td><?=$data_user['password']?></td>
                    <td><?=$data_user['role']?></td>

                    <td><a
                    href="ubah_user.php?id=<?=$data_user['id']?>" class="btn btn-success">Ubah</a> | <a
                    href="hapus_user.php?id=<?=$data_user['id']?>"
                    onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>