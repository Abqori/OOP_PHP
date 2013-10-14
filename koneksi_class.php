<?php 
class koneksi{
	// properti
	private $dbHost="localhost";
	private $dbUser="root";
	private $dbPass="pass";
	private $dbName="oop";

	// method koneksi mysql
	function konekMysql(){
		$koneksi = mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
		mysql_select_db($this->dbName) or die ("Database tidak ada");
		// if ($koneksi) {
		// 	echo "Koneksi berhasil";
		// }
	}

	// method tambah data
	function tambahAnggota($nama, $alamat, $telepon){	
		$query = "INSERT INTO anggota (nama, alamat, telepon)
		VALUES ('$nama','$alamat','$telepon')";

		$hasil = mysql_query($query);
		if ($hasil) {
			echo "Data Anggota berhasil disimpan ke dalam database";
		}else{
			echo "Data anggota gagal disimpan ke dalam database";
		}
	}

	// method tampilkan data
	function tampilAnggota(){
		$query = mysql_query("SELECT * FROM anggota ORDER BY id");
		while($baris = mysql_fetch_array($query))
			$data[]=$baris;			
		return $data;
	}

	// method menghapus anggota
	function hapusAnggota($id){
		$query = "DELETE FROM anggota WHERE id='$id'";
		mysql_query($query);
		echo "<p> Data anggota dengan id <strong>".$id."</strong> berhasil dihapus";
	}
	// method membaca data anggota
	function bacaDataAnggota($field, $id){
		$query = "SELECT * FROM anggota WHERE id='$id'";
		$hasil = mysql_query($query);
		$data = mysql_fetch_array($hasil);
		if ($field == 'nama'){
			return $data['nama'];
		}else if ($field == 'alamat'){
			return $data['alamat'];
		}else if ($field == 'telepon') {
			return $data['telepon'];
		}
	}
	// method untuk proses update data anggota
	function updateDataAnggota($id, $nama, $alamat, $telepon){
		$query = "UPDATE anggota SET nama='$nama', alamat='$alamat', telepon='$telepon' WHERE id='$id'";
		if (mysql_query($query)) {
			echo "<p>Data berhasil di update</p>";
		}else{
			echo "<p> Data belum di update bos!</p>";
		}
	}	
}
?>
