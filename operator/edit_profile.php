	<?php $title="My Profile"; ?>
	<?php require_once('header.php') ?>
	<?php require_once('sidebar.php') ?>



	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">Edit Profile</a></li>
			</ol>
		</div><!--/.row-->
	
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Edit Profile</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<fieldset>

								<!--username-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Username</label>
									<div class="col-md-6">
									<input  id="username" name="username" type="text" class="form-control" value="<?php echo $_SESSION['admin'];?>" disabled>
									</div>
								</div>

							<hr>


							<div class="form-group">
									<label class="col-md-3 control-label" for="name">Password Baru</label>
									<div class="col-md-6">
									<input name="newpassword" id="newpassword" type="password" placeholder="Password Baru" class="form-control">
									</div>
							</div>

							<div class="form-group">
									<label class="col-md-3 control-label" for="name">Konfirmasi Password Baru</label>
									<div class="col-md-6">
									<input name="confirmpassword" id="confirmpassword" type="password" placeholder="Password Baru" class="form-control">
									</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 widget-right">
								<input type="submit" class="btn btn-primary btn-md pull-right" name="submit-pass" value="Submit">
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
	<script src="js/bootstrap-table.js"></script>
  <script>
    $(document).ready(function(){

        $('#reply-comment').click(function(){           
                $('#form1').toggle( 'slow' );
        });
    });
  </script>
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
if(isset($_POST['submit-pass'])){
	$id=$_SESSION['id_admin'];
	$newpass=$_POST['newpassword'];
	$confirmpassword=$_POST['confirmpassword'];
		if($confirmpassword==$newpass){
				$sqlAdd ="UPDATE tb_admin SET password='$newpass' WHERE id_admin='$id'";
			  	mysql_query($sqlAdd);
			  	echo '<script language="javascript">
			  	alert("password berhasil dirubah");
			  	</script>';
		}
		else{
			echo '<script language="javascript">alert("Password baru tidak sama!");
			 history.back();
			 </script>';
		}
	 	
}

?>