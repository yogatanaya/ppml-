<?php $title="Dokumen Utama"; ?>
<?php require_once('header.php') ?>
<?php require_once('sidebar.php') ?>
	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Dokumen Utama
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<fieldset>
						<!-- Jenis Dokumen-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM tb_jenis_dokumen"); 
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Jenis Dokumen</label>
									<div class="col-md-6">
									<select class="form-control" id="jenis_dokumen" name="jenis_dokumen">
										<option value="">Pilih Jenis Dokumen</option>

							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							      		?>
							      		<option value="<?php echo $baris[id_jenis_dokumen];?>"><?php echo $baris[jenis_dokumen];?></option>
							      		<?php
							    		}
							     		?>
									</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="kode">Kode</label>
									<div class="col-md-3">
									<input id="kode" name="kode" type="text" placeholder="kode" class="form-control" disabled>
									</div>
								</div>
	
								<!-- Judul Dokumen-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Judul</label>
									<div class="col-md-6">
									<input id="nama_dokumen" name="nama_dokumen" type="text" placeholder="Nama Dokumen" class="form-control">
									</div>
								</div>

								<!-- Status Dokumen-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM status_dokumen WHERE id_status_dokumen=3"); 
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Status</label>
									<div class="col-md-6">
									<select class="form-control" id="status" name="status">
										<option value="">Pilih status dokumen</option>

							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							      		?>
							      		<option value="<?php echo $baris[id_status_dokumen];?>"><?php echo $baris[status_dokumen];?></option>
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
									<label class="col-md-3 control-label" for="keterangan">Keterangan</label>
									<div class="col-md-6">
									<textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
									</div>
								</div>

								<!-- Tombol Submit -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
											<input type="submit" class="btn btn-primary btn-md pull-left" name="submit" value="Simpan">
									</div>
								</div>

									<hr>
								<!--catatan mutu-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM catatan_mutu"); 
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="catatan">Catatan</label>
									<div class="col-md-6">
									<select class="form-control" multiple="multiple" name="catatan[]">
									
							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							      		?>
							      		<option value="<?php echo $baris[judul];?>"><?php echo $baris[judul];?></option>
							      		<?php
							    		}
							     		?>
									</select>
									</div>
								</div>

								<!-- Tombol tambah catatan -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<a href="add_catatan.php" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></a>
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
	</script>		
</body>

</html>	
<?php
if(isset($_POST['submit'])){
	
	$nama_dokumen = $_POST['nama_dokumen'];
	$judul=$_POST['judul'];
	$jenis_dokumen = $_POST['jenis_dokumen'];
	$catatan=implode(',',$_POST['catatan']);

	//upload file
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
		$folder="../uploads/";


	$status=$_POST['status'];
	$keterangan=$_POST['keterangan'];
	$id_admin=$_SESSION['id_admin'];
	$entry_date=$_POST['entry_date'];
	$kode=$_POST['kode'];

	$query ="INSERT INTO tb_dokumen_baru 
			 (kode,nama_dokumen, catatan, jenis_dokumen, file, status, keterangan, id_admin, entry_date) values
			 ('$kode','$nama_dokumen','$catatan', '$jenis_dokumen', '$file', '$status', '$keterangan','$id_admin', NOW())";
	//die($query);
	$result = mysql_query($query);


	if($nama_dokumen==""||
		$status==""||
		$file==""||
		$jenis_dokumen==""){
		echo '<script>
			alert("salah satu kolom tidak bleh kosong");
			document.location="view_document.php";
		</script>';
	}else{
		if($result){
		echo '<script>
		alert("dokumen sudah tersimpan");
		document.location="view_document.php";
		</script>';
		move_uploaded_file($file_loc,$folder.$file);
		}
	}
}
?>