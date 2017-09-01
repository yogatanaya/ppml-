<?php
$title="Semua File Internal";
require_once('header.php');
require_once('sidebar.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Semua file internal
			</div>
			<div class="panel-body">
				<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">

						    <thead>
						    <tr>
						    	
						    	<th data-field="nama_dokumen">Judul</th>
						    	<th data-field="file">File</th>
						    	<th data-field="entry_date">Waktu</th>
						        <th colspan="1">Opsi</th>					        
						    </tr>
						    </thead>
						    <tbody>
						    <?php
						    $query = mysql_query("SELECT
							tb_dokumen_baru.nama_dokumen,
							tb_dokumen_baru.id_dokumen,
							tb_dokumen_baru.entry_date,
							tb_dokumen_baru.`file`
							FROM
							tb_dokumen_baru

							");
						    while ($data = mysql_fetch_array($query)) {
					    	?>
					        <tr>
					           	<td><?php echo $data['nama_dokumen']; ?></td>
					           	<td><?php echo $data['file']; ?></td> 
					           	<td><?php echo $data['entry_date']; ?></td> 			           	
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
					           				<a href="delete_document.php?id_dokumen=<?php echo $data['id_dokumen'];?>" onclick="return confirm('Yakin mau di hapus?');" class="glyphicon glyphicon-trash"></a>
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