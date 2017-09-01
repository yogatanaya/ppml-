<?php
$title="Revisi Dokumen";
include 'header.php';
include 'sidebar.php';

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		</div><!--/.row-->
		
		<?php
		error_reporting(0);
		$id=$_GET['id_dokumen'];
		$query=mysql_query("SELECT * FROM tb_dokumen_baru WHERE id_dokumen=$id");
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
									<input value="<?php echo $edit['nama_dokumen'];?>" id="nama_dokumen" name="nama_dokumen" type="text"  class="form-control">
									</div>
								</div>
							
								<!--jenis dokumen-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM tb_jenis_dokumen");
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Jenis Dokumen</label>
									<div class="col-md-3">
									<select class="form-control" id="jenis_dokumen" name="jenis_dokumen">
									
							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							    			if($baris['id_jenis_dokumen'] == $edit['jenis_dokumen']){  
							      			?>
							      				<option value="<?php echo $baris[id_jenis_dokumen];?>" SELECTED><?php echo $baris[jenis_dokumen];?></option>
							      			<?php
							      			}
							      			else{
							    				?><option value="<?php echo $baris[id_jenis_dokumen];?>"><?php echo $baris[jenis_dokumen];?></option>
											<?php
							      			}
							    		}
							     		?>
									</select>
									</div>
								</div>

								<!--status dokumen-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM status_dokumen Where id_status_dokumen!=2");
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Status Dokumen</label>
									<div class="col-md-3">
									<select class="form-control" id="status" name="status">
										
							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							    			if($baris['id_status_dokumen'] == $edit['status']){  
							      			?>
							      				<option value="<?php echo $baris[id_status_dokumen];?>" SELECTED><?php echo $baris[status_dokumen];?></option>
							      			<?php
							      			}
							      			else{
							    				?><option value="<?php echo $baris[id_status_dokumen];?>"><?php echo $baris[status_dokumen];?></option>
											<?php
							      			}
							    		}
							     		?>
									</select>
									</div>
								</div>

								<!--revisi-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM revisi");
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Revisi Ke-</label>
									<div class="col-md-3">
									<select class="form-control" id="revisi" name="revisi">
										
							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							    			if($baris['id_revisi'] == $edit['revisi']){  
							      			?>
							      				<option value="<?php echo $baris[id_revisi];?>" SELECTED><?php echo $baris[revisi];?></option>
							      			<?php
							      			}
							      			else{
							    				?><option value="<?php echo $baris[id_revisi];?>"><?php echo $baris[revisi];?></option>
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
									<select class="form-control"  name="catatan[]" multiple>
										
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
	$nama_dokumen = $_POST['nama_dokumen'];
	$jenis_dokumen = $_POST['jenis_dokumen'];
	$status = $_POST['status'];
	$catatan=implode(',',$_POST['catatan']);
	$keterangan = $_POST['keterangan'];
	$revisi=$_POST['revisi'];

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

	$query = "UPDATE tb_dokumen_baru 
		SET nama_dokumen='$nama_dokumen',
		jenis_dokumen='$jenis_dokumen',
		status='$status',
		catatan='$catatan',
		revisi='$revisi',
		keterangan='$keterangan',
		entry_date=NOW(),
		file = '$image_name' 
		WHERE nama_dokumen='$nama_dokumen'";


	$result=mysql_query($query);
	 
	if ($query) {
	    echo '<script language="javascript">
		alert("Dokumen berhasil direvisi!");
	    document.location="view_document.php";</script>';
	}
}
?>