<?php
    if(!defined("akses")){
        header("location:http://".$_SERVER["HTTP_HOST"]."/403");
    }
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($pengaturans as $atur) { ?>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <?php echo $atur['icon']; ?>
                                    </div>
                                    <div class="col-xs-10">
                                        <div class="numbers">
                                            <p><?php print $atur['variable']; ?></p>
                                            <textarea disabled="" class="form-control" style="font-size: 20pt;text-align: right;color: black;background-color: white;padding: 0px;height: 40px;"><?php print $atur['value']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer text-right">
                                    <hr>
                                    <form method="POST" action="<?php echo $url; ?>/admin/pengaturan/edit">
                                        <input type="hidden" name="variable" value="<?php print $atur['id']; ?>">
                                        <input type="text" class="form-control" style="border: 2px solid #eee;margin-bottom: 5px;" name="value" value="" required="">
                                        <button type="submit" class="btn btn-danger bg-success">Update !</button>
                                    </form>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Last modified : <?php print $atur['last']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>