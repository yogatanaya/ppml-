<?php
include('config.php');
$id= $_GET['id_dokumen'];

$query1='SELECT * FROM tb_dokumen_baru Where id_dokumen="'.$id.'"';
$result1=mysql_query($query1);

if($result1){
	while($row=mysql_fetch_assoc($result1)){
		$file=$row['file'];
		
	}
}


$query='DELETE FROM tb_dokumen_baru where id_dokumen="'.$id.'"';
//die($query);
$result=mysql_query($query);
if($result){
	unlink("../uploads/".$file);
	echo '<script>
	alert("dokumen sudah terhapus");
	document.location="view_document.php";
	</script>';
	
}

?>