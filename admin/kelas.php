<?php
    if(!defined("akses")){
        header("location:http://".$_SERVER["HTTP_HOST"]."/403");
    }
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-crown"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
                                            <p>Daftar Tingkat Tersedia</p>
                                            <?php print $tingkats[0]; ?> Tingkat
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <form style="text-align: right;" method="POST" action="<?php echo $url; ?>/admin/kelas/tingkat/post">
                                        <input type="number" class="form-control" min="1" name="tingkat" style="border-left: 2px solid #42A084;" required>
                                        <button class="btn btn-success" type="submit">Tambah !</button>
                                    </form>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <?php if($tingkats[0]>0){foreach ($tingkats[1] as $tingkat) { ?>
                                    <div class="badge badge-lg bg-success" style="background-color: #42A084;color: #fff;font-size: 12;padding: 10px;margin-bottom: 5px;">
                                        <?php print $tingkat['tingkat']; ?><a href="<?php echo $url; ?>/admin/kelas/tingkat/delete?id=<?php echo $tingkat['id']; ?>" style="color: #fff;margin-left: 10px;">X</a>
                                    </div>
                                    <?php }}; ?>
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
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-car"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
                                            <p>Daftar Jurusan Tersedia</p>
                                            <?php print $jurusans[0]; ?> Jurusan
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <form style="text-align: right;" method="POST" action="<?php echo $url; ?>/admin/kelas/jurusan/post">
                                        <input type="text" class="form-control" min="1" name="jurusan" style="border-left: 2px solid #F3BB45;" required>
                                        <button class="btn btn-warning">Tambah !</button>
                                    </form>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <?php if($jurusans[0]>0){foreach ($jurusans[1] as $jurusan) { ?>
                                    <div class="badge badge-lg bg-warning" style="background-color: #F3BB45;color: #fff;font-size: 12pt;padding: 10px;margin-bottom: 3px;">
                                        <?php print $jurusan['jurusan']; ?><a href="<?php echo $url; ?>/admin/kelas/jurusan/delete?id=<?php echo $jurusan['id']; ?>" style="color: #fff;margin-left: 10px;">X</a>
                                    </div>
                                    <?php }}; ?>
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
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="icon-big icon-primary text-center">
                                            <i class="ti-blackboard"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
                                            <p>Daftar Kelas Tersedia</p>
                                            <?php print $kelass[0]; ?> Kelas
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <form style="text-align: right;" method="POST" action="<?php echo $url; ?>/admin/kelas/kelas/post">
                                        <input type="text" class="form-control" min="1" name="kelas" style="border-left: 2px solid #427C89;" required>
                                        <button class="btn btn-primary">Tambah !</button>
                                    </form>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <?php if($kelass[0]>0){foreach ($kelass[1] as $kelas) { ?>
                                    <div class="badge badge-lg bg-primary" style="background-color: #427C89;color: #fff;font-size: 10pt;padding: 10px;margin-bottom: 3px;">
                                        <?php print $kelas['kelas']; ?><a href="<?php echo $url; ?>/admin/kelas/kelas/delete?id=<?php echo $kelas['id']; ?>" style="color: #fff;margin-left: 10px;">X</a>
                                    </div>
                                    <?php }}; ?>
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
                </div>
            </div>
        </div>