<?php 
session_start(); 
$id = $_SESSION['id'];
$idb = $_SESSION['balas'];
$komen =$_POST["text"];

include "connect.php";
$date = date("d/m/Y");
$input = "UPDATE  balas SET  komentar='$komen', date2='$date' WHERE id_balas='$idb'";
$hasil = mysql_query($input);
if ($hasil){ 
			?><script language="JavaScript">document.location='posts.php?id=<?php echo $id; ?>'</script><?php
		}
		else{ 
			echo "<p>kiriman gagal</p>";
		}
?>
