<?php 
session_start(); 
$id = $_SESSION['id'];
$judul =$_POST['judul'];
$text =$_POST["text"];

include "connect.php";
$date = date("d/m/Y");
$input = "UPDATE  post SET judul='$judul', posting='$text', date='$date' WHERE id='$id'";
$hasil = mysql_query($input);
if ($hasil){ 
			?><script language="JavaScript">document.location='posts.php?id=<?php echo $id; ?>'</script><?php
		}
		else{ 
			echo "<p>kiriman gagal</p>";
		}
?>
