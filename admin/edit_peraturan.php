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
		$id=$_GET['id_peraturan'];
		$query=mysql_query("SELECT * FROM tb_peraturan WHERE id_peraturan=$id");
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

								<!-- nomor -->
								
								
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM tb_nomer");
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="nomer">Nomer</label>
									<div class="col-md-3">
									<select class="form-control" id="nomer" name="nomer">
										
							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							    			if($baris['id_nomer'] == $edit['nomer']){  
							      			?>
							      				<option value="<?php echo $baris[id_nomer];?>" SELECTED><?php echo $baris[nomer];?></option>
							      			<?php
							      			}
							      			else{
							    				?><option value="<?php echo $baris[id_nomer];?>"><?php echo $baris[nomer];?></option>
											<?php
							      			}
							    		}
							     		?>
									</select>
									</div>
								</div>


								<!-- judul input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="judul">Judul</label>
									<div class="col-md-6">
									<input value="<?php echo $edit['judul'];?>" id="judul" name="judul" type="text"  class="form-control">
									</div>
								</div>


								<!--tahun-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="tahun">Tahun</label>
									<div class="col-md-6">
									<input value="<?php echo $edit['tahun'];?>" id="tahun" name="tahun" type="text"  class="form-control">
									</div>
								</div>

								<!--revisi-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM regulator");
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="regulator">Regulator</label>
									<div class="col-md-3">
									<select class="form-control" id="regulator" name="regulator">
										<option value=""></option>
							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							    			if($baris['id_regulator'] == $edit['regulator']){  
							      			?>
							      				<option value="<?php echo $baris[id_regulator];?>" SELECTED><?php echo $baris[regulator];?></option>
							      			<?php
							      			}
							      			else{
							    				?><option value="<?php echo $baris[id_regulator];?>"><?php echo $baris[regulator];?></option>
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
									<label class="col-md-3 control-label" for="name">Masa Berlaku</label>
									<div class="col-md-6">
									<input type="date" name="masa_berlaku" class="form-control" value="<?php echo $edit['masa_berlaku'];?>">
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

<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>		
</body>

</html>

<?php
if(isset($_POST['update'])){
	$judul = $_POST['judul'];
	$nomer = $_POST['nomer'];
	$tahun = $_POST['tahun'];
	$regulator = $_POST['regulator'];
	$masa_berlaku=$_POST['masa_berlaku'];

	IF($_FILES['file']['name']!=''){
			$file='../uploads/'.$edit['file'];
			@unlink($file);
			//tmp name ganti id dokumen
           	$tmp_name = $_FILES["file"]["tmp_name"];
           	$namefile = $_FILES["file"]["name"];
			$ext = end(explode(".", $namefile));
			$image_name=time().".".$ext;
            $fileUpload = move_uploaded_file($tmp_name,"../uploads/".$image_name);
	}
	else{
		$image_name=$edit['file'];
	}

	$query = "UPDATE tb_peraturan 
		SET judul='$judul',
		nomer='$nomer',
		tahun='$tahun',
		regulator='$regulator',
		masa_berlaku='$masa_berlaku',
		file = '$image_name' 
		WHERE judul='$judul'";


	$result=mysql_query($query);
	 
	if ($query) {
	    echo '<script language="javascript">
		alert("Dokumen berhasil direvisi!");
	    document.location="view_peraturan.php";</script>';
	}
}
?>