<?php $title="Peraturan"; ?>
<?php require_once('header.php') ?>
<?php require_once('sidebar.php') ?>
	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Peraturan
			</div>
			<div class="panel-body">
				 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<fieldset>


								<!--nomer-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM tb_nomer"); 
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nomor</label>
									<div class="col-md-6">
									<select class="form-control" id="nomer" name="nomer">
										<option value="">Pilih Nomor Peraturan</option>

							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							      		?>
							      		<option value="<?php echo $baris[id_nomer];?>"><?php echo $baris[nomer];?></option>
							      		<?php
							    		}
							     		?>
									</select>
									</div>
								</div>

								<!-- Judul Dokumen-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Judul</label>
									<div class="col-md-6">
									<input id="judul" name="judul" type="text" placeholder="judul Peraturan" class="form-control">
									</div>
								</div>

								<!--tahun-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Tahun</label>
									<div class="col-md-6">
									<input id="tahun" name="tahun" type="text" placeholder="tahun" class="form-control">
									</div>
								</div>

								

								<!--regulator-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM regulator"); 
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">regulator</label>
									<div class="col-md-6">
									<select class="form-control" id="regulator" name="regulator">
										<option value="">Pilih regulator</option>

							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							      		?>
							      		<option value="<?php echo $baris[id_regulator];?>"><?php echo $baris[regulator];?></option>
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

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Masa Berlaku:</label>
									<div class="col-md-6">
									<input id="masa_berlaku" name="masa_berlaku" type="date"  class="form-control">
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
	</script>		
</body>

</html>	
<?php 
if(isset($_POST['submit'])){

	$nomer=$_POST['nomer'];
	$judul = $_POST['judul'];
	$masa_berlaku=$_POST['masa_berlaku'];
	$tahun = $_POST['tahun'];
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
		$folder="../uploads/";
	$regulator=$_POST['regulator'];
	$id_admin=$_SESSION['id_admin'];
	$entry_date=$_POST['entry_date'];

	$query = "INSERT INTO tb_peraturan 
			(nomer,judul,tahun,file,regulator,id_admin, entry_date, masa_berlaku) values
			('$nomer','$judul', '$tahun', '$file','$regulator','$id_admin', NOW(), '$masa_berlaku')";
			//die($query);
	$result = mysql_query($query);

	//validasi
	if($nomer==""||$judul==""||$tahun==""||$file==""||
		$regulator==""){
		echo '<script>
		alert("salah satu kolom tidak boleh kosong");
		</script>';
	}
	else {
		if($result){
		echo '<script>
		alert("Peraturan sudah tersimpan");
		document.location="view_peraturan.php";
		</script>';
		move_uploaded_file($file_loc,$folder.$file);
		}
	}
	
}
?>