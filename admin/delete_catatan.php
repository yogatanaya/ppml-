<?php
include('config.php');
$id	= $_GET['id_catatan'];

$query1='SELECT * FROM catatan_mutu Where id_catatan="'.$id.'"';
$result1=mysql_query($query1);

if($result1){
	while($row=mysql_fetch_assoc($result1)){
		$file=$row['file'];
	}
}


$query='DELETE FROM catatan_mutu where id_catatan="'.$id.'"';
$result=mysql_query($query);
if($result){
	unlink("../uploads/".$file);
	echo '<script>
	alert("Catatan mutu sudah terhapus");
	document.location="view_catatan.php";
	</script>';
}

?>