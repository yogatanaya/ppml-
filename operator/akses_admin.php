<?php
session_start();
 
if(!isset($_SESSION['admin'])){
	echo '<script language="javascript">alert("Anda harus Login/daftar terlebih dahulu!"); document.location="index.php";</script>';
}
?>