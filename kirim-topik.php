<?php session_start(); 
$idu = $_SESSION['id_user'];
$id_kategori = $_SESSION['id_kategori'];
$judul =$_POST['judul'];
$text =$_POST["text"];

include "connect.php";
$date = date("d/m/Y");
$hasil = mysql_query("INSERT INTO post(judul, id_kategori, idu, posting, date) VALUES('$judul', '$id_kategori', '$idu', '$text', '$date')");
if ($hasil){ 
mysql_query("UPDATE users SET jml_posting=jml_posting+1 WHERE '$idu'=idu");
			?><script language="JavaScript">document.location='topik.php?id_kategori=<?php echo $id_kategori; ?>'</script><?php
		}
		else{ 
			echo "<p>kiriman gagal</p>";
		}
?>
