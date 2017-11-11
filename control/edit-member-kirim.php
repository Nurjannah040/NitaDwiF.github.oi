<?php
session_start();
if(isset($_SESSION['id_user'])){ 
	if($_SESSION['jabat'] == "admin"){
/*============================================================*/
include "../connect.php";

$idu = $_SESSION['idu'];

$nama = $_POST['nama'];
$web = $_POST['web'];
$email = $_POST['email'];
$jabat = $_POST["jabatan"];

$input = "UPDATE  users SET nama='$nama', web='$web', email='$email', jabat='$jabat' WHERE idu ='$idu'";
$hasil = mysql_query($input);
if($hasil){
?> <script>alert("perubahan telah disimpan!!!");
document.location='member.php';
</script>
<?php
}else{
?> <script>alert("data gagal diubah");
document.location='edit-member.php?idu=<?php echo $idu;?>';
</script><?php
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