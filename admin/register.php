<?php $title="Register"; ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
	


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
 					New User</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama</label>
									<div class="col-md-6">
									<input id="nama" name="nama_admin" type="text" class="form-control" placeholder="nama anda">
									</div>
								</div>

								<!--combobox unit-->
								<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM unit"); 
							  	?>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Unit</label>
									<div class="col-md-6">
									<select class="form-control" id="unit" name="unit">
							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							      		?>
							      		<option value="<?php echo $baris[id_unit];?>"><?php echo $baris[unit];?></option>
							      		<?php
							    		}
							     		?>
									</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Username</label>
									<div class="col-md-6">
									<input id="username" name="username" type="text" placeholder="Username" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Password</label>
									<div class="col-md-6">
									<input id="password" name="password" type="password" placeholder="Password" class="form-control">
									</div>
								</div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<input type="submit" class="btn btn-primary btn-md pull-left" name="submit">
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>

				
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
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
if(isset($_POST['submit'])){
	$nama_admin = $_POST['nama_admin'];
	$unit=$_POST['unit'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($unit==1){
		$query1 = "INSERT into tb_admin (nama_admin, unit, username, password, date_user, tipe) values ('$nama_admin','$unit', '$username', '$password','NOW()',0)";
		$result1=mysql_query($query1);

		if ($result1) {
	    	echo '<script language="javascript">
			alert("Data admin berhasil ditambah!");
	    	document.location="register.php";</script>';
	    }
	}

	else{
		$query2 = "INSERT into tb_admin (nama_admin, unit, username, password, date_user, tipe) values ('$nama_admin','$unit', '$username', '$password','NOW()',1)";
		$result2=mysql_query($query2);

		if ($result2) {
	    	echo '<script language="javascript">
			alert("Data user berhasil ditambah!");
	    	document.location="register.php";</script>';
	    }
	}

}
?>