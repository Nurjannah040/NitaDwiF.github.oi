<?php session_start(); 
include "connect.php";
$idu = $_SESSION['id_user'];
$id = $_GET['post'];
$input = "DELETE FROM post WHERE id = '$id'";
$hasil = mysql_query($input);
if($hasil){
$input2 = mysql_query("DELETE FROM balas WHERE id ='$id'");

$id = $_SESSION['id'];
$sql="SELECT jml_posting FROM users WHERE idu='$idu'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
$rows['jml_posting'] = $rows['jml_posting'] - 1;
$jml_posting = $rows['jml_posting'];
$input3 = mysql_query("UPDATE users SET jml_posting='$jml_posting' WHERE idu='$idu'");

?><script>alert("data telah dihapus!!!");
document.location='category.php';
</script>
<?php
}else{
?><script>alert("data gagal dihapus");
document.location='posts.php?id=<?php echo $id;?>';
</script><?php
}
?>