<?php date_default_timezone_set('Asia/Jakarta'); ?>
<?php
include "includes/config.php";
session_start();
if(!isset($_SESSION['nama_pengguna'])){
	echo "<script>location.href='login.php'</script>";
}
$config = new Config();
$db = $config->getConnection();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>MOTOR MABUR</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!--<link href="css/jquery1.dataTables.min.css" rel="stylesheet">-->
    <link type="text/css" href="css/jquery.toastmessage.css" rel="stylesheet"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="shortcut icon" href="images/racing.png" type="icon"/>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dataTables.min.js1"></script>
	<script src="js/jquery.maskMoney.min.js"></script>
  </head>
  <body>
  
	<nav class="aku navbar navbar-default navbar-static-top">
	  <div class="container-fluid">
		
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">MOTOR MABUR</a>
		  <a class="navbar-brand"><span><?php
/* script menentukan hari */  

 $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
 $hr = $array_hr[date('N')];
/* script menentukan tanggal */   
$tgl= date('j');
/* script menentukan bulan */
  $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
  $bln = $array_bln[date('n')];
/* script menentukan tahun */ 
$thn = date('Y');
/* script perintah keluaran*/ 
 echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " " . date('H:i');
 ?>  </span>
 </a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="profil.php"><?php echo $_SESSION['nama_pengguna'] ?></a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="profil.php"><span class="fa fa-user"></span> Profil</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="logout.php"><span class="fa fa-sign-out"></span> Logout</a></li>
			  </ul>
			</li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
  
    <div class="container-fluid">