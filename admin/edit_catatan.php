<?php
$title="Revisi";
include 'header.php';
include 'sidebar.php';

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		</div><!--/.row-->
		
		<?php
		error_reporting(0);
		$id=$_GET['id_catatan'];
		$query=mysql_query("SELECT * FROM catatan_mutu WHERE id_catatan=$id");
		$edit = mysql_fetch_array($query);
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Revisi
					</div>
					<div class="panel-body">
						<form class="form-horizontal" name="data" method="post" action="" enctype="multipart/form-data">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Judul</label>
									<div class="col-md-6">
									<input value="<?php echo $edit['judul'];?>" id="judul" name="judul" type="text"  class="form-control">
									</div>
								</div>
							
								<!--statusCM-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM status_cm");
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Status</label>
									<div class="col-md-3">
									<select class="form-control" id="status_cm" name="status_cm">
										
							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							    			if($baris['id_status_cm'] == $edit['status_cm']){  
							      			?>
							      				<option value="<?php echo $baris[id_status_cm];?>" SELECTED><?php echo $baris[status_cm];?></option>
							      			<?php
							      			}
							      			else{
							    				?><option value="<?php echo $baris[id_status_cm];?>"><?php echo $baris[status_cm];?></option>
											<?php
							      			}
							    		}
							     		?>
									</select>
									</div>
								</div>

								<!--Masa Simpan-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Masa Berlaku</label>
									<div class="col-md-6">
									<input value="<?php echo $edit['masa_berlaku'];?>" id="masa_berlaku" name="masa_berlaku" type="date"  class="form-control"> 
									</div>
								</div>

								<!--lokasi-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Lokasi Simpan</label>
									<div class="col-md-3">
									<input value="<?php echo $edit['lokasi_simpan'];?>" id="lokasi_simpan" name="lokasi_simpan" type="text"  class="form-control">
									</div>
								</div>

								<!--metode-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM metode");
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Metode</label>
									<div class="col-md-3">
									<select class="form-control" id="id_metode" name="id_metode">
										<option value="">Pilih Metode</option>

							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							    			if($baris['id_metode'] == $edit['id_metode']){  
							      			?>
							      				<option value="<?php echo $baris[id_metode];?>" SELECTED><?php echo $baris[metode];?></option>
							      			<?php
							      			}
							      			else{
							    				?><option value="<?php echo $baris[id_metode];?>"><?php echo $baris[metode];?></option>
											<?php
							      			}
							    		}
							     		?>
									</select>
									</div>
								</div>

								<!--file-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">File</label>
									<div class="col-md-6">
									<?php echo $edit['file'];?>
									<input id="file" name="file" type="file"  class="form-control">
									</div>
								</div>
								

								
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Keterangan</label>
									<div class="col-md-6">
									<textarea class="form-control" rows="5" cols="20" name="keterangan"></textarea>
									</div>
								</div>

								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<input type="submit" class="btn btn-default btn-md pull-left" name="update" value="Update">
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>


								
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

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
if(isset($_POST['update'])){
	$judul = $_POST['judul'];
	$status_cm = $_POST['status_cm'];
	$keterangan = $_POST['keterangan'];
	$id_metode=$_POST['id_metode'];
	$masa_berlaku=$_POST['masa_berlaku'];
	$lokasi_simpan=$_POST['lokasi_simpan'];
	$entry_date=$_POST['entry_date'];
	//$file=$_POST['file'];

	IF($_FILES['file']['name']!=''){
				 $file='../uploads/'.$edit['file'];
				 @unlink($file);
           	     $tmp_name = $_FILES["file"]["tmp_name"];
            	 $namefile = $_FILES["file"]["name"];
				 $ext = end(explode(".", $namefile));
				 $image_name=time().".".$ext;
            	 $fileUpload = move_uploaded_file($tmp_name,"../uploads/".$image_name);
	}
	else{
				$image_name=$edit['file'];
	}

	$query = "UPDATE catatan_mutu 
		SET judul='$judul',
		status_cm='$status_cm',
		keterangan='$keterangan',
		id_metode='$id_metode',
		masa_berlaku='$masa_berlaku',
		entry_date=NOW(),
		lokasi_simpan='$lokasi_simpan',
		file = '$image_name' 
		WHERE judul='$judul'";

	$result=mysql_query($query);
	 
	if ($query) {
	    echo '<script language="javascript">
		alert("catatan mutu berhasil direvisi!");
	    document.location="view_catatan.php";</script>';
	}
}
?>