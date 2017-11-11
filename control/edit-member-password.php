<?php 
session_start();
if(isset($_SESSION['id_user'])){ 
	if($_SESSION['jabat'] == "admin"){
/*============================================================*/
include "../connect.php";

$kenal = $_SESSION['idu'];

$baru= md5($_POST['password_baru']);
$ulang= md5($_POST['ketik_ulang']);

if($baru == "d41d8cd98f00b204e9800998ecf8427e" || $ulang == "d41d8cd98f00b204e9800998ecf8427e"){
	?><script>alert("data kosong!!!");
	document.location='edit-member.php?idu=<?php echo $kenal;?>';
	</script><?php
} else{
if($baru == $ulang){ //falidasi password
$input = "UPDATE  users SET password='$baru' WHERE idu='$kenal'";
$hasil = mysql_query($input);
if($hasil){
?> <script>alert("perubahan telah disimpan!!!");
document.location='member.php';
</script>
<?php
}else{
?> <script>alert("password gagal diubah");
document.location='edit-member.php?idu=<?php echo $kenal;?>';
</script><?php
}
} else{
	?> <script>alert("'password baru' dan 'ketik ulang' tidak sama (harus sama). tolong ulangi lagi!!");
	document.location='edit-member.php?idu=<?php echo $kenal;?>';
	</script><?php
}
}
/*============================================================*/	
	}
	else{
		echo "Bukan Area Newbie";
	}
}
else {
	echo "Anda tidak memiliki akun";
}
?>