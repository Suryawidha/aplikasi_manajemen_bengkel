<?php
class Mekanik{
  private $conn;
  private $table_name = "b_mekanik"; 
  public $id;
  public $nama_mekanik;
  public function __construct($db){
    $this->conn = $db;
  } 
 function insert(){	
		$query = "insert into ".$this->table_name." values('',?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nama_mekanik);
		$stmt->bindParam(2, $this->alamat);	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}	
	}
	function readAll(){
		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_mekanik ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();	
		return $stmt;
	}
	function readOne(){		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_mekanik=? LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);	
		$this->id = $row['id_mekanik'];
		$this->nama_mekanik = $row['nama_mekanik'];
		$this->alamat = $row['alamat'];
	}
	// update
	function update(){
		$query = "UPDATE 
					" . $this->table_name . " 
				SET nama_mekanik = :nama_mekanik, alamat = :alamat WHERE id_mekanik = :id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':alamat', $this->alamat);
		$stmt->bindParam(':nama_mekanik', $this->nama_mekanik);
		$stmt->bindParam(':id', $this->id);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	// delete
	function delete(){
		$query = "DELETE FROM " . $this->table_name . " WHERE id_mekanik = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function countAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_mekanik ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt->rowCount();
	}
	function hapusell($ax){
		$query = "DELETE FROM " . $this->table_name . " WHERE id_mekanik in $ax";
		$stmt = $this->conn->prepare($query);
		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>