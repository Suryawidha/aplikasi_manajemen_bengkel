<?php  
include "header.php";
include_once 'includes/sparepart.inc.php';
$pro = new Sparepart($db);
$stmt = $pro->readAll();
$count = $pro->countAll();

?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-2">
		  	<?php
			include_once 'sidebar.php';
			?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-10">
	<ol class="breadcrumb">
	  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
	  <li class="active"><span class="fa fa-cogs"></span> Data Sparepart</li>
	</ol>
<form method="post">
    <div class="row">
        <div class="col-md-6 text-left">
            <strong style="font-size:18pt;"><span class="fa fa-cogs"></span> Data Sparepart</strong>
        </div>
        <div class="col-md-6 text-right">
            <button type="button" onclick="location.href='sparepart-baru.php'" class="btn btn-primary"><span class="fa fa-clone"></span> Kelola Data</button>
        </div>
    </div>
    <br/>
    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="10px">No</th>
                <th>Id Sarepart</th>
                <th>Sparepart</th>
				<th>Stock</th>
				<th>Harga</th>
            </tr>
        </thead>
               <tbody>
    <?php
    $no = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
            <td style="vertical-align:middle;"><?php echo $no++ ?></td>
            <td style="vertical-align:middle;"><?php echo $row['id_sparepart'] ?></td>
    	    <td style="vertical-align:middle;"><?php echo $row['sparepart'] ?></td>
			<td style="vertical-align:middle;">
			<?php
			$sedia = $row['stock'];
			if($sedia == 0){
				echo"<font color='red'>Tidak Tersedia</font>";
			}else{
				echo "$sedia";
			}
			?>
			</td>
			<td style="vertical-align:middle;"><?php echo $row['harga'] ?></td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
    </form> 
</div>
</div>	
<?php include "footer.php"; ?>
