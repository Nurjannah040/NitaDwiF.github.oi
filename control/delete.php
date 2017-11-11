<?php session_start();if(isset($_SESSION['id_user'])){ 	if($_SESSION['jabat'] == "admin"){
/*============================================================*/
include "../connect.php";$idu=$_GET['idu'];
$input = "DELETE FROM users WHERE idu ='$idu'";
$hasil = mysql_query($input);
if($hasil){
$input2 = mysql_query("DELETE FROM post WHERE idu ='$idu'");
$input3 = mysql_query("DELETE FROM balas WHERE idu ='$idu'");
?><script>alert("user telah dihapus!!!");
document.location='member.php';</script>
<?php
}else{
?><script>
alert("user gagal dihapus");
document.location='member.php';</script>
<?php 
}
/*============================================================	*/	
}	else{		
echo "Bukan Area Newbie";	}
}else {	echo "Anda tidak memiliki akun";}?>