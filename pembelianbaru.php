<?php include_once 'header.php'; ?>
<?php include 'connection.php';
$carikode = mysqli_query($connection, "SELECT max(no_nota) from b_transaksi") or die(mysqli_error());
$datakode = mysqli_fetch_array($carikode);
if ($datakode) {
	$nilaikode = substr($datakode[0], 1);
	$kode = (int) $nilaikode;
	$kode = $kode + 1;
	$kode_otomatis = "P" . str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
	$kode_otomatis = "P0001";
}
?>
<?php include 'connection.php' ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-2">
		<?php include_once 'sidebar.php' ?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-10">
		<ol class="breadcrumb">
			<li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			<li><a href="pembelian.php"><span class="fa fa-wrench"></span> Data Service</a></li>
			<li class="active"><span class="fa fa-clone"></span> Tambah Data</li>
			<button type="button" onclick="location.href='pembelian.php'" class="btn btn-success btn-sm"><span class="fa fa-history"></span> Kembali</button>
		</ol>
		<p style="margin-bottom:10px;" class="text-left"><strong style="font-size:18pt;"><span class="fa fa-wrench"></span> Tambah Data Service</strong></p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" action="tambah.php" class="form-hrizontal" role="form" onSubmit="return validasi_tambah(this)">
					<div class="col-md-6">
						<div class="row">
							<input type="hidden" class="form-control" id="tgl_beli" name="tgl_beli" value="<?php echo $date = date('Y-m-d'); ?>" required>
							<div class="form-group">
								<label for="no_nota" class="control-label col-md-4">No. Nota :</label>
								<div class="col-md-6">
									<input type="text" class="form-control reset" name="no_nota" id="no_nota" readonly="readonly" value="<?php echo $kode_otomatis ?>">
									</br>
								</div>
							</div>
							<div class="form-group">
								<label for="id_sparepart" class="control-label col-md-4">Id Sparepart</label>
								<div class="col-md-8">
									<?php $result = mysqli_query($connection, "select * from b_sparepart");
									$jsArray = "var brg = new Array();\n";
									echo '<select  class="form-control reset"   name="id_sparepart" id="id_sparepart"  onchange="changeValue(this.value)">';
									echo '<option>---Pilih kode barang---</option>';
									while ($row = mysqli_fetch_array($result)) {
										echo '<option value="' . $row['id_sparepart'] . '">' . $row['id_sparepart'] . '</option>';
										$jsArray .= "brg['" . $row['id_sparepart'] . "'] = {sparepart:'" . addslashes($row['sparepart']) . "',
						harga:'" . addslashes($row['harga']) . "',stock:'" . addslashes($row['stock']) . "'};\n";
									}
									echo '</select>';
									?> </br>
								</div>
							</div>
							</br>
							</br>
							<div class="form-group">
								<label class="control-label col-md-4" for="sparepart">Nama Barang :</label>
								<div class="col-md-8">
									<input type="text" class="form-control reset" name="sparepart" id="sparepart" readonly="readonly">
									</br>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4" for="harga">Harga (Rp) :</label>
								<div class="col-md-8">
									<input type="text" class="form-control reset" name="harga" id="harga" readonly="readonly">
									</br>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4" for="qty">Quantity :</label>
								<div class="col-md-3">
									<input type="text" class="form-control reset col-md-1" name="qty" id="qty" autocomplete="off" placeholder="Isi qty...">
								</div>
								<label class="control-label col-md-1" for="stock">Stok:</label>
								<div class="col-md-3">
									<input type="text" class="form-control reset" name="stock" id="stock" readonly="readonly">
									</br>
								</div>
							</div>
							<div class="form-group">
								<label for="subtotal" class="col-md-4">Sub total</label>
								<div class="col-md-8">
									<input type="text" class="form-control reset" id="subtotal" name="subtotal" readonly="readonly">
									</br>
								</div>
							</div>
							<div class="col-md-offset-6">
								<button type="submit" action="tambah.php" name="tambah" id="tambah" class="btn btn-primary"><span class="fa fa-save"></span> Tambah</button>
								<button type="reset" class="btn btn-success"><span class="fa fa-times"></span> Reset</button>
							</div>
						</div>
					</div>
				</form>
				<form method="post" action="simpan.php" class="form-hrizontal" role="form" onSubmit="return validasi_simpan(this)">
					<input type="hidden" class="form-control" id="tgl_beli" name="tgl_beli" value="<?php echo $date = date('Y-m-d H:i:s'); ?>" required>
					<div class="col-md-6">
						<div class="row">
							<div class="form-group">
								<label for="nama_mekanik" class="col-md-4">Nama Mekanik</label>
								<div class="col-md-8">
									<select class="form-control" id="nama_mekanik" name="nama_mekanik">
										<?php
										$result = mysqli_query($connection, "SELECT * FROM b_mekanik");
										?>
										<?php $i = 0;
										while ($row = mysqli_fetch_array($result)) { ?>
											<option value="<?= $row["nama_mekanik"]; ?>"><?= $row["nama_mekanik"]; ?></option>
										<?php $i++;
										} ?>
									</select>
									</br>
								</div>
							</div>
							<div class="form-group">
								<?php
								$jumlah = mysqli_query($connection, "SELECT sum(subtotal) as subtotal from b_penjualansementara");
								while ($st = mysqli_fetch_array($jumlah)) { ?>
									<div class="col-md-12">
										<div class='alert-sm alert-success jumlah'>
											<label for="jumlah" placeholder="0">
												<h4>Jumlah Sparepart (Rp) : <?php echo number_format($st['subtotal']) ?></h4>
											</label>
											<input type="hidden" class="form-control input-lg big reset" name="jumlah" id="jumlah" value="<?php echo $st['subtotal'] ?>" placeholder="0" readonly="readonly">
										</div>
										</br>
									</div>
							</div>
						<?php } ?>
						<div class="form-group">
							<label for="harga_jasa" class="col-md-4">Biaya Jasa</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="harga_jasa" name="harga_jasa" placeholder="Masukan Biaya..." autocomplete="off" onkeyup="copytexbox()">
								</br>
							</div>
						</div>
						<div class="form-group">
							<label for="total" class="col-md-4">Total Bayar (Rp) :</label>
							<div class="col-md-8">
								<input type="text" class="form-control reset" name="total2" id="total2" placeholder="0" readonly="readonly">
								</br>
							</div>
						</div>
						<div class="form-group">
							<label for="bayar" class="col-md-4">Bayar (Rp) :</label>
							<div class="col-md-8">
								<input type="text" class="form-control reset" name="bayar" placeholder="0" autocomplete="off" id="bayar" onkeyup="copytexbox()">
								</br>
							</div>
						</div>
						<input type="hidden" class="form-control" id="harga_jasa2" name="harga_jasa2" placeholder="Masukan Biaya..." autocomplete="off">
						<input type="hidden" class="form-control reset" name="total" id="total" placeholder="0" readonly="readonly">
						<input type="hidden" class="form-control reset" name="bayar2" placeholder="0" autocomplete="off" id="bayar2">
						<div class="col-md-12" style="padding-right: 0px;">
							<div class="form-group">
								<div class='alert alert-success totalbayar'>
									<label for="kembali" class="besar">
										<h4>Kembalian (Rp) :</h4>
									</label>
									<input type="hidden" class="form-control input-lg big reset"
										name="kembali" id="kembali" placeholder="0"
										readonly="readonly">
									<input type="text" class="form-control input-lg big reset"
										name="kembali2" id="kembali2" placeholder="0"
										readonly="readonly">
									<input type="hidden" class="form-control reset" name="no_nota" id="no_nota" readonly="readonly" value="<?php echo $kode_otomatis ?>">
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<button type="submit" name="simpan" id="simpan" class="btn btn-primary" onclick="get_txt(); if(confirm('Transaksi Lagi')){location.href='pembelian.php'}else{location.href='pembalian.php'};" disabled><span class="fa fa-save"></span> Simpan</button>
						</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<form action="" method="POST">
			<table width="100%" class="table table-striped table-bordered">
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
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sementara = mysqli_query($connection, "SELECT * from b_penjualansementara");
					$no = 1;
					while ($row = mysqli_fetch_array($sementara)) {
					?>
						<tr>
							<td style="vertical-align:middle;"><?php echo $no++ ?></td>
							<td style="vertical-align:middle;"><?php echo $row['no_nota'] ?></td>
							<td style="vertical-align:middle;"><?php echo $row['id_sparepart'] ?></td>
							<td style="vertical-align:middle;"><?php echo $row['sparepart'] ?></td>
							<td style="vertical-align:middle;"><?php echo $row['harga'] ?></td>
							<td style="vertical-align:middle;"><?php echo $row['qty'] ?></td>
							<td style="vertical-align:middle;"><?php echo $row['subtotal'] ?></td>
							<td style="vertical-align:middle;"><?php echo $row['tgl_beli'] ?></td>
							<td style="vertical-align:middle;"><a onclick="if(confirm('Yakin ingin menghapus data')){location.href='hapus-data.php?id_sparepart=<?php echo $row['id_sparepart']; ?>'}" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</form>
	</div>
</div>
<script type="text/javascript">
	function get_txt() {
		var kembali2;
		kembali_val = document.getElementById('kembali2').value;
		alert("kembali Rp : " + kembali_val);
	}
</script>
<script type="text/javascript">
	<?php echo $jsArray; ?>

	function changeValue(id) {
		document.getElementById('sparepart').value = brg[id].sparepart;
		document.getElementById('harga').value = brg[id].harga;
		document.getElementById('stock').value = brg[id].stock;
	};
</script>
<script type="text/javascript">
	function copytexbox() {
		document.getElementById('bayar2').value = document.getElementById('bayar').value;
		a = parseInt(document.getElementById('bayar2').value.replace(/,.*|\D/g, ''), 10);
		$('#bayar2').val(a);
		document.getElementById('harga_jasa2').value = document.getElementById('harga_jasa').value;
		b = parseInt(document.getElementById('harga_jasa2').value.replace(/,.*|\D/g, ''), 10);
		$('#harga_jasa2').val(b);
	}
</script>
<script type="text/javascript">
	$('#qty').keyup(function() {
		totalsub = $("#qty").val() * $("#harga").val();
		$('#subtotal').val(totalsub);
	});
	$('#harga').keyup(function() {
		totalsub = $('#qty').val() * $('#harga').val();
		$('#subtotal').val(totalsub);
	});

	function formatAngka(angka) {
		if (typeof(angka) != 'string') angka = angka.toString();
		var reg = new RegExp('([0-9]+)([0-9]{3})');
		while (reg.test(angka)) angka = angka.replace(reg, '$1.$2');
		return angka;
	}
	var totaljumlah = $('#jumlah').val();
	harga_jasa = 0;
	total = 0;
	$('#jumlah').val(totaljumlah);
	$('#harga_jasa').on('keypress', function(e) {
		var c = e.keyCode || e.charCode;
		switch (c) {
			case 8:
			case 9:
			case 27:
			case 13:
				return;
			case 65:
				if (e.ctrlKey === true) return;
		}
		if (c < 48 || c > 57) e.preventDefault();
	}).on('keyup', function() {
		var inp = $(this).val().replace(/\./g, '');
		harga_jasa = new Number(inp);
		$(this).val(formatAngka(inp));
		total = parseInt(harga_jasa) + parseInt(totaljumlah);
		$('#total').val(total);
		$('#total2').val(formatAngka(total));
	});
</script>
<script type="text/javascript">
	function formatAngka(angka) {
		if (typeof(angka) != 'string') angka = angka.toString();
		var reg = new RegExp('([0-9]+)([0-9]{3})');
		while (reg.test(angka)) angka = angka.replace(reg, '$1.$2');
		return angka;
	}
	var total = $('#total').val();
	bayar = 0;
	kembali = 0;
	$('#total').val(total);
	$('#bayar').on('keypress', function(e) {
		var c = e.keyCode || e.charCode;
		switch (c) {
			case 8:
			case 9:
			case 27:
			case 13:
				return;
			case 65:
				if (e.ctrlKey === true) return;
		}
		if (c < 48 || c > 57) e.preventDefault();
	}).on('keyup', function() {
		var inp = $(this).val().replace(/\./g, '');
		bayar = new Number(inp);
		$(this).val(formatAngka(inp));
		if (bayar > total) kembali = bayar - total;
		if (total > bayar) kembali = 0;
		$('#kembali').val(kembali);
		$('#kembali2').val(formatAngka(kembali));
	});


	function validasi_simpan(form) {
		if (form.harga_jasa.value == "") {
			alert("Biayane di isi cookk");
			form.harga_jasa.focus();
			return (false);
		}
	}
</script>
<script>
	function validasi_tambah(form) {
		if (form.id_sparepart.value == "---Pilih kode barang---") {
			alert("Pilih kode barang cookk!!");
			form.id_sparepart.focus();
			return (false);
		}
		if (parseInt(form.stock.value) < parseInt(form.qty.value)) {
			alert("Stock ra cukup cookk...!!!");
			form.qty.focus();
			return (false);
		}
		if (form.qty.value == "") {
			alert("Quantity di isi cookk...!!");
			form.qty.focus();
			return (false);
		}
		if (form.stock.value < 3) {
			alert("Info : Stok kurang 3 cookk...!!");
			form.stock.focus();
			return (true);
		} else {
			return (true);
		}
	}

	$('#qty').on('keypress', function(e) {
		var c = e.keyCode || e.charCode;
		switch (c) {
			case 8:
			case 9:
			case 27:
			case 13:
				return;
			case 65:
				if (e.ctrlKey === true) return;
		}
		if (c < 48 || c > 57) e.preventDefault();
	})
</script>
<script type="text/javascript">
	$(function() {
		$('#bayar').keyup(function() {
			if (bayar < total) {
				$('#simpan').prop('disabled', true);
			} else {
				$('#simpan').prop('disabled', false);
			}
		});
	});
	$('.uang').maskMoney({
		thousands: '.',
		decimal: ',',
		precision: 0
	});
</script>
<?php include_once 'footer.php'; ?>