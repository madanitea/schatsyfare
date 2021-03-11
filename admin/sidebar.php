<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text" style="font-family: fredoka one;">
                    SCHATSYFARE
                </a>
            </div>

            <ul class="nav">
                <li class="<?php if($link == "/admin/"){ echo "active";}; ?>">
                    <a href="http://localhost/admin/">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?php if($link == "/admin/absensi"){ echo "active";}; ?>">
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
            </ul>
        </div>
    </div>
