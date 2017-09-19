<?php $title="Dokumen Utama"; ?>
<?php require_once('header.php') ?>
<?php require_once('sidebar.php') ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">

					<!--form dokumen baru-->
					<div class="panel-heading">
					 	Dokumen Utama
					 	
					 </div>

					 <!--export-->
					<div class="panel-heading">
						<form class="form-inline" action="export_document.php" method="post">
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
							<?php
								include "config.php";
								error_reporting(0);
								$hasil=mysql_query("SELECT * FROM tb_jenis_dokumen"); 
							 ?>
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
						    	<th data-field="kode">Kode</th>
						    	<th data-field="jenis_dokumen">Jenis</th>
						    	<th data-field="nama_dokumen">Judul</th>
						    	<th data-field="unit">Unit Terkait</th>
						    	<th data-field="revisi">Revisi Ke- </th>
						    	<th data-field="status_dokumen">Status</th>
						        <th data-field="entry_date">Waktu</th>
						        <th data-field="catatan">Catatan</th>
						        <th data-field="keterangan">Keterangan</th>
						        <th colspan="1">Opsi</th>					        
						    </tr>
						    </thead>
						    <tbody>
						    <?php
							if (!isset($_POST['jenis_dokumen']) || $_POST['jenis_dokumen'] == "")
								$filter = "";
							else
								$filter = "where tb_dokumen_baru.jenis_dokumen = ".$_POST['jenis_dokumen'];
					    

						    $query = mysql_query("SELECT
							tb_dokumen_baru.id_dokumen,
							tb_dokumen_baru.kode,
							tb_dokumen_baru.nama_dokumen,
							tb_jenis_dokumen.jenis_dokumen,
							tb_dokumen_baru.keterangan, 
							tb_dokumen_baru.catatan, 
							tb_dokumen_baru.revisi,
							tb_dokumen_baru.`file`,
							tb_dokumen_baru.entry_date,
							status_dokumen.status_dokumen,
							unit.unit
							FROM
							tb_dokumen_baru
							Inner Join tb_admin ON tb_dokumen_baru.id_admin = tb_admin.id_admin
							Inner Join tb_jenis_dokumen ON tb_dokumen_baru.jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
							Inner Join status_dokumen ON tb_dokumen_baru.`status` = status_dokumen.id_status_dokumen
							Inner Join unit ON unit.id_unit = tb_admin.unit
							".$filter."
							order by id_dokumen desc 
							
							");
							$no=1;
						    while ($data = mysql_fetch_array($query)) {
					    	?>
					        <tr>
					        	<td align="center"><?php echo $no;?></td>
					        	<td><?php echo $data['kode']; ?></td>
					        	<td><?php echo $data['jenis_dokumen']; ?></td>
					           	<td><?php echo $data['nama_dokumen']; ?></td>
					           	<td><?php echo $data['unit']; ?></td> 
					           	<td><?php echo $data['revisi']; ?></td>
					           	<td><?php echo $data['status_dokumen']; ?></td>
					           	<td><?php echo $data['entry_date']; ?></td>
					           	<td><?php echo $data['catatan']; ?></td>		
					            <td><?php echo $data['keterangan']; ?></td>	
					       		
					           	
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
					           				<a href="edit_dokumen.php?id_dokumen=<?php echo $data['id_dokumen'];?>" class="glyphicon glyphicon-edit"></a>
					           			</li>
					           			<li>
					           				<a href="delete_document.php?id_dokumen=<?php echo $data['id_dokumen'];?>" onclick="return confirm('Yakin mau di hapus?');" class="glyphicon glyphicon-trash"></a>
					           			</li>
					           			
					           			
					       
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
