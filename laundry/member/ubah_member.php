<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	if ($_SESSION['role']=="owner") {
		echo "<script>location.href='../login.php';</script>";
	}

	include "../koneksi.php";
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from member where id=$id");
	$dt_member=mysqli_fetch_array($query);
	?>
	<h3>Ubah Member</h3>
	<table id="table" style="border: 0px;">
	<form action="proses_ubah_member.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$dt_member['id']?>">
	<tr><td>

	Nama :</td><td>
		<input type="text" name="nama" value="<?=$dt_member['nama']?>" class="form-control">
</td><td>
	<tr><td>

	Alamat :</td><td>
		<input type="text" name="alamat" value="<?=$dt_member['alamat']?>" class="form-control"></td>
        <td>
	<tr><td>

    Jenis Kelamin :</td><td>
            <select name="jenis_kelamin" class="form-control">
                <option></option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
</td><td>
	<tr><td>

    Telpon :</td><td>
		<input type="text" name="tlp" value="<?=$dt_member['tlp']?>" class="form-control">
</td><td>
	<tr><td>

	<input type="submit" name="simpan" value="Ubah Data Member" class="btn btn-primary">
</td></tr>
	</form>
</table>