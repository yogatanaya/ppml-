<?php
include('config.php');
$id	= $_GET['id_peraturan'];

$query1='SELECT * FROM tb_peraturan Where id_peraturan="'.$id.'"';
$result1=mysql_query($query1);

if($result1){
	while($row=mysql_fetch_assoc($result1)){
		$file=$row['file'];
		
	}
}


$query='DELETE FROM tb_peraturan where id_peraturan="'.$id.'"';
$result=mysql_query($query);
if($result){
	unlink("../uploads/".$file);
	echo '<script>
	alert("dokumen peraturan eksternal sudah terhapus");
	document.location="view_peraturan.php";
	</script>';
	
}

?>