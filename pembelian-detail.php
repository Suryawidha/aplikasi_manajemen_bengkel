<?php  include "header.php"; ?>
<?php include'connection.php' ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-2">
		  	<?php
			include_once 'sidebar.php';
			?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-10">
	<ol class="breadcrumb">
	  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
	  <li class="active"><span class="fa fa-wrench"></span> Data Service</li>
	</ol>
<form method="post">
    <div class="row">
        <div class="col-md-6 text-left">
            <strong style="font-size:18pt;"><span class="fa fa-wrench"></span> Data Service</strong>
        </div>
        <div class="col-md-6 text-right">
            <button type="button" onclick="location.href='pembelianbaru.php'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Transaksi</button>
        </div>
    </div>
    <br/>
    <table width="100%" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th width="10px">No</th>
                <th>No Nota</th>
               <th>Id Sparepart</th>
                <th>Sparepart</th>
                <th>Harga Sparepart</th>
                <th>Banyaknya (qty)</th>
                <th>Subtotal</th>
                <th>Tanggal</th>
            </tr>
        </thead>
    <tbody>
    <?php
$sementara = mysqli_query($connection, "SELECT * from b_pembelian");
$no=1;  
while($row=mysqli_fetch_array($sementara)){
 ?>  
            <tr>
            <td style="vertical-align:middle;"><?php echo $no++ ?></td>
            <td style="vertical-align:middle;"><?php echo $row['no_nota'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['id_sparepart'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['sparepart'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['harga'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['qty'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['subtotal']?></td>
            <td style="vertical-align:middle;"><?php echo $row['tgl_beli'] ?></td>
            </tr>
  <?php } ?> 
        </tbody>
    </table>  
    </form> 
</div>
</div>	
<?php include "footer.php" ;?>
