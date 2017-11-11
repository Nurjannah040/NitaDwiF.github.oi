<?php
session_start();
include "../connect.php";
if(isset($_SESSION['id_user'])){ 
	if($_SESSION['jabat'] == "admin"){
/*============================================================*/
$idk=$_GET['idk'];

$input = "DELETE FROM kategori WHERE id_kategori ='$idk'";
$hasil = mysql_query($input);
if($hasil){
$input2 = mysql_query("DELETE FROM post WHERE id_kategori ='$idk'");
$input3 = mysql_query("DELETE FROM balas WHERE id_kategori ='$idk'");
?><script>alert("data telah dihapus!!!");
document.location='category.php';
</script>
<?php
}else{
?><script>alert("data gagal dihapus");
document.location='category.php';
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