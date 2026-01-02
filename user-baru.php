<?php
include_once 'header.php';
if($_POST){
    
    include_once 'includes/user.inc.php';
    $eks = new User($db);

    $eks->nl = $_POST['nl'];
    $eks->un = $_POST['un'];
    $eks->pw = md5($_POST['pw']);

    if($eks->pw == md5($_POST['up'])){
    
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

    } else{
?>
<script type="text/javascript">
window.onload=function(){
  showStickyWarningToast();
};
</script>
<?php   
    }
}
?>
<?php  
include_once 'includes/user.inc.php';
$pro = new User($db);
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
			  <li><a href="user.php"><span class="fa fa-users"></span> Data Pengguna</a></li>
			  <li class="active"><span class="fa fa-clone"></span> Tambah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Pengguna</strong>
		  	</p>
            <div class="panel panel-default">
    <div class="panel-body">
            
                <form method="post">
                  <div class="form-group">
                    <label for="nl">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nl" name="nl" required>
                  </div>
                  <div class="form-group">
                    <label for="un">Username</label>
                    <input type="text" class="form-control" id="un" name="un" required>
                  </div>
                  <div class="form-group">
                    <label for="pw">Password</label>
                    <input type="password" class="form-control" id="pw" name="pw" required>
                  </div>
                  <div class="form-group">
                    <label for="up">Ulangi Password</label>
                    <input type="password" class="form-control" id="up" name="up" required>
                  </div>
                  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
				  <button type="button" onclick="location.href='user.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
                </form>
              
          </div>
          </div>
          <div class="col-md-12 text-left">
            <strong style="font-size:18pt;"><span class="fa fa-user"></span> Data Pengguna</strong>
            <button type="submit" name="hapus-contengan" class="btn btn-danger text-left"><span class="fa fa-close"></span> Hapus Yang Ditandai</button>
        </div>
        </br>
        </br>
        </br>

          <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th width="100px">Aksi</th>
              
            </tr>
        </thead>
       
        <tbody>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
                <td style="vertical-align:middle;"><input type="checkbox" value="<?php echo $row['id_pengguna'] ?>" name="checkbox[]" /></td>
          <td style="vertical-align:middle;"><?php echo $row['nama_pengguna'] ?></td>
          <td style="vertical-align:middle;"><?php echo $row['username'] ?></td>
          <td class="text-center" style="vertical-align:middle;">
          <a href="user-ubah.php?id=<?php echo $row['id_pengguna'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
          <a href="user-hapus.php?id=<?php echo $row['id_pengguna'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td> 
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
          </div>
        </div>
        <?php
include_once 'footer.php';
?>