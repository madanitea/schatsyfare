<?php
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
				$pengaturan[] = array(
				'variable' => $nais['variable'],
				'icon' => $nais['icon'],
				'id' => $nais['id'],
				'last' => $nais['updated_on'],
				'value' => $nais['value']);
			}
			return $pengaturan;
		}

		function edit($connection,$variable,$value){
			$value = filter_var($value,FILTER_SANITIZE_SPECIAL_CHARS);
			if ($variable == 8) {
				$value = hash('sha256', md5($value));
			}
			$update = mysqli_query($connection,"UPDATE `pengaturan` SET `value` = '$value',updated_on = now() WHERE id = '$variable'");
		}
	}
?>
 
<?php
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