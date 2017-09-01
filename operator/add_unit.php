
	<?php $title="Lainnya"; ?>
	<?php require_once('header.php') ?>
	<?php require_once('sidebar.php') ?>
		

		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
			</ol>
		</div><!--/.row-->
		
	
		<!--FORM 1-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<fieldset>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Unit/ Department</label>
									<div class="col-md-6">
									<input id="unit" name="unit" type="text" class="form-control">
									</div>
								</div>
						
								<!-- Tombol Submit -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<input type="submit" class="btn btn-primary btn-md pull-left" name="submit" value="Tambah">
									</div>
								</div>


							</fieldset>
						</form>
					</div>
				</div>				
			</div><!--/.col-->
		</div><!--/.row-->

						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		<div class="panel-body">
		<!--TABEL DOKUMEN UTAMA-->

	</div><!--/.main-->

	


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
	
	$id_unit=$_POST['id_unit'];
	$unit=$_POST['unit'];


	$query ="INSERT INTO unit 
			(id_unit,unit) values
			('$id_unit','$unit')";
	$result = mysql_query($query);


	if ($query) {
	    echo '<script language="javascript">
		alert("Unit telah ditambahkan!");
	    </script>';
	}
}


?>