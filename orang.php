<?php
// #awal OOP
// class orang{
// 	public $nama;
// 	public $umur;
// 	function berbicara(){
// 		echo "Halo nama saya adalah $this->nama";
// 	}
// 	function statususia(){
// 		if ($this->umur >= 17) 
// 			echo $status = 'dewasa';
// 		else
// 			echo $status = 'dibawah umur';
// 		return $status;
// 	}
// }
// #cara pemanggilan objek pertama
// $objOrang = new orang();
// $objOrang->nama = 'muslih';
// $objOrang->umur = 21;

// echo "Nama : $objOrang->nama <br />";
// echo "Umur : $objOrang->umur Tahun";


// cara penggunaan objek kedua
// $objOrang = new orang();
// $objOrang->nama = 'muslih';
// $objOrang->umur = 21;
// $objOrang->berbicara();
// echo "<br/>";
// $objOrang->statususia();

// echo "<br/>";echo "<br/>";

// $objOrang2 = new orang();
// $objOrang2->nama = 'gulnar';
// $objOrang2->umur = 23;
// $objOrang2->berbicara();
// echo "<br/>";
// $objOrang2->statususia();


// #construct dan destruct
class orang{
	private $nama;

	function __construct($nama){
		$this->nama = $nama;
		echo "Constructor : $this->nama dibuat<br />";
	}

	function berbicara(){
		echo "Halo, nama saya adalah".$this->nama."<br />";
	}

	function __destruct(){
		echo "<br />Destructor: $this->nama dihapus";
	}
}

// memanggil construct dan destruct
$orang1=new orang("Muslih");
$orang1->berbicara();
$orang2=new orang("Gulnar");
$orang2->berbicara();
?>
<br />

<?php 
// #penggunaan public
// class mahasiswa{
// 	public $nim;
// 	public $nama;
// 	public $nilai;

// 	public function prosesnilai(){
// 		echo "Mahasiswa dengan NIM <strong>$this->nim</strong><br/>";
// 		echo "Dengan Nama <strong>$this->nama</strong><br/>";
// 		echo "mendapatkan nilai <strong>$this->nilai</strong>";
// 	}
// }

// $objMhs = new mahasiswa();
// $objMhs->nim = '09024D3KI';
// $objMhs->nama = 'Muslih Ferecov';
// $objMhs->nilai = 85;
// $objMhs->prosesnilai();


// #penggunaan private
class mahasiswa{
	private $nim;
	private $nama;
	private $nilai;

	function setNim($x){
		$this->nim=$x;
	}
	function setNama($x){
		$this->nama=$x;
	}
	function setNilai($x){
		$this->nilai=$x;
	}
	function getNim(){
		return $this->nim;
	}
	function getNama(){
		return $this->nama;
	}
	function getNilai(){
		return $this->nilai;
	}

	function prosesnilai(){
		echo "Mahasiswa dengan NIM <strong>$this->nim</strong> Dengan Nama <strong>$this->nama</strong><br/>";
		echo "mendapatkan nilai <strong>$this->nilai</strong>";
	}
}

$objMhs = new mahasiswa();
$objMhs->setNim('12031921');
$objMhs->setNama('muslih ferecov');
$objMhs->setNilai(85);
$objMhs->prosesnilai();



#penggunaan constructdan dastruct yang lebih rumit
class Nilai{
	private $tugas;
	private $uts;
	private $uas;
	// constructor pemberian nilai awal dengan 0
	function __construct(){
		$this->tugas = 0;
		$this->uts = 0;
		$this->uas = 0;
		echo "<br />Constructor : Nilai tugas, uts, dan uas diset menjadi 0 <br /> <br />";
	}
	// fungsi untuk menset nilai tugas, diset dari 0 s/d 100
	function settugas($nilai){
		if (($nilai<=100)&&($nilai>=0)) {
			$this->tugas = $nilai;
		}
	}
	// fungsi set nilai uts 
	function setuts($nilai){
		if (($nilai<=100)&&($nilai>=0)) {
			$this->uts = $nilai;
		}
	}
	// fungsi set nilai uas
	function setuas($nilai){
		if (($nilai<=100)&&($nilai>=0)) {
			$this->uas = $nilai;
		}
	}

	// fungsi mengambil nilai isian property tugas
	function gettugas(){
		return $this->tugas;
	}
	// fungsi mengambil nilai isian property uts
	function getuts(){
		return $this->uts;
	}
	// fungsi mengambil nilai isian property uas
	function getuas(){
		return $this->uas;
	}
	// menghitung tugas akhir
	function getNA(){
		$nilaiakhir=0.2*$this->tugas+0.3*$this->uts+0.5*$this->uas;
		return $nilaiakhir;
	}
	// fungsi menampilkan nilai semua
	function tampil(){
		echo 	"Nilai tugas :".$this->tugas.
				", Nilai UTS : ".$this->uts.
				", Nilai UAS : ".$this->uas.
				", Nilai akhir : ".$this->getNA()."<br />";
	}
	// destruct untuk menghapus objek dari memory
	function __destruct(){
		echo "<br /><br /> Destructor : nilai tugas, uts, dan uas dihapus dari memori";
	}
}

// gunakan class nilai
$nilai = new Nilai();
$nilai->settugas(75);
echo "Nilai tugas sekarang adalah : ".$nilai->gettugas()."<br />";
$nilai->setuts(65);
$nilai->setuas(80);
$nilai->tampil();

echo "<br /> Nilai akhir : ".$nilai->getNA();
?>
