<?php
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['role']=="owner") {
    echo "<script>location.href='../login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title></title>
</head>
<body>
<h3>Tambah Member</h3>
		<form action="proses_tambah_member.php" method="post">
			Nama :

			<input type="text" name="nama" class="form-control">

			Alamat :
			<input type="text" name="alamat" class="form-control">
			
            Jenis :
            <select name="jenis_kelamin" class="form-control">
                <option selected disabled>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            Telp :
            <input type="text" name="tlp" value="" class="form-control">
			<input type="submit" value="Tambah member" class="btn btn-primary">
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous">
		</script>
</body>
</html>