<?php
	session_start();
	mysql_connect("localhost","root","");
	mysql_select_db("db_bandara");
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql = mysql_query("SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
	if(mysql_num_rows($sql) == 0){
		echo '<script language="javascript">alert("username /  password salah, silahkan ulangi lagi"); document.location="index.php";</script>';
		
	    }else{
		$user = mysql_fetch_array($sql);
		if($user['tipe'] == 0){
		    $_SESSION['admin']=$username;
			$_SESSION['nama'] = $user['nama_admin'];
			//$_SESSION['username']=$user['username'];
			$_SESSION['unit']=$user['unit'];
			$_SESSION['id_admin'] = $user['id_admin'];			
			echo '<script language="javascript">alert("'.$user['nama_admin'].' berhasil Login sebagai Admin!"); document.location="admin/dashbord.php?admin='.$user['id_admin'].'";</script>';
	}
	else{
		$_SESSION['admin']=$username;
		$_SESSION['nama'] = $user['nama_admin'];
		//$_SESSION['username']=$user['username'];		
		$_SESSION['unit']=$user['unit'];
		$_SESSION['id_admin'] = $user['id_admin'];			
		echo '<script language="javascript">alert("'.$user['nama_admin'].' berhasil Login sebagai user!"); document.location="operator/dashbord.php?admin='.$user['id_admin'].'";</script>';
	}
}

?>