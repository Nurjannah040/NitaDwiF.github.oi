<?php 
/* -------------------------- */
session_start();
include "connect.php";
$kenal = $_SESSION['id_user'];

$baru= md5($_POST['password_baru']);
$ulang= md5($_POST['ketik_ulang']);

if($baru == "d41d8cd98f00b204e9800998ecf8427e" || $ulang == "d41d8cd98f00b204e9800998ecf8427e"){
	?><script>alert("data kosong!!!");
	document.location='gantipassword.php';
	</script><?php
} else{
if($baru == $ulang){ /* falidasi password */
$input = "UPDATE  users SET password='$baru' WHERE idu='$kenal'";
$hasil = mysql_query($input);
if($hasil){
?> <script>alert("perubahan telah disimpan!!!");
document.location='profil.php';
</script>
<?php
}else{
?> <script>alert("password gagal diubah");
document.location='profil.php';
</script><?php
}
} else{
	?> <script>alert("'password baru' dan 'ketik ulang' tidak sama (harus sama). tolong ulangi lagi!!");
	document.location='gantipassword.php';
	</script><?php
}
}
?>
?>