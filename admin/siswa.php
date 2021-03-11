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
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Ditambah hari ini</p>
                                            <?php echo $siswas[1]; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Last day
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
                                            <p>Tambah Siswa</p>
                                            Tambahkan siswa baru disini.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sx-12 p-2">
                                        <hr />
                                            <form action="<?php echo $url; ?>/admin/siswa/post" method="POST">
                                                <input type="number" name="nis" min="0" placeholder="NIS" class="form-control" style="color: black;" required>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama" style="color: black;" required>
                                                        <select name="tingkat" style="width: 28%;padding: 7px;border:none;color: black;margin-left: 5px;outline:none;font-size:12pt;" required>
                                                            <option>-- Tingkat --</option>
                                                            <?php if($tingkats[0]>0){foreach ($tingkats[1] as $tingkat) { ?>
                                                            <option><?php print $tingkat['tingkat']; ?></option>
                                                            <?php }}; ?>
                                                        </select>
                                                        <select name="jurusan" style="width: 28%;padding: 7px;border:none;color: black;margin-left: 15px;outline:none;font-size:12pt;" required>
                                                            <option>-- Jurusan --</option>
                                                            <?php if($jurusans[0]>0){foreach ($jurusans[1] as $jurusan) { ?>
                                                            <option><?php print $jurusan['jurusan']; ?></option>
                                                            <?php }}; ?>
                                                        </select>
                                                        <select name="kelas" style="width: 28%;padding: 7px;border:none;color: black;margin-left: 15px;outline:none;font-size:12pt;" required>
                                                            <option>-- Kelas --</option>
                                                            <?php if($kelass[0]>0){foreach ($kelass[1] as $kelas) { ?>
                                                            <option><?php print $kelas['kelas']; ?></option>
                                                            <?php }}; ?>
                                                        </select>
                                                    <input type="email" name="email" class="form-control" placeholder="Email Orang Tua" style="color: black;" required>
                                                    <button type="submit" class="btn btn-danger" style="margin-left: 10px;margin-top: 5px;">+</button>
                                            </form>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-timer"></i> In the last hour
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
                                <h4 class="title float-left">Data Siswa</h4>
                                <hr>
                                <p><b>Note : </b>Edit data langsung di tabel. Setelah selesai klik <b><i>"update".</i></b></p>
                            </div>
                            <div class="content">
                                    <div class="table-responsive">
                                    <table class="table table-stripped table-borderless table-hover" border="0" id="data">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Email Orang Tua</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($siswas[0]>0){foreach ($siswas[2] as $siswa) { ?>
                                            <tr>
                                                <form action="<?php echo $url; ?>/admin/siswa/update" method="POST">
                                                <td><?php echo $siswa['no']; ?></td>
                                                <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">
                                                <td><input class="form-table" style="width: 110px;" type="number" name="nis" value="<?php echo $siswa['nis']; ?>"></td>
                                                <td style="width: 250px;"><input class="form-table" style="width: 250px;" type="text" name="nama" value="<?php echo $siswa['nama']; ?>"></td>
                                                <td>
                                                    <select class="form-table" name="tingkat">
                                                        <option><?php echo $siswa['tingkat']; ?></option>
                                                        <?php if($tingkats[0]>0){foreach ($tingkats[1] as $tingkat) { ?>
                                                            <option><?php print $tingkat['tingkat']; ?></option>
                                                            <?php }}; ?>
                                                    </select>
                                                    <select class="form-table" name="jurusan">
                                                        <option><?php echo $siswa['jurusan']; ?></option>
                                                        <?php if($jurusans[0]>0){foreach ($jurusans[1] as $jurusan) { ?>
                                                            <option><?php print $jurusan['jurusan']; ?></option>
                                                            <?php }}; ?>
                                                    </select>
                                                    <select class="form-table" name="kelas">
                                                        <option><?php echo $siswa['kelas']; ?></option>
                                                        <?php if($kelass[0]>0){foreach ($kelass[1] as $kelas) { ?>
                                                            <option><?php print $kelas['kelas']; ?></option>
                                                            <?php }}; ?>
                                                    </select>
                                                </td>
                                                <td><input class="form-table" type="email" name="email" value="<?php echo $siswa['email_ortu']; ?>"></td>
                                                <td><button type="submit" class="btn btn-sm btn-info" style="border-right: none;border-top-right-radius: 0;border-bottom-right-radius: 0;">Update</button><a class="btn btn-sm btn-danger" href="<?php echo $url;?>/admin/siswa/delete?id=<?php echo $siswa['id']; ?>" style="border-left: none;border-top-left-radius: 0;border-bottom-left-radius: 0;">Hapus</a></td>
                                                </form>
                                            </tr>
                                            <?php }}; ?>
                                        </tbody>
                                    </table>
                                    <a href="<?php echo $url; ?>/admin/siswa/delete/all" class="btn btn-danger">Hapus semua data siswa.</a>
                                    </div>
                                    <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>