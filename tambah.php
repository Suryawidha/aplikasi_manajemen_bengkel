<?php include 'connection.php';
	$no_nota = $_POST['no_nota'];
	$id_sparepart = $_POST['id_sparepart'];
	$qty = $_POST['qty'];
	$subtotal = $_POST['subtotal'];
	$sparepart = $_POST['sparepart'];
	$tgl_beli = $_POST['tgl_beli'];
	$harga = $_POST['harga'];

//alert
$cekdata="select id_sparepart from b_penjualansementara where id_sparepart='$id_sparepart'";
$ada=mysqli_query($connection, $cekdata)or die (mysql_error());
if (mysqli_num_rows($ada)>0)
{
	echo '<script language="javascript">
		alert ("Ngapunten Bosku !! Data dobel")
		window.location="pembelianbaru.php";
		</script>';
		exit();
}
else
{
	$query = "INSERT INTO b_penjualansementara SET no_nota = '$no_nota' , tgl_beli = '$tgl_beli', id_sparepart = '$id_sparepart', qty = '$qty', subtotal = '$subtotal', sparepart = '$sparepart' , harga = '$harga'";
	mysqli_query($connection, $query);
//update
	mysqli_query($connection,"UPDATE b_sparepart set stock = stock - $qty where id_sparepart = '$id_sparepart'");
	header("location:pembelianbaru.php");
}	
 ?>