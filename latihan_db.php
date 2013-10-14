<?php

include 'koneksi_class.php';

// instance objek
$db = new koneksi();

// konek ke mysql
$db->konekMysql();

// $db->tambahAnggota('Eric', 'Banjarmasin','085745444738');

$arrayAnggota = $db->tampilAnggota();

$no=1;

// $getaksi = $_GET['aksi']; 	
// proses hapus data
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == 'hapus') {
		$id = $_GET['id'];
		$db->hapusAnggota($id);
	}else if($_GET['aksi'] == 'edit'){
	// baca id anggota yang akan di edit
	$id = $_GET['id'];
	?>
	<form action="<?php $_SERVER['PHP_SELF'] ?>?aksi=update" method="POST">
	<table>
		<tr>
			<td>Nama Anggota</td>
			<td>:</td>
			<td>
				<input type="text" name="nama" value="<?= $db->bacaDataAnggota('nama',$id) ?>">		
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td>
				<input type="text" name="alamat" value="<?= $db->bacaDataAnggota('alamat',$id) ?>">
			</td>
		</tr>
		<tr>
			<td>
				Telpon
			</td>
			<td>:</td>
			<td>
				<input type="text" name="telepon" value="<?= $db->bacaDataAnggota('telepon',$id) ?>">
			</td>
		</tr>
		
	</table>
	<input type="hidden" name="id" value="<?= $id ?>">
	<input type="submit" name="submit" value="update data">
	</form>
	<?php
	}else if($_GET['aksi'] == 'update'){
		// prosess update anggota
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];


		// echo $id."<br />";
		// echo $nama."<br />";
		// echo $alamat."<br />";
		// echo $telepon."<br />";
		// update data via method
		$db->updateDataAnggota($id, $nama, $alamat, $telepon);
	}
}
?>



<table border="1">
	<tr>
		<th>No</th>
		<th>Nama Anggota</th>
		<th>Alamat</th>
		<th>Telpon</th>
		<th>Aksi</th>
	</tr>

	<?php 
		foreach ($arrayAnggota as $data) {
	?>
	
	<tr>
		<td>
			<?php echo $no ?>
		</td>
		<td>
			<?php echo $data['nama'] ?>	
		</td>
		<td>
			<?php echo $data['alamat'] ?>
		</td>
		<td>
			<?php echo $data['telepon'] ?>
		</td>
		<td>
			<a href="<?php echo $_SERVER['PHP_SELF']."?aksi=edit&id=".$data['id']?>">Edit</a>
			<a href="<?php echo $_SERVER['PHP_SELF']."?aksi=hapus&id=".$data['id']?>">Hapus</a>
		</td>
	</tr>

	<?php
		$no++;
		}
	?>
</table>

