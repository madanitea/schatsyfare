<?php
	// Required Configuration file
	require "config.php";

	// Required Model
	require "admin/Model/pengaturan.php";
	require "admin/Model/pengumuman.php";
	require "admin/Model/absensi.php";

	$absensi = $absen->today_data($connection);
	$pengaturans = $pengaturan->all($connection);
	foreach ($pengaturans as $pengaturan) {
		switch ($pengaturan['variable']) {
    		case "Waktu Datang" :
        		$waktu_datang = $pengaturan['value'];
        		break;
        	case "Waktu Pulang" :
        		$waktu_pulang = $pengaturan['value'];
        		break;
    	};
	}
	$pengumumans = $pengumuman->select_all($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title>SCHATSYFARE</title>
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/clock.css">
	<style type="text/css">
		.full {
			position: fixed;
			top: 0;
			bottom: 0;
		}
		.first-row {
			height: 100vh;
		}
		.left-panel {
			width: 20vw;
		}
		.primary-panel {
			width: 80vw;
		}
		#container { height:155px;overflow:hidden; 
			margin-top: 163px;
			margin-left: -4px;
			border-radius:5px;
			box-shadow: 0 0 0 8px #0f1620;
			width: 261px;
			position: fixed;
			z-index: 999;
		}
#content { background:#eee; border-radius: 5px;padding: 10px;}
	</style>
</head>
<body>
	<div class="container-fluid bg-light full">
		<div class="row first-row">
			<div class="left-panel">
				<div class="card h-100 border-0">
					<div class="card-body bg-dark">
						<div id="clock" class="dark" style="transform:scale(.9);margin-left: -29px;margin-top: -15px;z-index: 999;">
							<div class="display">
								<div class="weekdays"></div>
								<div class="ampm"></div>
								<div class="digits"></div>
								<h5 style="font-family: calibri;margin-top: 5px;" id="today"></h5>
							</div>
						</div>
						<div class="bg-black presensi text-white row text-center">
							<strong style="margin:10px auto;margin-top: 0;" id="presensi"></strong>
							<div class="pres-info bg-white text-dark"><h1 id="siswa_today"></h1><h6 id="total_siswa"></h6></div>
							<div class="pres-info bg-white text-dark" style="margin-left: 10px;"><h1 id="persen_hadir"></h1><h6>Dari 100%</h6></div>
						</div>
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
						<div id="container" class="bg-black">
							<div id="content" class="bg-white">
    							<?php
                                            if($pengumumans == 'kosong'){
                                                ?>
                                                <p>Tidak ada data.</p>
                                                <?php
                                            }else{
                                            foreach ($pengumumans as $umum) { ?>
                                            <strong><?php print $umum['data']; ?><bR></strong><?php print $umum['tanggal']; ?><br>
                                        <?php }} ?>
							</div>
						</div>
						<div class="bg-black info">
							<h5 class="text-center text-white"><strong>INFORMASI</strong></h5>
							<div class="con-info bg-white text-black">
								<strong>Jam datang :</strong>
								<br><?php echo $waktu_datang; ?>
								<br>
								<strong>Jam pulang :</strong>
								<br><?php echo $waktu_pulang; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="primary-panel">
				<div class="card h-100 border-0">
					<div class="card-body bg-dark" style="padding-top: 11px;padding-right: 10px;">
						<div class="table-responsive table-wrap" id="table-wrap">
							<table class="table table-borderless" id="table-data">
									<!-- DISINI DATANYA CUK -->
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- REQUIRED JAVASCRIPT, jquery, popper, bootstrap -->
	<script src="asset/js/jquery-3.4.1.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
	<script src="asset/js/moment.min.js"></script>
	<script src="asset/js/clock.js"></script>
	<script type="text/javascript">
		function tabel(data){
			$("#table-data").html('')
			for(let i = 0;i<data.length;i++){
				var satu = data[i]
				if(satu['keterangan'] == 'hadir'){
					var kur = "bg-white"
					var telat = `TEPAT WAKTU`
				}else{
					var kur = "bg-info"
					var telat = `TERLAMBAT `+satu['terlambat'][0]+` Jam `+satu['terlambat'][1]+` Menit `+satu['terlambat'][2]+` Detik`
				}
				$("#table-data").append(`<tr>
										<td><div class="card"><div class="card-body p-3">`+satu['waktu_datang']+` AM</div></div></td><td><div class="card bg-pink"><div class="card-body p-3">`+satu['waktu_pulang']+` PM</div></div></td><td class="bg-black text-grey w-75"><h4>`+satu['nama']+`</h4><p><strong>`+satu['nis']+`</strong> | `+satu['tingkat']+` - `+satu['jurusan']+` - `+satu['kelas']+`</p></td><td><div class="card `+kur+`"><div class="card-body p-3 `+kur+` text-dark">`+telat+`</div></div></td>
									</tr>`)
				console.log('loop')
			}
		}
		setInterval(function(){
			$.ajax({
				url: "http://localhost/admin/apiv1_today_absence",
				method: "GET",
				success: function(data){
					var data = JSON.parse(data)
					console.log(data)
					$('#today').html(data[0])
					$('#presensi').html('PRESENSI ' + data[4])
					$('#siswa_today').html(data[1])
					$('#total_siswa').html('Dari '+data[5]+' Siswa')
					$('#persen_hadir').html(data[2]+'%')
					tabel(data[3])
				},
				error : function(data){
					console.log(data)
					$("#table-data").html('')
				}
			})
		},1000)
		function scrollToBottom() {
		   var scrollBottom = Math.max($('#table-data').height() - $('#table-wrap').height() + 0, 0);
		   $('#table-wrap').scrollTop(scrollBottom);
		}
		$(document).ready(scrollToBottom);
	</script>
	<script type="text/javascript">
		$(document).ready(function() {

    if ($('#content').height() > $('#container').height()) {
        setInterval(function () {

            start();
       }, 3000); 
   
    }
});

function animateContent(direction) {  
    var animationOffset = $('#container').height() - $('#content').height()-20;
    if (direction == 'up') {
        animationOffset = 0;
    }

    console.log("animationOffset:"+animationOffset);
    $('#content').animate({ "marginTop": (animationOffset)+ "px" }, 5000);
}

function up(){
    animateContent("up")
}
function down(){
    animateContent("down")
}

function start(){
 setTimeout(function () {
    down();
}, 2000);
 setTimeout(function () {
    up();
}, 2000);
   setTimeout(function () {
    console.log("wait...");
}, 5000);
}    
	</script>
</body>
</html>