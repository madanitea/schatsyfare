<?php
	// Konfigurasi database schatsyfare
	$databaseHost = 'localhost';
	$databaseName = 'schatsyfare';
	$databaseUsername = 'root';
	$databasePassword = '';
	$connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die(mysql_error());

	// $link adalah url setelah protokol dan domain... misal : http://xxx.xxx/"nah ini"
	$link = $_SERVER['REQUEST_URI'];
	$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'];
	$furl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	date_default_timezone_set('Asia/Jakarta');
?>