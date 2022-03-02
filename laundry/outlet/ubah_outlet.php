<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	if ($_SESSION['role']=="kasir") {
		echo "<script>location.href='../login.php';</script>";
	} elseif ($_SESSION['role']=="owner") {
		echo "<script>location.href='../login.php';</script>";
	}

	include "../koneksi.php";
	$id_outlet=$_GET['id_outlet'];
	$query=mysqli_query($conn,"select * from outlett where id_outlet=$id_outlet");
	$dt_outlett=mysqli_fetch_array($query);
	?>
	<h3>Ubah Outlet</h3>
	<table id="table" style="border: 0px;">
	<form action="proses_ubah_outlet.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_outlet" value="<?=$dt_outlett['id_outlet']?>">
	<tr><td>

	Nama Cabang :</td><td>
		<input type="text" name="cabang" value="<?=$dt_outlett['cabang']?>" class="form-control">
</td><td>
	<tr><td>

	Alamat :</td><td>
		<input type="text" name="alamat" value="<?=$dt_outlett['alamat']?>" class="form-control">
</td><td>
	<tr><td>

	Telp :</td><td>
		<input type="text" name="telp" value="<?=$dt_outlett['telp']?>" class="form-control">
</td><td>
	<tr><td>

	<input type="submit" name="simpan" value="Ubah Data Outlet" class="btn btn-primary">
</td></tr>
	</form>
</table>