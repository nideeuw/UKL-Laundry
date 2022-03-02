<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SESSION['role']=="kasir") {
        echo "<script>location.href='../login.php';</script>";
    } elseif ($_SESSION['role']=="owner") {
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
<h3>Tambah paket</h3>
		<form action="proses_tambah_paket.php" method="post" enctype="multipart/form-data">
			Nama paket :

			<select name="jenis" class="form-control">
                <option></option>
                <option value="kiloan">kiloan</option>
                <option value="selimut">selimut</option>
                <option value="bed_cover">bed_cover</option>
                <option value="kaos">kaos</option>
            </select>

            Harga :
            <input type="int" name="harga" value="" class="form-control">

			<input type="submit" name="simpan" value="Tambah paket" class="btn btn-primary">
		</form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"crossorigin="anonymous">
		</script>
</body>
</html>