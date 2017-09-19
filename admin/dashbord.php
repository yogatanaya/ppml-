
    <?php $title="Dashboard"; ?>
    <?php require_once('header.php') ?>
    <?php require_once('sidebar.php') ?>
    
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="dashbord.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"></svg> <strong><?php echo $_SESSION['nama'];?></strong> login sebagai admin 
                </div>
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked heart"><use xlink:href="#stroked-heart"/></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="medium"><li><a href="add_catatan.php">Catatan</li></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-orange panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="medium"><li><a href="add_dokumen.php">Pengajuan</a></li></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="medium"><li><a href="view_document.php">Dokumen Unit</a></li></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-red panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="medium"><li><a href="view_peraturan.php">Peraturan</a></li></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
        
            <!-- /.row -->
             <!--TABEL DOKUMEN UTAMA-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Approved Document
                    </div>
                    <div class="panel-body">
                        <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">

                            <thead>
                            <tr>
                                
                                <th data-field="jenis_dokumen">Jenis</th>
                                <th data-field="nama_dokumen">Judul</th>
                                <th data-field="unit">Unit Terkait</th>
                                <th data-field="status_dokumen">Status</th>
                                <th data-field="keterangan">Keterangan</th>
                                <th data-field="catatan">Catatan</th>
                                
                                <th colspan="1">Opsi</th>                           
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = mysql_query("SELECT
                            tb_jenis_dokumen.jenis_dokumen,
                            tb_dokumen_baru.id_dokumen,
                            tb_dokumen_baru.nama_dokumen,
                            tb_dokumen_baru.keterangan,
                            tb_dokumen_baru.catatan,
                            tb_dokumen_baru.`file`,
                            status_dokumen.status_dokumen,
                            tb_dokumen_baru.entry_date,
                            unit.unit
                            FROM
                            tb_dokumen_baru
                            Inner Join tb_admin ON tb_dokumen_baru.id_admin = tb_admin.id_admin
                            Inner Join tb_jenis_dokumen ON tb_dokumen_baru.jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
                            Inner Join status_dokumen ON tb_dokumen_baru.`status` = status_dokumen.id_status_dokumen
                            Inner Join unit ON tb_admin.unit = unit.id_unit
                            WHERE
                            status_dokumen.id_status_dokumen =  '2'
                            ");

                            
                         
                           
                            while ($data = mysql_fetch_array($query)) {
                            ?>
                            <tr>
                                
                                <td><?php echo $data['jenis_dokumen']; ?></td>
                                <td><?php echo $data['nama_dokumen']; ?></td>
                                <td><?php echo $data['unit']; ?></td> 
                                <td><?php echo $data['status_dokumen']; ?></td>         
                                <td><?php echo $data['keterangan']; ?></td> 
                                <td><?php echo $data['catatan']; ?></td>
                                
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
        </div><!--/.row-->  


            <!-- /.row -->
    </div>  <!--/.main-->

   
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
