<?php $title="Catatan Mutu"; 
require_once 'header.php';
require_once 'sidebar.php'; 
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		</div><!--/.row-->
	
		<!--Tabel  -->
		
		<div class="panel panel-default">
			<div class="panel-heading">
			Catatan Mutu
			</div>
			
				 <!--export-->
					<div class="panel-heading">
						<form class="form-inline" action="export_catatan.php" method="post">
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

			
			<div class="panel-body">
			<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
				<thead>
					<tr>
					<th data-field="judul">Judul</th>
					<th data-field="status_cm">Status</th>
					<th data-field="masa_simpan">Masa Berlaku</th>
					<th data-field="lokasi_simpan">Lokasi Simpan</th>
					<th data-field="metode">Metode</th>
					<th data-field="entry_date">Waktu</th>
					<th data-field="keterangan">Keterangan</th>
					<th data-field="nama_admin">Penanggung Jawab</th>
					<th colspan="1">Opsi</th>					        
					</tr>
				</thead>
				<tbody>
				<?php
				$query = mysql_query("
				SELECT
				catatan_mutu.id_catatan,
				catatan_mutu.judul,
				status_cm.status_cm,
				catatan_mutu.masa_berlaku,
				catatan_mutu.lokasi_simpan,
				catatan_mutu.`file`,
				catatan_mutu.keterangan,
				catatan_mutu.entry_date,
				metode.metode,
				tb_admin.nama_admin
				FROM
				tb_admin
				Inner Join catatan_mutu ON tb_admin.id_admin = catatan_mutu.id_admin
				Inner Join status_cm ON catatan_mutu.status_cm = status_cm.id_status_cm
				Inner Join metode ON catatan_mutu.id_metode = metode.id_metode
				order by id_catatan desc 
				");
				while ($data = mysql_fetch_array($query)) {
					    	?>
					        <tr>
					        	<td><?php echo $data['judul']; ?></td>
					           	<td><?php echo $data['status_cm']; ?></td>
					           	<td><?php echo $data['masa_berlaku']; ?></td> 
					           	<td><?php echo $data['lokasi_simpan']; ?></td>         
					            <td><?php echo $data['metode']; ?></td>
					           	<td><?php echo $data['entry_date']; ?></td>
					           	<td><?php echo $data['keterangan']; ?></td>
					   			<td><?php echo $data['nama_admin']; ?></td>
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
					    				<a href="edit_catatan.php?id_catatan=<?php echo $data['id_catatan']; ?>" class="glyphicon glyphicon-edit"></a>
					    				</li>	
					             		
					    				<li>
					           				<a href="delete_catatan.php?id_catatan=<?php echo $data['id_catatan'];?>" onclick="return confirm('Yakin mau di hapus?');" class="glyphicon glyphicon-trash"></a>
					           			</li>
					    			</ul>
					    		</td>
					        </tr>  
						    <?php
						    }
						    ?>
					  		</tbody>
						</table>
					</div>
				</div>
		
		
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

