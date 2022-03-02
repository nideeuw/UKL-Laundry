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
	$query=mysqli_query($conn,"select * from user where id=$id");
	$dt_user=mysqli_fetch_array($query);
	?>
	<h3>Ubah User</h3>
	<table id="table" style="border: 0px;">
	<form action="proses_ubah_user.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$dt_user['id']?>">
	<tr><td>

	Nama :</td><td>
		<input type="text" name="nama" value="<?=$dt_user['nama']?>" class="form-control">
</td><td>
	<tr><td>

	Username :</td><td>
		<input type="text" name="username" value="<?=$dt_user['username']?>" class="form-control">
</td><td>
	<tr><td>

	Password :</td><td>
		<input type="password" name="password" value="<?=$dt_user['password']?>" class="form-control">
</td><td>
	<tr><td>

    Role :</td><td>
            <select name="role" class="form-control">
                <option></option>
                <option value="admin">admin</option>
                <option value="kasir">kasir</option>
                <option value="owner">owner</option>
            </select>
</td><td>
	<tr><td>

	<input type="submit" name="simpan" value="Ubah Data User" class="btn btn-primary">
</td></tr>
	</form>
</table>