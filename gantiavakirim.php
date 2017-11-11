<?php 
/* ------------------ */
session_start();
include "connect.php";
$kenal = $_SESSION['id_user'];

$nama_gambar = $_FILES['avatar']['name'];

$uploaddir='css/images/avatar/';

		$alamatfile = $uploaddir.$nama_gambar;
		
move_uploaded_file($_FILES['avatar']['tmp_name'],$alamatfile);

$input = "UPDATE users SET avatar='$alamatfile' WHERE idu='$kenal'";
$hasil = mysql_query($input);
if($hasil){
?> <script>alert("perubahan telah disimpan!!!");
document.location='profil.php';
</script>
<?php
}else{
?> <script>alert("avatar gagal diubah");
document.location='profil.php';
</script><?php
}
?>