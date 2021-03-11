<?php
	// siswa
	class Siswa {
		function insert($connection,$siswa) {
			$see = mysqli_query($connection,"SELECT id FROM siswa WHERE nis='$nis'");
			$nis = filter_var($siswa['nis'],FILTER_SANITIZE_SPECIAL_CHARS);
			$nama = filter_var($siswa['nama'],FILTER_SANITIZE_SPECIAL_CHARS);
			$tingkat = filter_var($siswa['tingkat'],FILTER_SANITIZE_SPECIAL_CHARS);
			$jurusan = filter_var($siswa['jurusan'],FILTER_SANITIZE_SPECIAL_CHARS);
			$kelas = filter_var($siswa['kelas'],FILTER_SANITIZE_SPECIAL_CHARS);
			$email_ortu = filter_var($siswa['email_ortu'],FILTER_SANITIZE_SPECIAL_CHARS);
			$see = mysqli_query($connection,"SELECT id FROM siswa WHERE nis='$nis'");
			$see = mysqli_num_rows($see);
			if($see>0){
				return FALSE;
			};
			$post = mysqli_query($connection, "INSERT INTO siswa(nis,nama,tingkat,jurusan,kelas,email_ortu) VALUES('$nis','$nama','$tingkat','$jurusan','$kelas','$email_ortu')");
			if($post){
				echo "nice";
				return TRUE;
			}else{
				echo "bad";
				return FALSE;
			} 
		}
		function select_all($connection) {
			$now = date('yy-m-d');
			$getall = mysqli_query($connection, "SELECT * FROM `siswa` order by 'id' desc");
			$today = mysqli_query($connection, "SELECT id FROM siswa WHERE date_added='$now'");
			$today = mysqli_num_rows($today);
			$index = mysqli_num_rows($getall);
			$no=1;
			while($nais = mysqli_fetch_assoc($getall)) {
				$siswa[] = array(
				'no' => $no,
				'id' => $nais['id'],
				'nis' => $nais['nis'],
				'nama' => $nais['nama'],
				'tingkat' => $nais['tingkat'],
				'jurusan' => $nais['jurusan'],
				'kelas' => $nais['kelas'],
				'email_ortu' => $nais['email_ortu']);
				$no++;
			}if($index == 0){
				$siswa = array($index,"kosong");
			}
			$siswa = array($index,$today,$siswa);
			return $siswa;
		}
		function delete($connection,$id){
			echo $id;
			$query = mysqli_query($connection,"DELETE FROM siswa WHERE id='$id'");
			if($query){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
		function delete_all($connection){
			echo $id;
			$query = mysqli_query($connection,"DELETE FROM siswa");
			if($query){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
		function update($connection,$siswa){
			$id = filter_var($siswa['id'],FILTER_SANITIZE_SPECIAL_CHARS);
			$nis = filter_var($siswa['nis'],FILTER_SANITIZE_SPECIAL_CHARS);
			$nama = filter_var($siswa['nama'],FILTER_SANITIZE_SPECIAL_CHARS);
			$tingkat = filter_var($siswa['tingkat'],FILTER_SANITIZE_SPECIAL_CHARS);
			$jurusan = filter_var($siswa['jurusan'],FILTER_SANITIZE_SPECIAL_CHARS);
			$kelas = filter_var($siswa['kelas'],FILTER_SANITIZE_SPECIAL_CHARS);
			$email_ortu = filter_var($siswa['email_ortu'],FILTER_SANITIZE_SPECIAL_CHARS);
			$update = mysqli_query($connection, "UPDATE siswa SET nis = '$nis', nama = '$nama', tingkat = '$tingkat', jurusan = '$jurusan', kelas = '$kelas', email_ortu = '$email_ortu' WHERE id = '$id'");
			if($update){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
?>
 
<?php
	$siswa = new Siswa();
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