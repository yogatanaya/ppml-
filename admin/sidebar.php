<aside>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li><a href="dashbord.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Dashboard</a></li>
		
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon"></em><span class="glyphicon glyphicon-file"></span> Internal <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="add_dokumen.php">
							<span class="fa fa-arrow-right">&nbsp;</span> New
						</a>
					</li>
					<li><a class="" href="view_document.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Dokumen Utama
					</a></li>
					<li><a class="" href="view_catatan.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Catatan Mutu
					</a></li>
				
				</ul>
			</li>
			
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon"></em><span class="glyphicon glyphicon-file"></span> Peraturan <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="add_peraturan.php">
							<span class="fa fa-arrow-right">&nbsp;</span>New 
						</a>
					</li>
					<li><a class="" href="view_peraturan.php">
						<span class="fa fa-arrow-right">&nbsp;</span>Peraturan
					</a></li>
				</ul>
			</li>





			<div class="dropdown">
			 <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span>Lainnya
  			<span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="add_regulator.php"> Tambah Regulator</a></li>
					<li><a href="add_jenis_dokumen.php">Tambah Jenis Dokumen</a></li>
					<li><a href="add_nomor_peraturan.php">Tambah Nomor Peraturan</a></li>
					<li><a href="add_unit.php">Tambah Unit/Department</a></li>
				</ul>
			</div>
		
			<!--Data Dokumen user per unit-->
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-navicon"></em><span class="glyphicon glyphicon-folder-open"></span> Semua File <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li>
						<a class="" href="view_all_internal.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Dokumen Utama 
						</a>
					</li>
					<li><a class="" href="view_all_catatan.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Catatan Mutu
					</a></li>

					<li><a class="" href="view_all_peraturan.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Peraturan
					</a></li>
				</ul>
			</li>
			
			
		</ul>

	</div><!--/.sidebar-->
</aside>