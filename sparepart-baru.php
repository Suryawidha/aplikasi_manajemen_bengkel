<?php
include_once 'header.php';
if($_POST){
	
	include_once 'includes/sparepart.inc.php';
	$eks = new Sparepart($db);

	$eks->sparepart = $_POST['sparepart'];
	$eks->stock = $_POST['stock'];
	$eks->harga = $_POST['harga'];

	
	if($eks->insert()){
?>
<script type="text/javascript">
window.onload=function(){
	showStickySuccessToast();
};
</script>
<?php
	}
	
	else{
?>
<script type="text/javascript">
window.onload=function(){
	showStickyErrorToast();
};
</script>
<?php
	}
}
?>
<?php  
include_once 'includes/sparepart.inc.php';
$pro = new Sparepart($db);
$stmt = $pro->readAll();
$count = $pro->countAll();

if(isset($_POST['hapus-contengan'])){
    $imp = "('".implode("','",array_values($_POST['checkbox']))."')";
    $result = $pro->hapusell($imp);
    if($result){
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showSuccessToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 5000);
            };
            </script>
            <?php
    } else{
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showErrorToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 5000);
            };
            </script>
            <?php
    }
}
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
			  <li><a href="sparepart.php"><span class="fa fa-cogs"></span> Sparepart</a></li>
			  <li class="active"><span class="fa fa-clone"></span> Tambah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-cogs"></span> Tambah Data Sparepart</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post">
				  <div class="form-group">
				    <label for="sparepart">Nama Sparepart</label>
				    <input type="text" class="form-control" id="sparepart" name="sparepart" required>
				  </div>
				<div class="form-group">
				    <label for="stock">Stok</label>
				    <input type="text" class="form-control" id="stock" name="stock" required>
				  </div>
				<div class="form-group">
				    <label for="harga">Harga</label>
				    <input type="text" class="form-control" id="harga" name="harga" required>
				  </div>
				  </div>
				  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
				  <button type="button" onclick="location.href='sparepart-baru.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
				</form>
		<form>
				</div>
				<div class="col-md-6 text-left">
            <strong style="font-size:18pt;"><span class="fa fa-cogs"></span> Data Sparepart</strong>
        </div>
				<div class="col-md-6 text-right">
            <button type="submit" name="hapus-contengan" class="btn btn-danger btn-small"><span class="fa fa-close"></span> Hapus Yang Ditandai</button>
        </div>
        </br>
        </br>
        </br>
		<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
                <th>Sparepart</th>
				<th>Stock</th>
				<th>Harga</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>
               <tbody>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
                <td style="vertical-align:middle;"><input type="checkbox" value="<?php echo $row['id_sparepart'] ?>" name="checkbox[]" /></td>
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

            <td class="text-center" style="vertical-align:middle;">
    		  <a href="sparepart-ubah.php?id=<?php echo $row['id_sparepart'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
    		  <a href="sparepart-hapus.php?id=<?php echo $row['id_sparepart'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    	    </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
				</div>
				</form>


			  
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>