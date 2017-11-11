<?php 
if(isset($_SESSION['id_user'])){ 
	if($_SESSION['jabat'] == "admin"){
?>
<?php
include "../connect.php"; 
if(isset($_POST['tipe'])){
$tipe = $_POST['tipe'];
$_SESSION['type']= $tipe;
if($tipe == "JAVA_PROGRAMING"|| $tipe == "JAVA_PROGRAMING"){ ?>
<center><h2>JAVA PROGRAMING</h2></center>
<table class="table table-bordered table-hover table-striped tablesorter">	
<tr>
				<th>KATEGORI</th>
				<th colspan="2" style="text-align:center;">Action</th>
				</tr>
	<tr>
				<?php 
				$sql="SELECT * FROM kategori WHERE type='JAVA_PROGRAMING'";
				$result=mysql_query($sql);
				while($rows=mysql_fetch_array($result)){ 
				?>
				<tr>
				<td bgcolor="#ebebeb"><img src="../css/images/kategori.png" style="margin: 0 20px 0 20px;"/>
				<a href="editisicategory.php?idk=<?php echo $rows['id_kategori'];?>"><?php echo "<b>".$rows['nama_kategori']."</b>"; ?></a>
				</td>
				<td bgcolor="#ebebeb" align="center" style="vertical-align:middle;"><a href="editisicategory.php?idk=<?php echo $rows['id_kategori'];?>"><img src="../css/images/edit.png" title="edit"/></a></td>
				<td bgcolor="#ebebeb" align="center" style="vertical-align:middle;"><a href="hapus-kategori.php?idk=<?php echo $rows['id_kategori'];?>" onclick='return confirm("Anda yakin akan menghapus data tersebut ?")'><img src="../css/images/delete.png" title="hapus" /></a></td>
				</tr>
				<?php
				}?>	
	</tr>
</table>
<?php } else if($tipe == "ANROID_PROGRAMING"|| $tipe == "ANROID_PROGRAMING"){
?>
<center><h2>ANROID PROGRAMING</h2></center>
<table class="table table-bordered table-hover table-striped tablesorter">	
<tr>
				<th>KATEGORI</th>
				<th colspan="2" style="text-align:center;">Action</th>
				</tr>
	<tr>
				<?php 
				$sql="SELECT * FROM kategori WHERE type='ANROID_PROGRAMING'";
				$result=mysql_query($sql);
				while($rows=mysql_fetch_array($result)){ 
				?>
				<tr>
				<td bgcolor="#ebebeb"><img src="../css/images/kategori.png" style="margin: 0 20px 0 20px;"/>
				<a href="editisicategory.php?idk=<?php echo $rows['id_kategori'];?>"><?php echo "<b>".$rows['nama_kategori']."</b>"; ?></a>
				</td>
				<td bgcolor="#ebebeb" align="center" style="vertical-align:middle;"><a href="editisicategory.php?idk=<?php echo $rows['id_kategori'];?>"><img src="../css/images/edit.png" title="edit"/></a></td>
				<td bgcolor="#ebebeb" align="center" style="vertical-align:middle;"><a href="hapus-kategori.php?idk=<?php echo $rows['id_kategori'];?>" onclick='return confirm("Anda yakin akan menghapus data tersebut ?")'><img src="../css/images/delete.png" title="hapus" /></a></td>
				</tr>
				<?php
				}?>	
	</tr>
</table>
<?php
}
else if($tipe == "JARINGAN_KOMPUTER"|| $tipe == "JARINGAN_KOMPUTER"){
?>
<center><h2>JARINGAN KOMPUTER</h2></center>
<table class="table table-bordered table-hover table-striped tablesorter">	
<tr>
				<th>KATEGORI</th>
				<th colspan="2" style="text-align:center;">Action</th>
				</tr>
	<tr>
				<?php 
				$sql="SELECT * FROM kategori WHERE type='JARINGAN_KOMPUTER'";
				$result=mysql_query($sql);
				while($rows=mysql_fetch_array($result)){ 
				?>
				<tr>
				<td bgcolor="#ebebeb"><img src="../css/images/kategori.png" style="margin: 0 20px 0 20px;"/>
				<a href="editisicategory.php?idk=<?php echo $rows['id_kategori'];?>"><?php echo "<b>".$rows['nama_kategori']."</b>"; ?></a>
				</td>
				<td bgcolor="#ebebeb" align="center" style="vertical-align:middle;"><a href="editisicategory.php?idk=<?php echo $rows['id_kategori'];?>"><img src="../css/images/edit.png" title="edit"/></a></td>
				<td bgcolor="#ebebeb" align="center" style="vertical-align:middle;"><a href="hapus-kategori.php?idk=<?php echo $rows['id_kategori'];?>" onclick='return confirm("Anda yakin akan menghapus data tersebut ?")'><img src="../css/images/delete.png" title="hapus" /></a></td>
				</tr>
				<?php
				}?>	
	</tr>
</table>
<?php
}
else if($tipe == "UMUM"|| $tipe == "UMUM"){
?>
<center><h2>UMUM</h2></center>
<table class="table table-bordered table-hover table-striped tablesorter">	
<tr>
				<th>KATEGORI</th>
				<th colspan="2" style="text-align:center;">Action</th>
				</tr>
	<tr>
				<?php 
				$sql="SELECT * FROM kategori WHERE type='UMUM'";
				$result=mysql_query($sql);
				while($rows=mysql_fetch_array($result)){ 
				?>
				<tr>
				<td bgcolor="#ebebeb"><img src="../css/images/kategori.png" style="margin: 0 20px 0 20px;"/>
				<a href="editisicategory.php?idk=<?php echo $rows['id_kategori'];?>"><?php echo "<b>".$rows['nama_kategori']."</b>"; ?></a>
				</td>
				<td bgcolor="#ebebeb" align="center" style="vertical-align:middle;"><a href="editisicategory.php?idk=<?php echo $rows['id_kategori'];?>"><img src="../css/images/edit.png" title="edit"/></a></td>
				<td bgcolor="#ebebeb" align="center" style="vertical-align:middle;"><a href="hapus-kategori.php?idk=<?php echo $rows['id_kategori'];?>" onclick='return confirm("Anda yakin akan menghapus data tersebut ?")'><img src="../css/images/delete.png" title="hapus" /></a></td>
				</tr>
				<?php
				}?>	
	</tr>
</table>
<?php
}else{
	unset($_POST['tipe']);
}
?>
<?php

	}
	else{
		echo "Bukan Area Newbie";
	}
}
else {
	echo "Anda tidak memiliki akun";
}
}