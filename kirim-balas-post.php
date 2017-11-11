<?php session_start(); 
$idu = $_SESSION['id_user'];
$id_kategori = $_SESSION['id_kategori'];

$id = $_SESSION['id'];
$text = $_POST["text"];
echo $id_kategori;
include "connect.php";
$date2 = date("d/m/Y");
$hasil = mysql_query("INSERT INTO balas(id, idu, komentar, date2,id_kategori) VALUES('$id', '$idu', '$text', '$date2','$id_kategori')");
if ($hasil){ 
mysql_query("UPDATE users SET jml_posting=jml_posting+1 WHERE '$idu'=idu");
			?><script language="JavaScript">document.location='posts.php?id=<?php echo $id; ?>'</script><?php
		}
		else{ 
			echo "<p>kiriman gagal</p>";
		}
?>
