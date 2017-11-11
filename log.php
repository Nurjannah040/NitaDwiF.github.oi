<?php 

session_start();
if(isset($_POST['username'])){
	include "connect.php";
		$username = htmlentities($_POST['username']);
		$password = md5($_POST['password']);
		$sql = mysql_query("SELECT * FROM users where email ='$username' AND password='$password'");
		$record = mysql_fetch_array($sql);
		$ada = mysql_num_rows($sql);
		if($ada>0)
		{
			$_SESSION['username']= $username;
			$_SESSION['id_user'] = $record['idu'];
			$_SESSION['jabat'] = $record['jabat'];
			?><script language="JavaScript">
			document.location='home.php'</script><?php
		}
		else
		{
			unset($_POST['id_user']);
			?><script language="JavaScript">alert('Email atau Password yang anda masukkan salah, silahkan ulangi lagi!');
			document.location='login.php'</script><?php
		}
}else{
	unset($_POST['id_user']);
	?><script language="javascript">document.location.href='login.php'</script><?php
}
?>