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
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from paket where id=$id");
	$dt=mysqli_fetch_array($query);
	?>
	<h3>Ubah Paket</h3>
	<table id="table" style="border: 0px;">
	<form action="proses_ubah_paket.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$dt['id']?>">
	<tr><td>

	Nama Paket :</td><td>
            <select name="jenis" class="form-control">
                <option></option>
                <option value="kiloan">kiloan</option>
                <option value="selimut">selimut</option>
                <option value="bed_cover">bed_cover</option>
                <option value="kaos">kaos</option>
            </select>
</td><td>
	<tr><td>

	Harga :</td><td>
		<input type="text" name="harga" value="<?=$dt['harga']?>" class="form-control">
</td><td>
	<tr><td>

	<input type="submit" name="simpan" value="Ubah Data Paket" class="btn btn-primary">
</td></tr>
	</form>
</table>