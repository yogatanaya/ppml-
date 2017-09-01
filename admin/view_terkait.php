<?php $title="Terkait"; ?>
<?php require_once('header.php') ?>
<?php require_once('sidebar.php') ?>		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">

					<!--form dokumen baru-->
					<div class="panel-heading">
					 	Terkait
					 	<a href="add_terkait.php" class="btn btn-primary  btn-md pull-right">Tautkan Dokumen</a>
					 </div>


		<div class="panel-body">


		<!--TABEL DOKUMEN UTAMA-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">

						    <thead>
						    <tr>
						    	<th data-align="center">No.</th>
						    	<th data-field="nama_dokumen">Dokumen Utama</th>
						    	<th data-field="catatan_mutu">Catatan Mutu</th>
						    	<th colspan="1">Opsi</th>
						    	
						     					        
						    </tr>
						    </thead>
						    <tbody>
						    <?php
						    $no=1;
						    $query = mysql_query("SELECT
							terkait.nama_dokumen,
							terkait.catatan_mutu,
							terkait.id_terkait
							FROM
							terkait
							order by id_terkait desc 
							");
						    while ($data = mysql_fetch_array($query)) {
					    	?>
					        <tr>
					        	<td><div align="center"><?php echo $no; ?></div></td>
					        	<td><?php echo $data['nama_dokumen'];?></td>
					           	<td><?php echo $data['catatan_mutu']; ?></td>
					      		<td>
					           		<ul>
					           			<li><a href="delete_terkait.php?id_terkait=<?php echo $data['id_terkait'];?>" class="glyphicon glyphicon-trash" onclick="return confirm('Yakin mau di hapus?');" ></a></li>
					           		</ul>
					           	</td>
					        </tr>  

						    <?php
						    $no++;
						 
						    }
						    ?>
					  		</tbody>
						</table>
					</div>
				</div>
			</div>
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
