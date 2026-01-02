<?php  include "header.php";

?>
<?php include'connection.php' ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-2">
<?php include_once 'sidebar.php'; ?>
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
            <button type="button" onclick="location.href='pembelian-detail.php'" class="btn btn-primary"><span class="fa fa-clone"></span> Detail Transaksi</button>
            <button type="button" onclick="location.href='pembelianbaru.php'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Transaksi</button>
        </div>
    </div>
    <br/>
    <table width="100%" class="table table-striped table-bordered" cellspacing="0" id="tabel">
        <thead>
            <tr>
                <th width="5px">no</th>
                <th>Tanggal</th>
                <th>No Nota</th>
                <th>Jumlah</th>
                <th>Nama Mekanik</th>
				<th>Biaya Jasa</th>
				<th>Total</th>
                <th>Bayar</th>
				<th>Kembali</th>
                <th>Aksi</th>
            </tr>			
        </thead>	
    <tbody>
<?php
$transaksi = mysqli_query($connection, "SELECT * from b_transaksi");
$no=1;  
while($row=mysqli_fetch_array($transaksi)){ ?>  
        <tr>
             <tr>
            <td style="vertical-align:middle;"><?php echo $no++ ?></td>
            <td style="vertical-align:middle;"><?php echo $row['tgl_beli'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['no_nota'] ?></td>
    	    <td style="vertical-align:middle;"><?php echo $row['jumlah'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['nama_mekanik'] ?></td>
			<td style="vertical-align:middle;"><?php echo $row['harga_jasa'] ?></td>
			<td style="vertical-align:middle;"><?php echo $row['total'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['bayar'] ?></td>
			<td style="vertical-align:middle;"><?php echo $row['kembali']?></td>
            <td>
                <a href="cetaknota.php?no_nota=<?php echo $row['no_nota'];?>" target="blank" type="submit" class="btn btn-primary btn-xs"><i class="fa fa-print"></i>Cetak nota</a>
            </td>
        </tr>
<?php } ?>	
        </tbody>
    </table>
    </form> 
</div>
</div>
<script>
    $(document).ready(function() {

        $('#tabel').DataTable();

    });
</script>	
<?php include "footer.php" ;?>
