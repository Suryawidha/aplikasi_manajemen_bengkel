<?php
include_once 'header.php';
if($_POST){
	
	include_once 'includes/mekanik.inc.php';
	$eks = new Mekanik($db);

	$eks->nama_mekanik = $_POST['nama_mekanik'];
	$eks->alamat = $_POST['alamat'];

	
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
include_once 'includes/mekanik.inc.php';
$pro = new Mekanik($db);
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
			  <li><a href="nilai.php"><span class="fa fa-users"></span> Mekanik</a></li>
			  <li class="active"><span class="fa fa-clone"></span> Tambah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Data Mekanik</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post">
				  <div class="form-group">
				    <label for="nama_mekanik">Nama Mekanik</label>
				    <input type="text" class="form-control" id="nama_mekanik" name="nama_mekanik" required>
				  </div>
				  <div class="form-group">
				    <label for="alamat">Alamat</label>
				    <input type="text" class="form-control" id="alamat" name="alamat" required>
				  </div>
				<div class="form-group">
				<input type="hidden" id="tgllk" value="" name="tgllk"/>
				  </div>
				  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
				  <button type="button" onclick="location.href='mekanik.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
				</div>
				</form>
				</div>
		<form>
		<div class="form-group">
		<div class="col-md-6 text-left">
            <strong style="font-size:18pt;"><span class="fa fa-users"></span> Data Mekanik</strong>
        </div>
        <div class="col-md-6 text-right">
            <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Yang Ditandai</button>
        </div>
        </div>
        </br>
        </br>
        </br>
        <div class="form-group">
				<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
                <th width="10px">Id</th>
                <th>Nama Mekanik</th>
                <th>Alamat</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>
               <tbody>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
                <td style="vertical-align:middle;"><input type="checkbox" value="<?php echo $row['id_mekanik'] ?>" name="checkbox[]" /></td>
            <td style="vertical-align:middle;"><?php echo $row['id_mekanik'] ?></td>
    	    <td style="vertical-align:middle;"><?php echo $row['nama_mekanik'] ?></td>
             <td style="vertical-align:middle;"><?php echo $row['alamat'] ?></td>

            <td class="text-center" style="vertical-align:middle;">
    		  <a href="mekanik-ubah.php?id=<?php echo $row['id_mekanik'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
    		  <a href="mekanik-hapus.php?id=<?php echo $row['id_mekanik'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    	    </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
    <div>
    </form>
     
				</div>

		  </div>
		</div>

		

		<?php
include_once 'footer.php';
?>