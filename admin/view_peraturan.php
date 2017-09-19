
	<?php $title="View Peraturan"; ?>
	<?php require_once('header.php') ?>
	<?php require_once('sidebar.php') ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> 
						Peraturan
					
					</div>
					
						 <!--export-->
					<div class="panel-heading">
						<form class="form-inline" action="export_peraturan.php" method="post">
							<div class="form-group">
								<label class="control-label" >Dari: </label>
							</div>
							<div class="form-group">
								<input type="date" name="dari" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label" >Sampai: </label>
							</div>
							<div class="form-group">
								<input type="date" name="sampai" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-default btn-md pull-right" name="export" value="Export">
							</div>
						</form>
					</div>

					<!--filter-->
					<div class="panel-heading">
						<form class="form-inline" action="" method="post">
							<div class="form-group">
								<label class="control-label">Filter:</label>
							</div>
							<div class="form-group">
							<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM tb_nomer"); 
							 ?>
								<select class="form-control" id="nomer" name="nomer">
										<option value=""></option>
							  			<?php
							    		while ($baris = mysql_fetch_array($hasil)){
							      		?>
							      		<option value="<?php echo $baris[id_nomer];?>"><?php echo $baris[nomer];?></option>
							      		<?php
							    		}
							     		?>
									</select>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-default btn-md pull-right" name="filter" value="filter">
							</div>
						</form>
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
						    	<th align="center">No.</th>
						    	<th data-field="nomer"  data-sortable="true">Nomor</th>
						    	<th data-field="judul"  data-sortable="true">Judul</th>
						    	<th data-field="tahun"  data-sortable="true">Tahun</th>
						        <th data-field="regulator"  data-sortable="true">Regulator</th>
						        <th data-field="unit"  data-sortable="true">Unit Terkait</th>
						        <th data-field="nama_admin"  data-sortable="true">Penanggung Jawab</th>
						        <th data-field="entry_date"  data-sortable="true">Waktu</th>
						        <th data-field="masa_berlaku"  data-sortable="true">Tanggal Terbit</th>
						        <th colspan="1">Opsi</th>					        
						    </tr>
						    </thead>
						    <tbody>
						    <?php
						    if (!isset($_POST['nomer']) || $_POST['nomer'] == "")
								$filter = "";
							else
								$filter = "where tb_peraturan.nomer = ".$_POST['nomer'];
						    $query = mysql_query("SELECT
							tb_nomer.nomer,
							tb_peraturan.id_peraturan,
							tb_peraturan.judul,
							tb_peraturan.tahun,
							regulator.regulator,
							tb_peraturan.entry_date,
							tb_peraturan.masa_berlaku,
							tb_peraturan.`file`,
							tb_admin.nama_admin,
							unit.unit
							FROM
							tb_admin
							Inner Join tb_peraturan ON tb_peraturan.id_admin = tb_admin.id_admin
							Inner Join tb_nomer ON tb_peraturan.nomer = tb_nomer.id_nomer
							Inner Join regulator ON tb_peraturan.regulator = regulator.id_regulator
							Inner Join unit ON unit.id_unit = tb_admin.unit
							".$filter."
							order by id_peraturan desc
							");
							$no=1;
						    while ($data = mysql_fetch_array($query)) {
					    	?>
					        <tr>
					        	<td align="center"><?php echo $no; ?></td>
					        	<td><?php echo $data['nomer']; ?></td>
					        	<td><?php echo $data['judul']; ?></td>
					           	<td><?php echo $data['tahun']; ?></td>         
					            <td><?php echo $data['regulator']; ?></td> 	
					            <td><?php echo $data['unit']; ?></td>
					            <td><?php echo $data['nama_admin']; ?></td>
					            <td><?php echo $data['entry_date']; ?></td>
					            <td><?php echo $data['masa_berlaku']; ?></td>   
					           	<td>
					           		<ul>
					           			<li>     
					    					<?php
											$file = $data['file']; //Let say If I put the file name Bang.png
											echo "<a href='../uploads/".$data['file']."' class='glyphicon glyphicon-download'></a> ";
											//echo "<a href='download_document.php?file=".$file."' class='glyphicon glyphicon-download'></a> ";
											?>
					    				</li>
					     				
					     				<li>
					           				<a href="edit_peraturan.php?id_peraturan=<?php echo $data['id_peraturan'];?>" class="glyphicon glyphicon-edit"></a>
					           			</li>
					           			<li>
					           				<a href="delete_peraturan.php?id_peraturan=<?php echo $data['id_peraturan'];?>" onclick="return confirm('Yakin mau di hapus?');" class="glyphicon glyphicon-trash"></a>
					           			</li>
		
					           		</ul>		     
					    			
					    		</td>

					    	<?php
						    $no++;
						  
						    }
						    ?>
					        </tr>  

						   	
					  		</tbody>
						</table>
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
