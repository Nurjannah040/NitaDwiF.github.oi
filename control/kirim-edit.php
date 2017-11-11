<?php
session_start();
if(isset($_SESSION['id_user'])){ 
	if($_SESSION['jabat'] == "admin"){
/*============================================================*/
include "../connect.php";

$idk = $_SESSION['idk'];

$kategori = $_POST['kategori'];
$deskripsi = $_POST["deskripsi"];

$input = "UPDATE  kategori SET nama_kategori='$kategori', detail='$deskripsi' WHERE id_kategori ='$idk'";
$hasil = mysql_query($input);
if($hasil){
?> <script>alert("perubahan telah disimpan!!!");
document.location='category.php';
</script>
<?php
}else{
?> <script>alert("data gagal diubah");
document.location='editisicategory.php?idk=<?php echo $idk;?>';
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