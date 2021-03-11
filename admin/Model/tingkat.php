<?php
	// Tingkat
	class Tingkat {
		function insert($connection,$tingkat) {
			$tingkat = filter_var($tingkat,FILTER_SANITIZE_SPECIAL_CHARS);
			$post = mysqli_query($connection, "INSERT INTO tingkat(nama) VALUES('$tingkat')");
			if($post){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
		function select_all($connection) {
			$getall = mysqli_query($connection, "SELECT * FROM `tingkat`");
			$index = mysqli_num_rows($getall);
			$no=1;
			while($nais = mysqli_fetch_assoc($getall)) {
				$tingkat[] = array(
				'id' => $nais['id'],
				'tingkat' => $nais['nama']);
				$no++;
			}if($index == 0){
				$tingkat = array($index,"kosong");
			}
			$tingkat = array($index,$tingkat);
			return $tingkat;
		}
		function delete($connection,$id){
			$query = mysqli_query($connection,"DELETE FROM `tingkat` WHERE id='$id'");
			if($query){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
	}
?>
 
<?php
	$tingkat = new Tingkat();
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