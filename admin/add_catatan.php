<?php $title="Catatan Mutu"; ?>
<?php require_once('header.php') ?>
<?php require_once('sidebar.php') ?>
	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Catatan
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<fieldset>
						<!-- Judul Catatan-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Judul</label>
									<div class="col-md-6">
									<input id="judul" name="judul" type="text" placeholder="judul catatan mutu" class="form-control">
									</div>
								</div>


								<!-- Status Dokumen-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM status_cm"); 
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Status</label>
									<div class="col-md-6">
									<select class="form-control" id="status_cm" name="status_cm">
										<option value="">Status</option>

							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							      		?>
							      		<option value="<?php echo $baris[id_status_cm];?>"><?php echo $baris[status_cm];?></option>
							      		<?php
							    		}
							     		?>
									</select>
									</div>
								</div>

								<!--Masa Berlaku-->

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Masa Berlaku:</label>
									<div class="col-md-6">
									<input id="masa_simpan" name="masa_berlaku" type="date"  class="form-control">
									</div>
								</div>
									
								<!--Lokasi Simpan-->

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Lokasi Simpan</label>
									<div class="col-md-3">
									<input id="lokasi_simpan" name="lokasi_simpan" type="text" placeholder="Lokasi Simpan" class="form-control">
									</div>
								</div>

								<!--Metode Simpan-->

								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM metode"); 
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Metode</label>
									<div class="col-md-6">
									<select class="form-control" id="id_metode" name="id_metode">
										<option value="">Metode</option>

							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							      		?>
							      		<option value="<?php echo $baris[id_metode];?>"><?php echo $baris[metode];?></option>
							      		<?php
							    		}
							     		?>
									</select>
									</div>
								</div>
						

								<!-- Isi Dokumen-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="file">File</label>
									<div class="col-md-6">
									<input id="file" name="file" type="file" placeholder="file" class="form-control">
									</div>
								</div>

								<!--keterangan-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Keterangan</label><div class="col-md-6">
										<textarea class="form-control" rows="5" name="keterangan"></textarea>
									</div>
								</div>

							
								<!-- Tombol Submit -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<input type="submit" class="btn btn-primary btn-md pull-left" name="submit" value="Simpan">
									</div>
								</div>

								
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	
}
	</script>		
</body>

</html>

	
<?php
if(isset($_POST['submit'])){
	
	$judul = $_POST['judul'];
	$status_cm = $_POST['status_cm'];
	//upload file
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
		$folder="../uploads/";

	$keterangan=$_POST['keterangan'];
	$masa_berlaku=$_POST['masa_berlaku'];
	$lokasi_simpan=$_POST['lokasi_simpan'];
	$id_metode=$_POST['id_metode'];
	$entry_date=$_POST['entry_date'];
	$id_admin=$_SESSION['id_admin'];

	$query ="INSERT INTO catatan_mutu 
			 (judul, status_cm, file, masa_berlaku, lokasi_simpan,keterangan, id_metode, entry_date, id_admin) values
			 ('$judul', '$status_cm','$file', '$masa_berlaku', '$lokasi_simpan','$keterangan', '$id_metode', NOW(), '$id_admin')";
	$result = mysql_query($query);


	if($judul==""||
		$status_cm==""||
		$file==""||
		$masa_berlaku==""||
		$lokasi_simpan==""||
		$id_metode==""){
		echo '<script>
			alert("salah satu kolom tidak bleh kosong");
		</script>';
	}else{
		if($result){
		echo '<script>
		alert("catatan mutu sudah tersimpan");
		document.location="view_catatan.php";
		</script>';
		move_uploaded_file($file_loc,$folder.$file);
		}
	}
}
?>