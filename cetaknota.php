<?php include 'connection.php' ?>
<!--<php
	date_default_timezone_set("Asia/Jakarta");
	$sqltrans = mysql_query("SELECT * FROM b_trasaksi") or die(mysql_error());
	$tra = mysql_fetch_assoc($sqltrans);
?>-->
<!DOCTYPE html>
<html>
<head>
	<title>Nota</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<script>window.print()</script>
<div class="container">
<div class="col-md-11">
<h3 style="padding-bottom:0;margin-bottom:0;"><b>MOTOR MABUR</b></h3>
<div class="row">
	<div class="col-md-6">Jl. Jalan-jalan Kemana, Biar Anda Tidak Stres. No 69<br>
		Telp. (0741) 670523
	</div>
	<div class="col-md-6">
		<span class="colspan-right">
		Menyediakan : Spare Part Sepeda Motor, Asesoris, Payung, Martabak, Gorengan, Kopi, dll<br>
		Melayani : Jasa Servis & , Pemasangan Asesoris, Modifikasi, Pres body, dll.</span>
	</div>
</div>
<div style="border-bottom:3px solid #ccc;"></div>
<center><h4><b>KWITANSI PEMBAYARAN</b></h4></center>
<?php
$no_nota = $_GET['no_nota'];
$trans = mysqli_query($connection, "SELECT * from b_transaksi where no_nota='$no_nota'");
$nota = mysqli_fetch_array($trans);
$tgl_beli = $nota['tgl_beli'];
?>
<div class="col-md-12">
<div class="row">
<div class="col-md-6">
	<p><b>NO Transaksi : <?php echo $nota['no_nota'] ?></b></p>
	<p><b>Tanggal : <?php echo $nota['tgl_beli'] ?></b></p>
</div>
<div class="col-md-6">
	<p><b>Mekanik : <?php echo $nota['nama_mekanik'] ?></b></p>	
</div>
</div>
</div>
<br>
	<div style='height:5px;'></div>
<?php 
$no_nota = $_GET['no_nota'];
$trans = mysqli_query($connection, "select b_transaksi.no_nota,b_pembelian.id_sparepart,b_sparepart.sparepart,b_pembelian.harga,b_pembelian.qty,b_pembelian.subtotal from b_pembelian,b_transaksi,b_sparepart where b_transaksi.no_nota=b_pembelian.no_nota and b_sparepart.id_sparepart=b_pembelian.id_sparepart and b_pembelian.no_nota='$no_nota'");
$no = 1;
?>
	<table class="table">
		<thead>
		 <tr>
                <th width="10px">No</th>
               	<th>Id Sparepart</th>
                <th>Sparepart</th>
				<th>Harga Sparepart</th>
				<th>Banyaknya (qty)</th>
				<th>Subtotal</th>
            </tr>
		</thead>
<?php
while($row=mysqli_fetch_array($trans)){
 ?>
		<tbody>
 
            <tr>
            <td style="vertical-align:middle;"><?php echo $no++ ?></td>
            <td style="vertical-align:middle;"><?php echo $row['id_sparepart'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['sparepart'] ?></td>
			<td style="vertical-align:middle;"><?php echo number_format($row['harga']) ?></td>
			<td style="vertical-align:middle;"><?php echo $row['qty'] ?></td>
			<td style="vertical-align:middle;"><?php echo number_format($row['subtotal'])?></td>
            </tr>
  <?php } ?> 
		</tbody>
<?php
$tr= mysqli_fetch_array(mysqli_query($connection, "SELECT * from b_transaksi where no_nota='$no_nota'"));
 ?>  
		<tfoot rules="none">
		<tr>
			<td colspan='5' style="text-align:right;">Total Harga</b></td>
			<td>Rp.<?php echo number_format($tr['jumlah'])?></td>
		</tr>
		<tr rules="none">
			<td colspan='5' style="text-align:right;">Biaya Jasa</td>
			<td>Rp.<?php echo number_format($tr['harga_jasa'])?></td>
		</tr>
		<tr>
			<td colspan='5' style="text-align:right;"><b>Total Bayar</b></td>
			<td><b>Rp.<?php echo number_format($tr['total'])?></b></td>
		</tr>
		<tr>
			<td colspan='5' style="text-align:right;"><b>Pembayaran</b></td>
			<td><b>Rp.<?php echo number_format($tr['bayar'])?></b></td>
		</tr>
		<tr>
			<td colspan='5' style="text-align:right;"><b>Kembali</b></td>
			<td><b>Rp.<?php echo number_format($tr['kembali'])?></b></td>
		</tr>
		</tfoot>
	</table>
<br>
<div style="border-bottom:3px solid #ccc;"></div>
<br>
<div class="col-md-12">
<div class="row">
	<div class="col-md-3">
		<br>
		<p>Tanda Terima,</p>
		<br>
		<br>
		<p>( _________________________ )</p>
	</div>
	<div class="col-md-3">
		<p>Yogyakarta,
		<br>Hormat Kami,</p>
		<br>
		<br>
		<p>( _________________________ )</p>
	</div>
	<div cclass="col-md-4" style="font-size:10px;text-align:justify;">
				<p>* Barang yang sudah dibeli tidak dapat dikembalikan(Syarat dan ketentuan berlaku).</p>
				<p>* Sepeda Motor yang diservice, apabila tidak diambil dalam jangka 3 bulan, resiko kehilangan bukan menjadi tanggung jawab kami.</p>
	</div>
</div>
</div>
</div>
</div>
</body>
</html>