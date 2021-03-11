<?php
	// Jurusan
	class Jurusan {
		function insert($connection,$jurusan) {
			$jurusan = filter_var($jurusan,FILTER_SANITIZE_SPECIAL_CHARS);
			$post = mysqli_query($connection, "INSERT INTO jurusan(nama) VALUES('$jurusan')");
			if($post){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
		function select_all($connection) {
			$getall = mysqli_query($connection, "SELECT * FROM `jurusan`");
			$index = mysqli_num_rows($getall);
			$no=1;
			while($nais = mysqli_fetch_assoc($getall)) {
				$jurusan[] = array(
				'id' => $nais['id'],
				'jurusan' => $nais['nama']);
				$no++;
			}if($index == 0){
				$jurusan = array($index,"kosong");
			}
			$jurusan = array($index,$jurusan);
			return $jurusan;
		}
		function delete($connection,$id){
			$query = mysqli_query($connection,"DELETE FROM `jurusan` WHERE id='$id'");
			if($query){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
	}
?>
 
<?php
	$jurusan = new Jurusan();
	// MANUAL BOOK FOR CLASS PENGUMUMAN
	// // DELETE semua data. [DELETE/TRUNCATE]
	// $pengumuman->delete_all($connection,"TRUNCATE");
	
	// $id="1";
	// // DELETE satu data dengan id tertentu
	// $pengumuman->delete($connection,$id);
	// // INSERT satu data.
	// $pengumuman->insert($connection,"Gitar dan Motor adalah senjataku, dan Laptop adalah pelurunya.");
	
	// // SELECT  semua data.
	// $pengumumans = $pengumuman->select_all($connection);
	// foreach ($pengumumans as $umum) {
	// 	print $umum['no'];
	// 	print $umum['id'];
	// 	print $umum['data'];
	// 	print $umum['tanggal'];
	// 	print '<br>';
	// }
?>