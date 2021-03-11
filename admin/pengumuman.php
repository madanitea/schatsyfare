<?php
    if(!defined("akses")){
        header("location:http://".$_SERVER["HTTP_HOST"]."/403");
    }
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Buat Pengumuman</h4>
                            </div>
                            <div class="content">
                                <form action="<?php echo $url; ?>/admin/pengumuman/post" method="POST">
                                    <textarea name="data" class="form-control" id="pengumuman" rows="3" placeholder="Buat pengumuman disini."></textarea>
                                    <br>
                                    <button class="btn btn-success" type="submit"><b>Post !</b></button>
                                </form>
                                    <hr>
                                <p class="category">Pengumuman akan tampil dihalaman absensi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Pengumuman</h4>
                                <br>
                                <a class="btn btn-danger" href="<?php print $url; ?>/admin/pengumuman/delete/all"><i class="fa fa-trash"></i>Hapus semua</a>
                            </div>
                            <div class="content">
                                    <table class="table table-borderless">
                                        <?php
                                            if($pengumumans == 'kosong'){
                                                ?>
                                                <tr>
                                                    <td><i>Tidak ada data.</i></td>
                                                </tr>
                                                <?php
                                            }else{
                                            foreach ($pengumumans as $umum) { ?>
                                        <tr>
                                            <td><?php print $umum['no']; ?></td>
                                            <td><?php print $umum['data']; ?><bR><strong><?php print $umum['tanggal']; ?></td>
                                            <td><a href="<?php print $url; ?>/admin/pengumuman/delete?id=<?php print $umum['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        <?php }} ?>
                                    </table>
                                    <hr>
                                    
                                <p class="category">Pengumuman yang sedang tampil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
        