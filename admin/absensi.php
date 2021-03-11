<?php
    if(!defined("akses")){
        header("location:http://".$_SERVER["HTTP_HOST"]."/403");
    }
?>
<style type="text/css">
    .form-table{
        border:none;
        font-size: 12pt;
        content: none;
    }
    .form-table:focus{
        background-color: #EEE;
        border-radius: 5px;
    }
</style>
<div class="content">
            <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Siswa</p>
                                            <?php echo $siswas[0]; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Hadir</p>
                                            <?php echo $today['hadir']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Siswa telah absen hari ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Terlambat</p>
                                            <?php echo $today['terlambat']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Siswa telah absen hari ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-primary text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Tepat Waktu</p>
                                            <?php echo $today['tepat_waktu']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Siswa telah absen hari ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-primary text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Sakit</p>
                                            <?php echo $today['sakit']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Siswa telah absen hari ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Izin</p>
                                            <?php echo $today['izin']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Siswa telah absen hari ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Alfa</p>
                                            <?php echo $today['alfa'];?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Siswa telah absen hari ini
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title float-left">Data Absensi</h4>
                                <hr>
                            </div>
                            <div class="content">
                                    <div class="table-responsive">
                                    <table class="table table-stripped table-borderless table-hover" border="0" id="data">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Datang</th>
                                                <th>Pulang</th>
                                                <th>Ket</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($absens[0]>0){foreach ($absens[2] as $absen) { ?>
                                            <tr>
                                                <td><?php echo $absen['no']; ?></td>
                                                <td><?php echo $absen['tanggal']; ?></td>
                                                <td><?php echo $absen['nis']; ?></td>
                                                <td><?php echo $absen['nama']; ?></td>
                                                <td>
                                                    <?php echo $absen['tingkat']; ?> -
                                                    <?php echo $absen['jurusan']; ?> -
                                                    <?php echo $absen['kelas']; ?>
                                                </td>
                                                <td><?php echo $absen['waktu_datang']; ?></td>
                                                <td><?php echo $absen['waktu_pulang']; ?></td>
                                                <td><?php echo $absen['keterangan']; ?></td>
                                                </form>
                                            </tr>
                                            <?php }}; ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>