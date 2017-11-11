<?php 
/* -------------- */ 
session_start(); 
include "connect.php";
$kenal = $_SESSION['id_user'];

$nama=$_POST['nama'];
$nope=$_POST['nope'];
$email=$_POST['email'];
$website=$_POST['web'];

$input = "UPDATE  users SET nama='$nama', nope='$nope', email='$email', web='$website' WHERE idu='$kenal'";
$hasil = mysql_query($input);
if($hasil){
?> <script>alert("perubahan telah disimpan!!!");
document.location='profil.php';
</script>
<?php
}else{
?> <script>alert("data gagal diubah");
document.location='profil.php';
</script><?php
}
?>