<?php

require '../config.php';
require '../admin/Model/pengaturan.php';
$pengaturans = $pengaturan->all($connection);
// $batas_datang = $pengaturan['waktu_datang'];
foreach ($pengaturans as $pengaturan) {
	switch ($pengaturan['variable']) {
		case 'Waktu Datang':
			$datang = $pengaturan['value'];	
			break;
		case 'Waktu Pulang':
			$pulang = $pengaturan['value'];
			break;
		case 'Email':
			$email = $pengaturan['value'];
			break;
		case 'Password':
			$password = $pengaturan['value'];
			break;
		case 'Mail Server':
			$server = $pengaturan['value'];
			break;
		case 'Port SMTP':
			$port = $pengaturan['value'];
			break;
	}
}
$time = date('H:i:s');
$look = strtotime($datang)-strtotime($time);
$liik = strtotime($pulang)-strtotime($time);
if($look < 0 and $liik < 0){
	// Disini absensi pulang
	$now = date('yy-m-d');
	$nis = filter_var($_POST['id'],FILTER_SANITIZE_SPECIAL_CHARS);
			$wikwiw = mysqli_query($connection,"SELECT id FROM absensi WHERE nis='$nis' AND date(waktu_pulang)='$now'");
			$wakwaw = mysqli_num_rows($wikwiw);
			if($wakwaw > 0){
				echo "Mohon maaf, kepulangan ".$_POST['id']." hari ini telah terdata. [".$now."]";
			}else{
				$hem = mysqli_query($connection,"SELECT id FROM absensi WHERE nis='$nis' AND date(waktu_datang)='$now'");
				$hem= mysqli_fetch_array($hem);
				$id=$hem['id'];
				$post = mysqli_query($connection, "UPDATE absensi SET waktu_pulang=now() WHERE id='$id'");
				if($post){
					echo "Siswa dengan nis ".$_POST['id']." telah pulang, Terimakasih. [".$now."]";
					return TRUE;
				}else{
					echo "Mohon maaf absensi pulang gagal dilakukan.";
					return FALSE;
				} 
			}
}elseif($look >0 and $liik > 0){
	// Disini absensi datang
	$now = date('yy-m-d');
	$nis = filter_var($_POST['id'],FILTER_SANITIZE_SPECIAL_CHARS);
			$wikwiw = mysqli_query($connection,"SELECT id FROM absensi WHERE nis='$nis' AND date(waktu_datang)='$now'");
			$wakwaw = mysqli_num_rows($wikwiw);
			if($wakwaw > 0){
				echo "Mohon maaf, kehadiran ".$_POST['id']." hari ini telah terdata. [".$now."]";
			}else{
				$time = date('h:m:s');
				$telatga = strtotime($time)-strtotime('07:00');
				if($telatga > 0){
					$telatga = "terlambat";
				}else{
					$telatga = "hadir";
				}
				$post = mysqli_query($connection, "INSERT INTO absensi(nis,waktu_datang,waktu_pulang,ket) VALUES('$nis',now(),'$waktu_pulang','$telatga')");
				if($post){
					echo "Siswa dengan nis ".$_POST['id']." telah diabsen, Terimakasih. [".$now."]";
					return TRUE;
				}else{
					echo "Mohon maaf absensi gagal dilakukan.";
					return FALSE;
				} 
			}
}else{
	echo "belum waktunya";
}
?>