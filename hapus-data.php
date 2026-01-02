<?php 
include 'connection.php';

$qty=$_GET['qty'];
$id_sparepart = $_GET['id_sparepart'];

$dt=mysqli_query($connection, "SELECT * from b_penjualansementara where id_sparepart = '$id_sparepart'");
$data = mysqli_fetch_array($dt);
mysqli_query($connection, "UPDATE b_sparepart set stock = stock + $data[qty] where id_sparepart = '$id_sparepart'");

mysqli_query($connection, "DELETE from b_penjualansementara where id_sparepart = '$id_sparepart'");
header("location:pembelianbaru.php");
 ?>