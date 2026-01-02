<?php include'connection.php' ?>
<?php
class Pembelian{
  private $conn;
  private $table_name = "b_transaksi";
  public $tgl_beli;
  public $no_nota;
  public $jumlah;
  public $nama_mekanik;
  public $harga_jasa;
  public $total;
  public function __construct($db){
    $this->conn = $db;
  }
	function readAll(){
		$query = "SELECT * FROM b_transaksi JOIN b_mekanik ON b_transaksi.id_mekanik=b_mekanik.id_mekanik JOIN b_sparepart ON b_transaksi.id_sparepart=b_sparepart.id_sparepart";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}
	function readmen(){
		$query = "select b_pembelian.id_mekanik, count(*) from b_pembelian inner join b_mekanik on b_pembelian.id_mekanik = b_mekanik.id_mekanik group by b_pembelian.id_mekanik";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}
	function readOne(){
		 $query = "SELECT * FROM 212_kader,212_angkatan_lk WHERE 212_kader.id_angkatan_lk=212_angkatan_lk.id_angkatan_lk ORDER BY id_kader ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->id = $row['id_mekanik'];
		$this->nama_mekanik = $row['nama_mekanik'];
	}
	// update
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nama_mekanik = :nama_mekanik 

				WHERE
					id_mekanik = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama_mekanik', $this->nama_mekanik);
		$stmt->bindParam(':id', $this->id);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	// delete
	function delete(){
		$query = "DELETE FROM " . $this->table_name . " WHERE id_pembelian = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function countAll(){
		$query = "SELECT * FROM b_pembelian JOIN b_mekanik ON b_pembelian.id_mekanik=b_mekanik.id_mekanik JOIN b_sparepart ON b_pembelian.id_sparepart=b_sparepart.id_sparepart";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt->rowCount();
	}
	function hapusell($ax){
		$query = "DELETE FROM " . $this->table_name . " WHERE id_pembelian in $ax";
		$stmt = $this->conn->prepare($query);
		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>