<?php 
session_start();
if(isset($_SESSION['id_user'])){ 
	if($_SESSION['jabat'] == "admin"){
/*============================================================*/
include "../connect.php";

$tambah = $_POST['tambah'];
$tanggal = date("d/m/Y");
$tipe = $_SESSION['type'];

if($tambah == ""){ ?>
<script>alert("Tidak Boleh Kosong");
document.location='category.php';
</script><?php
}
else if($tipe == ""){
?>
<script>alert("Tentukan kategori forum terlebih dahulu");
document.location='category.php';
</script><?php
}
else if($tipe == "Pilihan Kategori Forum"){
?>
<script>alert("Tentukan kategori forum terlebih dahulu");
document.location='category.php';
</script><?php
}
else{
$input = "INSERT INTO kategori(nama_kategori, datetime, type) VALUES('$tambah','$tanggal','$tipe')";
$hasil = mysql_query($input);

$sql="SELECT id_kategori FROM kategori WHERE type='$tipe' AND datetime='$tanggal'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

?><script>alert("data telah disimpan, inputkan deskripsi sub kategori");
document.location='form-tambah.php?idk=<?php echo $rows['id_kategori'];?>';
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