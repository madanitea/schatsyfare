<?php
	// absensi
	class Absensi {
		function today_data($connection){
			$getall = mysqli_query($connection, "SELECT * FROM `pengaturan`");
			$index = mysqli_num_rows($getall);
			$no=1;
			while($nais = mysqli_fetch_assoc($getall)) {
				$pengaturans[] = array(
				'variable' => $nais['variable'],
				'icon' => $nais['icon'],
				'id' => $nais['id'],
				'last' => $nais['updated_on'],
				'value' => $nais['value']);
			}
			foreach ($pengaturans as $pengaturan) {
				switch ($pengaturan['variable']) {
					case 'Waktu Datang':
						$datang = $pengaturan['value'];	
						break;
					case 'Waktu Pulang':
						$pulang = $pengaturan['value'];
						break;
				}
			}
			$time = date('H:i:s');
			$look = strtotime($datang)-strtotime($time);
			$liik = strtotime($pulang)-strtotime($time);
			if($look < 0 and $liik < 0){
				$now = date('yy-m-d');
				$no = 1;
				$siswa = mysqli_query($connection,"SELECT id FROM siswa");
				$siswa = mysqli_num_rows($siswa);
				$getall = mysqli_query($connection,"SELECT a.id, date(a.waktu_datang) tanggal, b.nis,b.nama,b.tingkat,b.jurusan,b.kelas,time(a.waktu_datang) waktu_datang, time(a.waktu_pulang) waktu_pulang,a.ket FROM absensi a,siswa b WHERE a.nis=b.nis and date(waktu_datang)='$now' and waktu_pulang != '0000-00-00 00:00:00' order by time(waktu_pulang) asc");
				$index = mysqli_num_rows($getall);
				$presensi = ($index/$siswa)*100;
				while($nais = mysqli_fetch_assoc($getall)){
					$terlambat = strtotime($nais['waktu_datang'])-strtotime('07:00');
					$jam = floor($terlambat/60/60);
					$menit = floor(($terlambat-$jam * 60*60)/60);
					$detik = floor($terlambat-$jam * 60*60 - $menit*60);
					$absensi[] = array(
					'no' => $no,
					'id' => $nais['id'],
					'nis' => $nais['nis'],
					'nama' => $nais['nama'],
					'tingkat' => $nais['tingkat'],
					'jurusan' => $nais['jurusan'],
					'kelas' => $nais['kelas'],
					'tanggal' => $nais['tanggal'],
					'waktu_datang' => $nais['waktu_datang'],
					'waktu_pulang' => $nais['waktu_pulang'],
					'keterangan' => $nais['ket'],
					'terlambat' => $terlambat = [$jam,$menit,$detik]);
					$no++;
				}
				$absensi = array($now,$index,round($presensi),$absensi,"PULANG",$siswa);
				return json_encode($absensi);
			}elseif($look > 0 and $liik > 0){
				$now = date('yy-m-d');
				$no = 1;
				$siswa = mysqli_query($connection,"SELECT id FROM siswa");
				$siswa = mysqli_num_rows($siswa);
				$getall = mysqli_query($connection,"SELECT a.id, date(a.waktu_datang) tanggal, b.nis,b.nama,b.tingkat,b.jurusan,b.kelas,time(a.waktu_datang) waktu_datang, time(a.waktu_pulang) waktu_pulang,a.ket FROM absensi a,siswa b WHERE a.nis=b.nis and date(waktu_datang)='$now' order by time(a.waktu_pulang) asc");
				$index = mysqli_num_rows($getall);
				$presensi = ($index/$siswa)*100;
				while($nais = mysqli_fetch_assoc($getall)){
					$terlambat = strtotime($nais['waktu_datang'])-strtotime('07:00');
					$jam = floor($terlambat/60/60);
					$menit = floor(($terlambat-$jam * 60*60)/60);
					$detik = floor($terlambat-$jam * 60*60 - $menit*60);
					$absensi[] = array(
					'no' => $no,
					'id' => $nais['id'],
					'nis' => $nais['nis'],
					'nama' => $nais['nama'],
					'tingkat' => $nais['tingkat'],
					'jurusan' => $nais['jurusan'],
					'kelas' => $nais['kelas'],
					'tanggal' => $nais['tanggal'],
					'waktu_datang' => $nais['waktu_datang'],
					'waktu_pulang' => $nais['waktu_pulang'],
					'keterangan' => $nais['ket'],
					'terlambat' => $terlambat = [$jam,$menit,$detik]);
					$no++;
				}
				$absensi = array($now,$index,round($presensi),$absensi,"DATANG",$siswa);
				return json_encode($absensi);
			}else{
				echo "belum saatnya";
			}
		}
		function today($connection) {
			$now = date('yy-m-d');
			$getall = mysqli_query($connection,"SELECT id,ket FROM absensi WHERE date(waktu_datang)='$now'");
			$hadir = mysqli_num_rows($getall);
			$terlambat = 0;
			$tepat_waktu = 0;
			$sakit = 0;
			$izin = 0;
			$alfa = 0;
			while ($data = mysqli_fetch_assoc($getall)) {
				switch ($data['ket']) {
					case 'hadir':
						$tepat_waktu += 1;
						break;
					case 'terlambat':
						$terlambat += 1;
						break;
					case 'tepat_waktu':
						$tepat_waktu += 1;
						break;
					case 'sakit':
						$sakit += 1;
						break;
					case 'izin':
						$izin += 1;
						break;
					case 'alfa':
						$alfa += 1;
						break;
				}
			}
			$semua = array('hadir' => $hadir, 'terlambat' => $terlambat, 'tepat_waktu' => $tepat_waktu, 'sakit' => $sakit, 'izin' => $izin, 'alfa' => $alfa);
				return $semua;
		}
		function select_all($connection) {
			$now = date('yy-m-d');
			$getall = mysqli_query($connection, "SELECT a.id, date(a.waktu_datang) tanggal, b.nis,b.nama,b.tingkat,b.jurusan,b.kelas,time(a.waktu_datang) waktu_datang, time(a.waktu_pulang) waktu_pulang,a.ket FROM absensi a,siswa b where a.nis=b.nis order by 'id' desc");
			$today = mysqli_query($connection, "SELECT id FROM absensi WHERE date(waktu_datang)='$now'");
			$today = mysqli_num_rows($today);
			$index = mysqli_num_rows($getall);
			$no=1;
			while($nais = mysqli_fetch_assoc($getall)) {
				$absensi[] = array(
				'no' => $no,
				'id' => $nais['id'],
				'nis' => $nais['nis'],
				'nama' => $nais['nama'],
				'tingkat' => $nais['tingkat'],
				'jurusan' => $nais['jurusan'],
				'kelas' => $nais['kelas'],
				'tanggal' => $nais['tanggal'],
				'waktu_datang' => $nais['waktu_datang'],
				'waktu_pulang' => $nais['waktu_pulang'],
				'keterangan' => $nais['ket']);
				$no++;
			}if($index == 0){
				$absensi = array($index,"kosong");
			}
			$absensi = array($index,$today,$absensi);
			return $absensi;
		}
		function delete($connection,$id){
			echo $id;
			$query = mysqli_query($connection,"DELETE FROM absensi WHERE id='$id'");
			if($query){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
		function delete_all($connection){
			echo $id;
			$query = mysqli_query($connection,"DELETE FROM absensi");
			if($query){
				return TRUE;
			}else{
				return FALSE;
			} 
		}
		function update($connection,$absensi){
			$id = filter_var($absensi['id'],FILTER_SANITIZE_SPECIAL_CHARS);
			$nis = filter_var($absensi['nis'],FILTER_SANITIZE_SPECIAL_CHARS);
			$nama = filter_var($absensi['nama'],FILTER_SANITIZE_SPECIAL_CHARS);
			$tingkat = filter_var($absensi['tingkat'],FILTER_SANITIZE_SPECIAL_CHARS);
			$jurusan = filter_var($absensi['jurusan'],FILTER_SANITIZE_SPECIAL_CHARS);
			$kelas = filter_var($absensi['kelas'],FILTER_SANITIZE_SPECIAL_CHARS);
			$email_ortu = filter_var($absensi['email_ortu'],FILTER_SANITIZE_SPECIAL_CHARS);
			$update = mysqli_query($connection, "UPDATE absensi SET nis = '$nis', nama = '$nama', tingkat = '$tingkat', jurusan = '$jurusan', kelas = '$kelas', email_ortu = '$email_ortu' WHERE id = '$id'");
			if($update){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
?>
 
<?php
	$absen = new Absensi();
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