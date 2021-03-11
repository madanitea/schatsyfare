<?php
	include '../config.php';
	// PENGUMUMAN
	class Pengumuman {
		function insert($connection,$pengumuman) {
			$pengumuman = filter_var($pengumuman,FILTER_SANITIZE_SPECIAL_CHARS);
			$post = mysqli_query($connection, "INSERT INTO pengumuman(data) VALUES('$pengumuman')");
			if($post){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
		function select_all($connection) {
			$getall = mysqli_query($connection, "SELECT * FROM `pengumuman`");
			$index = mysqli_num_rows($getall);
			$no=1;
			while($nais = mysqli_fetch_assoc($getall)) {
				$pengumuman[] = array(
				'id' => $nais['id'],
				'no' => $no,
				'data' => $nais['data'],
				'tanggal' => $nais['tanggal']);
				$no++;
			}if($index == 0){
				$pengumuman = "	";
			}
			return $pengumuman;
		}
		function delete_all($connection,$metode){
			if($metode == "DELETE"){
				$metode = "DELETE FROM";
			}
			$query = mysqli_query($connection, "$metode `pengumuman`");
			if($query){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
		function delete($connection,$id){
			$query = mysqli_query($connection,"DELETE FROM `pengumuman` WHERE id='$id'");
			if($query){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
	}

	/**
	 * PENGATURAN
	 */
	class Pengaturan
	{
		
		function all($connection){
			$getall = mysqli_query($connection, "SELECT * FROM `pengaturan`");
			$index = mysqli_num_rows($getall);
			$no=1;
			while($nais = mysqli_fetch_assoc($getall)) {
				$pengumuman[] = array(
				'variable' => $nais['variable'],
				'id' => $nais['id'],
				'value' => $nais['value']);
			}
			return $pengaturan;
		}
	}
?>
 
<?php
	$pengumuman = new Pengumuman();
	$pengaturan = new Pengaturan();
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