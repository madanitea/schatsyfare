<?php
    if(!defined("akses")){
        header("location:http://".$_SERVER["HTTP_HOST"]."/403");
    }
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php print $page; ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text" style="font-family: fredoka one;">
                    SCHATSYFARE
                </a>
            </div>

            <ul class="nav">
                <li class="<?php if($link == "/admin/absensi" or $link == "/admin/"){ echo "active";}; ?>">
                    <a href="http://localhost/admin/absensi">
                        <i class="ti-view-list-alt"></i>
                        <p>Data Absensi</p>
                    </a>
                </li>
                <li class="<?php if($link == "/admin/siswa"){ echo "active";}; ?>">
                    <a href="http://localhost/admin/siswa">
                        <i class="ti-user"></i>
                        <p>Data Siswa</p>
                    </a>
                </li>
                <li class="<?php if($link == "/admin/kelas"){ echo "active";}; ?>">
                    <a href="http://localhost/admin/kelas">
                        <i class="ti-blackboard"></i>
                        <p>Data Kelas</p>
                    </a>
                </li>
                <li class="<?php if($link == "/admin/pengumuman"){ echo "active";}; ?>">
                    <a href="http://localhost/admin/pengumuman">
                        <i class="ti-announcement"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/admin/logout">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php print $page; ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                                <p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
                                    <p>Pemberitahuan</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="http://localhost/admin/pengaturan" style="<?php if($link == "/admin/pengaturan"){ echo "color:red;";}; ?>"  >
                                <i class="ti-settings"></i>
                                <p>Pengaturan</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>