<?php include 'connection.php';

	//$id_sparepart = $_POST['id_sparepart'];
	//$qty = $_POST['qty'];
	//$subtotal = $_POST['subtotal'];
	$no_nota = $_POST['no_nota'];
	$tgl_beli = $_POST['tgl_beli'];
	$harga_jasa2 = $_POST['harga_jasa2'];
	$total = $_POST['total'];
	$bayar2 = $_POST['bayar2'];
	$kembali = $_POST['kembali'];
	$nama_mekanik = $_POST['nama_mekanik'];
	$jumlah = $_POST['jumlah'];


	$query = "INSERT INTO b_transaksi SET no_nota = '$no_nota' , tgl_beli = '$tgl_beli' , jumlah = '$jumlah' , harga_jasa = '$harga_jasa2' , nama_mekanik = '$nama_mekanik' , total = '$total' , bayar = '$bayar2' , kembali = '$kembali'";
	mysqli_query($connection, $query);

	$pembelian = "INSERT INTO b_pembelian SELECT * FROM b_penjualansementara";
	mysqli_query($connection, $pembelian);

	$delete = "DELETE FROM b_penjualansementara";
	mysqli_query($connection, $delete);
	header("location:pembelianbaru.php");

 ?>