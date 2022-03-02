<?php
	if (!isset($_SESSION)) {
		session_start();
	}

	if ($_SESSION['role']=="owner") {
		echo "<script>location.href='../login.php';</script>";
	}

	include "../koneksi.php";
	$id=$_GET['id'];
	$query_transaksi=mysqli_query($conn,"select * from transaksi where id=$id");
    $query_detil_transaksi=mysqli_query($conn,"select * from detil_transaksi where id_transaksi =$id");
	$dt_transaksi=mysqli_fetch_array($query_transaksi);
    $dt_detil_transaksi=mysqli_fetch_array($query_detil_transaksi);
	?>
	<h3>Ubah Transaksi</h3>
	<table id="table" style="border: 0px;">
		<form action="proses_ubah_transaksi.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$dt_transaksi['id']?>">
			<tr>
				<td>
    				Tanggal :
				</td>
				<td>
					<input type="date" name="tgl" value="<?=$dt_transaksi['tgl']?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
    				Batas Waktu :
				</td>
				<td>
					<input type="date" name="batas_waktu" value="<?=$dt_transaksi['batas_waktu']?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
    				Tanggal Bayar:
				</td>
				<td>
					<input type="date" name="tgl_bayar" value="<?=$dt_transaksi['tgl_bayar']?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					Status :
				</td>
				<td>
					<?php 
                        $arr_status=array('baru'=>'Baru','proses'=>'Proses', 'selesai'=>'Selesai', 'diambil'=>'Diambil');
                    ?>
					<select name="status" class="form-select">
						<option></option>
						<?php foreach ($arr_status as $key_status => $val_status):
                            	if($key_status==$dt_transaksi['status']){
                                    $selek="selected";
                                } else {
                                    $selek="";
                                }
                        ?>
                            <option value="<?=$key_status?>" <?=$selek?>><?=$val_status?></option>
                        <?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Dibayar :
				</td>
				<td>
					<?php 
                        $arr_payment=array('dibayar'=>'Lunas','belum_dibayar'=>'Belum Lunas');
                    ?>
					<select name="dibayar" class="form-control">
						<option></option>
						<?php foreach ($arr_payment as $key_payment => $val_payment):
                                if($key_payment==$dt_transaksi['dibayar']){
                                	$selek="selected";
                                } else {
                                	$selek="";
                                }
                        ?>
                            <option value="<?=$key_payment?>" <?=$selek?>><?=$val_payment?></option>
                        <?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Jenis Paket :
				</td>
				<td>
					<select name="id_paket" class="form-control">
						<option></option>
						<?php
						
						include "../koneksi.php";
						$qry_paket=mysqli_query($conn,"select * from paket");
						while($data_paket=mysqli_fetch_array($qry_paket)){
							echo '<option value="'.$data_paket['id'].'">'.$data_paket['jenis'].'-'.$data_paket['harga'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					QTY	:
				</td>
				<td>
					<input type="text" name="qty" value="<?=$dt_detil_transaksi['qty']?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="simpan" value="Ubah Data Paket" class="btn btn-primary">
				</td>
			</tr>
	</form>
</table>