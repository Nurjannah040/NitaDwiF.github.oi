<?php 
session_start(); 
include "connect.php"; 

$nama = htmlentities($_POST['nama']); 
$email = htmlentities($_POST['email']); 
$password = md5($_POST['password']);
$nope = htmlentities($_POST['nope']); 
$web = htmlentities($_POST['web']);  
$avatar = "css/images/avatar/akun.png";
$jabat = "user"; 
$tanggal = date("d/m/Y");

$hasil = mysql_query("INSERT INTO users(nama, email, password, nope, web, tanggal, jabat, avatar)VALUES('$nama','$email','$password','$nope','$web','$tanggal', '$jabat', '$avatar')");
		 
if($hasil){ echo "<script>
	  alert('Pendaftaran Berhasil, Happy Discussion :)');
	  window.location = 'Login.php';
	  </script>";}
Else
{echo "<script>
	  alert('Ups, Sepertinya ada kesalahan');
	  window.location = 'daftar.php';
	  </script>";
	  }  
?>


       