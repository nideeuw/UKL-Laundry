<?php
include "header.php";
?>
    <h2 align=center>Laporan</h2>
    <h3>Transaksi</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>USER</th><th>MEMBER</th><th>JENIS PAKET</th>
                <th>TANGGAL</th><th>BATAS WAKTU</th><th>TANGGAL BAYAR</th><th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_transaksi=mysqli_query($conn,"SELECT t.id as t_id, m.nama as nama_member, t.tgl, t.batas_waktu, t.tgl_bayar, t.status, t.dibayar, u.nama as nama_kasir, p.jenis as paket, p.harga * d_t.qty as total FROM transaksi t, detil_transaksi d_t, paket p, member m, user u WHERE t.id_member = m.id AND t.id_user = u.id AND t.id = d_t.id_transaksi AND p.id = d_t.id_paket");
            $no=0;
            while($data_transaksi=mysqli_fetch_array($qry_transaksi)){
                $no++;?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$data_transaksi['nama_kasir']?></td>
                    <td><?=$data_transaksi['nama_member']?></td>
                    <td><?=$data_transaksi['paket']?></td>
                    <td><?=$data_transaksi['tgl']?></td>
                    <td><?=$data_transaksi['batas_waktu']?></td>
                    <td><?=$data_transaksi['tgl_bayar']?></td>
                    <td><?=$data_transaksi['status']?></td>

                </tr>
                <?php
            }
            ?>
        </tbody>
        </table>

        <h3>Member</h3>
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NAMA</th><th>ALAMAT</th>
                <th>JENIS KELAMIN</th><th>TELPON</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_member=mysqli_query($conn,"select * from member");
            $no=0;
            while($data_member=mysqli_fetch_array($qry_member)){
                $no++;?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$data_member['nama']?></td>
                    <td><?=$data_member['alamat']?></td>
                    <td><?=$data_member['jenis_kelamin']?></td>
                    <td><?=$data_member['tlp']?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        </table>

        <h3>Outlet</h3>
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NAMA CABANG</th><th>ALAMAT</th>
                <th>TELP</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_outlett=mysqli_query($conn,"select * from outlett");
            $no=0;
            while($data_outlett=mysqli_fetch_array($qry_outlett)){
                $no++;?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$data_outlett['cabang']?></td>
                    <td><?=$data_outlett['alamat']?></td>
                    <td><?=$data_outlett['telp']?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        </table>

        <h3>Paket</h3>
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NAMA PAKET</th><th>HARGA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_paket=mysqli_query($conn,"select * from paket");
            $no=0;
            while($data_paket=mysqli_fetch_array($qry_paket)){
                $no++;?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$data_paket['jenis']?></td>
                    <td><?=$data_paket['harga']?></td>
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